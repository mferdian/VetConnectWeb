    @extends('layouts.app')

    @section('title', 'Home - VetConnect')

    @section('content')
        <body class="bg-gray-50">
            <!-- Navbar -->

            <!-- Hero Section -->
            <section class="py-20 bg-gradient-to-r from-emerald-50 to-white" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
                <div class="container flex flex-col items-center px-6 mx-auto lg:flex-row lg:space-x-12">
                    <!-- Text Content -->
                    <div class="text-center lg:text-left lg:w-1/2" x-show="show"
                        x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-x-10"
                        x-transition:enter-end="opacity-100 translate-x-0">
                        <h1 class="text-4xl font-bold leading-tight sm:text-5xl">
                            Perawatan Hewan Lebih Mudah & Cepat!
                            <span class="block mt-2 text-gradient">
                                Booking Dokter di VetConnect
                            </span>
                        </h1>
                        <p class="max-w-lg mt-6 text-lg text-gray-600">
                            Reservasi Dokter Hewan & Akses Informasi Kesehatan dalam Sekejap!
                        </p>
                        <div class="flex flex-wrap justify-center gap-4 mt-8 lg:justify-start">
                            <a href="{{ route('doctor') }}" class="px-8 py-3 font-medium text-white rounded-lg btn-primary">
                                Mulai Sekarang
                            </a>
                            <a href="#find-doctor"
                                class="px-8 py-3 font-medium border-2 rounded-lg text-emerald-800 border-emerald-800 hover:bg-emerald-50">
                                Cari Dokter
                            </a>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="mt-10 lg:mt-0 lg:w-1/2" x-show="show" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0">
                        <img src="{{ asset('images/cat.png') }}" alt="VetConnect"
                            class="w-full max-w-lg mx-auto shadow-xl rounded-xl">
                    </div>
                </div>
            </section>

            <!-- Service Page -->
            <section id="find-doctor" class="container px-6 mx-auto mt-20">
                <div class="flex flex-col items-center lg:flex-row lg:space-x-12">
                    <!-- Text Content -->
                    <div class="lg:w-1/2">
                        <span class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-emerald-100 text-emerald-800">
                            Temukan Dokter
                        </span>
                        <h1 class="mt-4 text-4xl font-bold text-gray-800">
                            Temukan Dokter yang Hewan Anda Butuhkan
                        </h1>
                        <p class="mt-4 text-gray-600">
                            VetConnect adalah aplikasi reservasi dokter hewan yang membantu reservasi dokter hewan dengan mudah,
                            aman, dan cepat.
                        </p>
                        <ul class="mt-6 space-y-3">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                                <span>Temukan dokter yang sesuai denganmu</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                                <span>Tersedia lebih dari 100 dokter terbaik</span>
                            </li>
                        </ul>
                        <a href="{{ route('doctor') }}"
                            class="inline-block px-8 py-3 mt-6 font-medium text-white rounded-lg btn-primary">
                            Cari Dokter
                        </a>
                    </div>

                    <!-- Image and Card -->
                    <div class="relative mt-10 lg:mt-0 lg:w-1/2">
                        <img src="{{ asset('images/Dr Beranda.png') }}" alt="Doctor"
                            class="w-full max-w-md mx-auto rounded-lg shadow-lg">
                    </div>
                </div>
            </section>

            <!-- Steps Section -->
            <section class="container px-6 mx-auto mt-32">
                <div class="mt-10">
                    <div class="text-center">
                        <span class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-emerald-100 text-emerald-800">
                            Solusi Cepat
                        </span>
                        <h2 class="mt-3 text-3xl font-bold text-gray-800">Langkah Mudah Mendapatkan Solusi</h2>
                        <p class="max-w-2xl mx-auto mt-2 text-gray-600">Hanya dalam 4 langkah sederhana, hewan peliharaan Anda
                            bisa mendapatkan perawatan terbaik</p>
                    </div>
                    <div class="grid grid-cols-1 gap-8 mt-12 md:grid-cols-2 lg:grid-cols-4">
                        <div class="p-8 text-center bg-white shadow-md rounded-xl card-hover">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-50 text-emerald-700">
                                <img src="{{ asset('images/search.png') }}" alt="">
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">Periksa Keluhan</h4>
                            <p class="mt-2 text-gray-600">Periksa gejala agar bisa memilih spesialis yang tepat.</p>
                        </div>
                        <div class="p-8 text-center bg-white shadow-md rounded-xl card-hover">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-50 text-emerald-700">
                                <img src=" {{ asset('images/select.png') }}" alt="">
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">Pilih Dokter</h4>
                            <p class="mt-2 text-gray-600">Pilih spesialis sesuai keluhan hewanmu.</p>
                        </div>
                        <div class="p-8 text-center bg-white shadow-md rounded-xl card-hover">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-50 text-emerald-700">
                                <img src=" {{ asset('images/schedule.png') }}" alt="">
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">Buat Jadwal</h4>
                            <p class="mt-2 text-gray-600">Atur jadwal dengan dokter pilihan untuk pemeriksaan.</p>
                        </div>
                        <div class="p-8 text-center bg-white shadow-md rounded-xl card-hover">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-50 text-emerald-700">
                                <img src=" {{ asset('images/result.png') }}" alt="">
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">Dapatkan Solusi</h4>
                            <p class="mt-2 text-gray-600">Konsultasikan dan dapatkan metode penyembuhan terbaik.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Booking Page -->
            <section class="container px-6 mx-auto mt-32">
                <div class="mt-10">
                    <div class="flex flex-col mt-4 lg:flex-row lg:space-x-12">
                        <!-- Left: Information -->
                        <div class="lg:w-1/2">
                            <h2 class="text-4xl font-bold text-gray-800">
                                Booking Dokter di <span class="text-gradient">VetConnect</span>
                            </h2>
                            <p class="mt-4 text-gray-600">Layanan Telemedisin Hewan: Siap Siaga untuk Membantu Hewan
                                Peliharaanmu Hidup Lebih Sehat.</p>

                            <div class="mt-8">
                                <img src="{{ asset('images/Booking Dokter.png') }}" alt="Doctor Illustration"
                                    class="w-full max-w-md mx-auto">
                            </div>

                            <h3 class="mt-10 text-xl font-bold text-gray-800">Mengapa Booking Dokter di VetConnect?</h3>
                            <ul class="mt-4 space-y-4">
                                @foreach ([['title' => 'Kemudahan dan Kepraktisan', 'desc' => 'Booking dokter hanya dalam beberapa klik tanpa perlu antri.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'], ['title' => 'Dokter Hewan Berpengalaman', 'desc' => 'Tim dokter profesional dengan spesialisasi beragam.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'], ['title' => 'Hemat Waktu dan Tenaga', 'desc' => 'Konsultasi online atau janji temu tanpa perlu keluar rumah.', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z']] as $item)
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 p-2 rounded-lg bg-emerald-100 text-emerald-700">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $item['icon'] }}"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="font-semibold text-gray-800">{{ $item['title'] }}</h4>
                                            <p class="mt-1 text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Right: Doctor Grid -->
                        <div class="mt-10 lg:w-1/2 lg:mt-0">
                            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Dokter Tersedia</h2>

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                @foreach ($vets as $vet)
                                    <div
                                        class="flex flex-col p-4 transition-transform duration-300 bg-white rounded-lg shadow hover:scale-105">
                                        <img src="{{ asset('storage/' . $vet->foto) }}" alt="{{ $vet->nama }}"
                                            class="object-cover w-full h-48 rounded-md">

                                        <div class="flex flex-col justify-between flex-grow mt-3">
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-800">{{ $vet->nama }}</h4>
                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ $vet->deskripsi ? Str::limit($vet->deskripsi, 50) : 'Dokter Hewan Profesional' }}
                                                </p>
                                            </div>

                                            <a href="{{ route('booking.show', $vet->id) }}">
                                                <button
                                                    class="w-full px-4 py-2 mt-4 text-sm text-[#497D74] border border-[#497D74] rounded-md hover:bg-[#497D74] hover:text-white transition">
                                                    Consult Now
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Review Section -->
            <section class="py-16 bg-emerald-50">
                <div class="mt-10">

                    <div class="container px-6 mx-auto">
                        <div class="text-center">
                            <span
                                class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-emerald-100 text-emerald-800">
                                Testimonial
                            </span>
                            <h2 class="mt-3 text-3xl font-bold text-gray-800">Apa Kata Pelanggan Kami</h2>
                            <p class="max-w-2xl mx-auto mt-2 text-gray-600">Pengalaman pelanggan dengan layanan dokter hewan
                                kami</p>
                        </div>

                        <div class="grid grid-cols-1 gap-8 mt-12 md:grid-cols-3">
                            @forelse($reviews as $review)
                                <div class="p-8 bg-white shadow-md rounded-xl card-hover">
                                    <div class="flex justify-center mb-4">
                                        <span class="text-xl text-amber-400">{{ $review->getStarRatingHtml() }}</span>
                                    </div>
                                    <p class="italic text-gray-600">"{{ $review->review }}"</p>
                                    <div class="flex flex-col items-center mt-6">
                                        @if ($review->user && $review->user->profile_photo)
                                            <img src="{{ asset('storage/' . $review->user->profile_photo) }}"
                                                alt="Profile Photo" class="object-cover w-12 h-12 rounded-full">
                                        @elseif($review->user)
                                            <div
                                                class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-emerald-800">
                                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                            </div>
                                        @else
                                            <img src="{{ asset('images/default-user.png') }}" alt="Default User"
                                                class="object-cover w-12 h-12 rounded-full">
                                        @endif
                                        <p class="mt-3 font-semibold text-gray-800">{{ $review->user->name }}</p>
                                        <p class="text-sm text-gray-500">Untuk: Dr. {{ $review->vet->nama }}</p>
                                    </div>
                                </div>
                            @empty
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="p-8 bg-white shadow-md rounded-xl card-hover">
                                        <div class="flex justify-center mb-4">
                                            <span class="text-xl text-amber-400">★★★★{{ $i < 1 ? '★' : '☆' }}</span>
                                        </div>
                                        <p class="italic text-gray-600">"VetConnect membantu saya menemukan dokter hewan
                                            terbaik untuk hewan peliharaan saya."</p>
                                        <div class="flex flex-col items-center mt-6">
                                            <img src="{{ asset('images/PausBeluga.png') }}" alt="User"
                                                class="w-12 h-12 rounded-full">
                                            <p class="mt-3 font-semibold text-gray-800">
                                                {{ ['Sarah Johnson', 'Michael Smith', 'John Doe'][$i] }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ ['Pet Owner', 'Dog Lover', 'Cat Enthusiast'][$i] }}</p>
                                        </div>
                                    </div>
                                @endfor
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->


            <!-- Footer -->
            <footer class="py-10 mt-20 bg-emerald-800" x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)">
                <section class="py-16 text-white bg-gradient-to-r">
                    <div class="container px-6 mx-auto text-center">
                        <h2 class="text-3xl font-bold">Siap Memberikan Perawatan Terbaik</h2>
                        <p class="max-w-2xl mx-auto mt-4 text-emerald-100">Bergabunglah dengan ribuan pemilik hewan yang telah
                            mempercayakan kesehatan hewan peliharaan mereka kepada kami.</p>
                    </div>
                </section>
                <div class="container flex flex-col px-6 mx-auto space-y-6 md:flex-row md:space-y-0 md:space-x-12"
                    x-show="show" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="md:w-1/2">
                        <h3 class="text-xl font-bold text-white">Vet<span class="text-white">Connect</span></h3>
                        <p class="mt-2 text-white">Ingin konsultasi dengan dokter hewan? Booking online saja di <span
                                class="font-bold">VetConnect</span>!</p>
                        <div class="mt-4 space-y-2 text-sm text-white">
                            <p>📍 Lokasi: Jl. Kesehatan No.10, Jakarta</p>
                            <p>📧 Email: support@vetconnect.com</p>
                            <p>📞 WhatsApp: +62 812-3456-7890</p>
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <h4 class="text-lg font-bold text-white">🔗 Ingin Jadi Mitra Kami? 🎁🐾</h4>
                        <p class="mt-2 text-sm text-white">Gabung dan jadi bagian dari layanan kesehatan hewan terbaik!
                            Masukkan emailmu, kami akan kirim form-nya.</p>
                        <div class="flex mt-4">
                            <input type="email" placeholder="Masukkan Email Kamu"
                                class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none">
                            <button class="px-6 py-2 text-white bg-[#497D74] rounded-r-md hover:bg-[#3b665d]">Gabung</button>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="/script.js"></script>
        @endsection
    </body>

    </html>
