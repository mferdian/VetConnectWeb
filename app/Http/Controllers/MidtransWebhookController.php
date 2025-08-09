<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log semua request yang masuk untuk debugging
        Log::info('Midtrans webhook received', [
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
            'raw_body' => $request->getContent()
        ]);

        // Jika tidak ada data, kembalikan response sukses
        if (empty($request->all()) && empty($request->getContent())) {
            Log::info('Empty webhook request - returning success for test');
            return response()->json(['status' => 'success'], 200);
        }

        try {
            // Setup Midtrans Config
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // Buat instance notification
            $notification = new Notification();

            // Ambil data dari notification
            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status ?? null;
            $paymentType = $notification->payment_type;
            $grossAmount = $notification->gross_amount;

            // Log untuk debugging
            Log::info('Midtrans Webhook Received', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $paymentType,
                'gross_amount' => $grossAmount
            ]);

            // Cari booking berdasarkan order_id
            $booking = Booking::where('order_id', $orderId)->first();

            if (!$booking) {
                Log::warning('Booking not found for order_id: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
            }

            // Update status berdasarkan transaction_status
            $this->updateBookingStatus($booking, $transactionStatus, $fraudStatus);

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Midtrans Webhook Error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    private function updateBookingStatus($booking, $transactionStatus, $fraudStatus = null)
    {
        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus == 'challenge') {
                    // Transaksi challenge, tunggu approval manual
                    $booking->update([
                        'status' => 'pending',
                        'status_bayar' => 'pending'
                    ]);
                    Log::info("Booking {$booking->order_id} status: challenge");
                } elseif ($fraudStatus == 'accept') {
                    // Transaksi berhasil
                    $booking->update([
                        'status' => 'confirmed',
                        'status_bayar' => 'berhasil'
                    ]);
                    Log::info("Booking {$booking->order_id} status: capture accepted");
                }
                break;

            case 'settlement':
                // Transaksi berhasil
                $booking->update([
                    'status' => 'confirmed',
                    'status_bayar' => 'berhasil'
                ]);
                Log::info("Booking {$booking->order_id} status: settlement");
                break;

            case 'pending':
                // Transaksi masih pending
                $booking->update([
                    'status' => 'pending',
                    'status_bayar' => 'pending'
                ]);
                Log::info("Booking {$booking->order_id} status: pending");
                break;

            case 'deny':
                // Transaksi ditolak
                $booking->update([
                    'status' => 'canceled',
                    'status_bayar' => 'gagal'
                ]);
                Log::info("Booking {$booking->order_id} status: denied");
                break;

            case 'cancel':
            case 'expire':
                // Transaksi dibatalkan atau expired
                $booking->update([
                    'status' => 'canceled',
                    'status_bayar' => 'gagal'
                ]);
                Log::info("Booking {$booking->order_id} status: {$transactionStatus}");
                break;

            case 'failure':
                // Transaksi gagal
                $booking->update([
                    'status' => 'canceled',
                    'status_bayar' => 'gagal'
                ]);
                Log::info("Booking {$booking->order_id} status: failure");
                break;

            default:
                Log::warning("Unknown transaction status: {$transactionStatus} for booking {$booking->order_id}");
                break;
        }
    }
}
