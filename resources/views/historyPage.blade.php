    @extends('layouts.app')

    @section('title', 'VetConnect - Riwayat Janji Temu')

    @section('content')
    <div class="max-w-4xl px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Riwayat Janji Temu</h1>

        {{-- Notifikasi Flash Message --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded">
                {{ session('error') }}
            </div>
        @endif

        @forelse ($bookings as $booking)
            <div class="p-6 mb-4 bg-white rounded-lg shadow">
                <h2 class="text-xl font-semibold text-[#497D74]">Dr. {{ $booking->vet->nama }}</h2>
                <p class="text-gray-600">{{ $booking->vet->spesialisasi ?? 'Dokter Hewan' }}</p>

                <div class="mt-2 text-sm text-gray-700">
                    <i class="mr-1 fas fa-calendar-alt text-[#497D74]"></i>
                    {{ $booking->vetDate->tanggal->translatedFormat('l, d F Y') }}
                    <span class="ml-4">
                        <i class="mr-1 fas fa-clock text-[#497D74]"></i>
                        {{ $booking->vetTime->jam }}
                    </span>
                </div>

                <div class="mt-4">
                    @if ($booking->review)
                        <span class="inline-block px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                            Sudah Direview ⭐ {{ $booking->review->rating }}/5
                        </span>
                    @else
                        <a href="{{ route('review.create', ['booking' => $booking->id]) }}"
                            class="inline-block px-4 py-2 text-white bg-[#497D74] rounded hover:bg-[#3d6a61]">
                            Beri Review
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada riwayat janji temu.</p>
        @endforelse
    </div>
    @endsection
