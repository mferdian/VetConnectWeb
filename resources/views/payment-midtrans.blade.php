@extends('layouts.app')

@section('title', 'konfirmasi pembayaran - VetConnect')

@section('content')
<div class="max-w-lg p-8 mx-auto mt-12 bg-white shadow-lg rounded-2xl">
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Konfirmasi Pembayaran</h2>
        <p class="text-sm text-gray-500">Silakan periksa detail pembayaran di bawah ini</p>
    </div>

    <div class="space-y-4 text-gray-700">
        <div class="flex justify-between">
            <span>Dokter</span>
            <strong>{{ $vet->nama }}</strong>
        </div>
        <div class="flex justify-between">
            <span>Biaya Konsultasi</span>
            <strong>Rp {{ number_format($vet->harga, 0, ',', '.') }}</strong>
        </div>
        <div class="flex justify-between">
            <span>Biaya Admin</span>
            <strong>Rp 5.000</strong>
        </div>
        <hr class="my-4 border-gray-300 border-dashed">
        <div class="flex justify-between text-lg font-semibold text-[#497D74]">
            <span>Total</span>
            <span>Rp {{ number_format($vet->harga + 5000, 0, ',', '.') }}</span>
        </div>
    </div>

    {{-- PERBAIKAN: Sertakan parameter booking dalam route --}}
    <form id="payment-form" action="{{ route('payment.finish', ['booking' => $booking->id]) }}" method="GET" class="mt-8">
        @csrf
        <input type="hidden" name="vet_id" value="{{ $vet->id }}">
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
        <button id="pay-button" type="button"
            class="w-full bg-[#497D74] hover:bg-[#3a645c] text-white font-semibold py-3 rounded-lg transition duration-300">
            Bayar Sekarang
        </button>
    </form>
</div>

<!-- Midtrans Snap.js -->
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.clientkey') }}">
</script>

<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                // PERBAIKAN: Redirect langsung ke finish page dengan parameter booking
                window.location.href = "{{ route('payment.finish', ['booking' => $booking->id]) }}";
            },
            onPending: function(result){
                alert("Pembayaran sedang diproses");
                window.location.href = "{{ route('payment.finish', ['booking' => $booking->id]) }}";
            },
            onError: function(result){
                alert("Pembayaran gagal");
                console.log(result);
            },
            onClose: function(){
                alert("Kamu menutup popup pembayaran.");
            }
        });
    });
</script>
@endsection
