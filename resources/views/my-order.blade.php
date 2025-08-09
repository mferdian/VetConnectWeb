    @extends('layouts.app')

    @section('title', 'VetConnect - My-Order')

    @section('content')
        <div class="max-w-4xl px-4 py-10 mx-auto">
            <h1 class="mb-6 text-3xl font-bold text-gray-800">Pesanan Saya</h1>

            @if($bookings->isEmpty())
                <div class="p-6 text-center bg-white rounded-lg shadow">
                    <p class="text-gray-600"><i class="mr-2 text-yellow-500 fa fa-exclamation-circle"></i> Kamu belum memiliki janji temu dengan dokter hewan.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($bookings as $booking)
                        <div class="p-6 transition bg-white border border-gray-200 rounded-lg shadow hover:shadow-md">
                            <div class="flex items-start justify-between">
                                <div class="flex-grow">
                                    <h2 class="text-xl font-semibold text-[#497D74]">Dr. {{ $booking->vet->nama }}</h2>
                                    <p class="text-gray-600">{{ $booking->vet->spesialisasi ?? 'Dokter Hewan' }}</p>
                                    <p class="mt-2 text-sm text-gray-700">
                                        <i class="mr-1 fas fa-calendar-alt text-[#497D74]"></i>
                                        {{ $booking->vetDate->tanggal->translatedFormat('l, d F Y') }}
                                        <span class="ml-4">
                                            <i class="mr-1 fas fa-clock text-[#497D74]"></i>
                                            {{ $booking->vetTime->jam }}
                                        </span>
                                    </p>
                                    <p class="mt-2 text-sm text-gray-500">
                                        <i class="mr-1 text-gray-500 fas fa-file-alt"></i> Keluhan: {{ $booking->keluhan ?? '-' }}
                                    </p>
                                    @if(isset($booking->total_harga))
                                        <p class="mt-2 text-sm font-semibold text-gray-700">
                                            <i class="mr-1 text-green-500 fas fa-money-bill-wave"></i> Total: Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                        </p>
                                    @endif
                                    @if(isset($booking->metode_pembayaran))
                                        <p class="text-xs text-gray-500">
                                            <i class="mr-1 text-gray-500 fas fa-credit-card"></i> Metode: {{ ucfirst($booking->metode_pembayaran) }}
                                        </p>
                                    @endif

                                    <div class="mt-4">
                                        @if($booking->status === 'confirmed' && !$booking->review)
                                            <a href="{{ route('review.create', $booking->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-[#497D74] rounded-md hover:bg-[#3d6a61] focus:outline-none focus:ring-2 focus:ring-[#497D74] focus:ring-opacity-50 transition-colors">
                                                <i class="mr-1 fas fa-star"></i> Beri Review
                                            </a>
                                        @elseif($booking->review)
                                            <p class="mt-2 text-xs text-gray-500"><i class="mr-1 text-green-500 fas fa-check-double"></i> Sudah direview</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white rounded-full
                                        {{ $booking->status === 'confirmed' ? 'bg-green-500' : ($booking->status === 'pending' ? 'bg-yellow-400' : 'bg-red-500') }}">
                                        @if($booking->status === 'confirmed')
                                            <i class="mr-1 fas fa-check-circle"></i>
                                        @elseif($booking->status === 'pending')
                                            <i class="mr-1 fas fa-hourglass-half"></i>
                                        @else
                                            <i class="mr-1 fas fa-times-circle"></i>
                                        @endif
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endsection
