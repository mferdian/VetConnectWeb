    @extends('layouts.app')

    @section('title', 'Payment Success - VetConnect')
    @section('content')

    <body class="bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="w-full max-w-md p-8 text-center bg-white shadow-xl rounded-2xl">
                <!-- Success Icon with Animation -->
                <div class="mb-6">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-green-100 rounded-full animate-bounce">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="mb-2 text-3xl font-bold text-gray-800">Pembayaran Berhasil!</h1>
                    <p class="text-gray-600">
                        Terima kasih! Pembayaran Anda telah berhasil diproses.
                    </p>
                </div>

                <!-- Order Details Card -->
                <div class="p-6 mb-6 border border-green-200 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                    <div class="mb-3">
                        <div class="text-sm font-medium text-green-700">Order ID:</div>
                        <div class="font-mono text-lg font-bold text-green-800">{{ $booking->order_id }}</div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-4 text-sm">
                        <div>
                            <span class="text-gray-600">Total Bayar:</span>
                            <div class="font-semibold text-gray-800">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <span class="text-gray-600">Status:</span>
                            <div class="inline-flex px-2 py-1 text-xs font-medium text-green-800 bg-green-200 rounded-full">
                                Berhasil
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Message -->
                <div class="p-4 mb-6 border rounded-lg border-emerald-200 bg-emerald-50">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-emerald-800">Langkah Selanjutnya</span>
                    </div>
                    <p class="text-sm text-emerald-700">
                        Booking Anda telah dikonfirmasi. Silakan tunggu informasi lebih lanjut dari dokter hewan.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <a href="{{ route('myorder.index') }}"
                    class="block w-full px-6 py-3 font-semibold text-white transition duration-300 transform rounded-lg bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 hover:scale-105">
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Lihat Pesanan Saya
                        </div>
                    </a>

                    <a href="{{ route('home') }}"
                    class="block w-full px-6 py-3 font-semibold text-gray-700 transition duration-300 transform bg-gray-100 rounded-lg hover:bg-gray-200 hover:scale-105">
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Kembali ke Home
                        </div>
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="pt-6 mt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        Jika ada pertanyaan, silakan hubungi customer service kami
                    </p>
                </div>
            </div>
        </div>

        <!-- Confetti Elements -->
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>

        <!-- Success Sound Effect (Optional) -->
        <script>
            // Play success sound if available
            document.addEventListener('DOMContentLoaded', function() {
                // Show success message briefly
                setTimeout(() => {
                    const successIcon = document.querySelector('.animate-bounce');
                    if (successIcon) {
                        successIcon.classList.remove('animate-bounce');
                        successIcon.classList.add('animate-pulse');
                    }
                }, 2000);
            });
        </script>
    </body>

    @endsection
