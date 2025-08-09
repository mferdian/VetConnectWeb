<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Review
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan model sudah binding, atau inject manual
        if (!$request->route('booking') instanceof Booking) {
            $bookingId = $request->route('booking');
            $booking = Booking::with('review')->findOrFail($bookingId);
            $request->route()->setParameter('booking', $booking);
        } else {
            $booking = $request->route('booking');
        }

        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak memiliki booking ini.');
        }

        if ($booking->status !== 'confirmed') {
            abort(403, 'Booking belum dikonfirmasi.');
        }

        if ($booking->review) {
            abort(403, 'Review sudah dibuat.');
        }

        return $next($request);
    }
}
