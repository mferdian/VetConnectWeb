    @extends('layouts.app')

    @section('title', 'VetConnect - Beri Review')

    @section('content')
    <div class="max-w-2xl px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Beri Review untuk Dokter</h1>

        <div class="p-6 bg-white rounded-lg shadow">
            <div class="mb-6">
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
            </div>

            <form action="{{ route('review.store') }}" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Rating</label>
                    <div class="flex items-center space-x-1 text-xl">
                        <input type="hidden" name="rating" id="rating_value" value="5">
                        <div class="flex rating-stars">
                            <span class="text-yellow-500 cursor-pointer star" data-value="1">★</span>
                            <span class="text-yellow-500 cursor-pointer star" data-value="2">★</span>
                            <span class="text-yellow-500 cursor-pointer star" data-value="3">★</span>
                            <span class="text-yellow-500 cursor-pointer star" data-value="4">★</span>
                            <span class="text-yellow-500 cursor-pointer star" data-value="5">★</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="review" class="block mb-2 text-sm font-medium text-gray-700">Review</label>
                    <textarea id="review" name="review" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#497D74] focus:border-[#497D74]" required></textarea>
                    @error('review')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 text-white bg-[#497D74] rounded-md hover:bg-[#3d6a61] focus:outline-none focus:ring-2 focus:ring-[#497D74] focus:ring-opacity-50">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating_value');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    ratingInput.value = value;

                    // Update stars appearance
                    stars.forEach(s => {
                        const starValue = parseInt(s.getAttribute('data-value'));
                        s.textContent = starValue <= value ? '★' : '☆';
                        s.classList.toggle('text-yellow-500', starValue <= value);
                        s.classList.toggle('text-gray-300', starValue > value);
                    });
                });
            });
        });
    </script>
    @endpush

    @endsection
