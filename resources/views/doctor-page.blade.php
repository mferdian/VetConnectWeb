@extends('layouts.app')
@section('title', 'VetConnect - Cari Dokter Hewan')
@section('content')

<body class="bg-gray-50">
        <!-- Hero Section -->

            <div class="container px-6 mx-auto mt-20 text-center">
                <h1 class="text-3xl font-bold text-gray-800 md:text-4xl">
                    Temukan Dokter Hewan Terbaik
                    <span class="block mt-2 text-gradient">
                        Untuk Hewan Peliharaan Anda
                    </span>
                </h1>
                <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">
                    Konsultasikan kesehatan hewan peliharaan Anda dengan dokter hewan profesional berpengalaman
                </p>
            </div>


        <!-- Main Content -->
        <section class="py-8 bg-gray-50">
            <div class="container px-6 mx-auto">
                <!-- Search and Filter Section -->
                <div class="p-6 mb-8 bg-white shadow-md rounded-xl card-hover">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        <div class="relative">
                            <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-map-marker-alt top-1/2 left-3"></i>
                            <input type="text" id="locationFilter" placeholder="Lokasi Anda"
                                   class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div class="relative">
                            <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-search top-1/2 left-3"></i>
                            <input type="text" id="searchDoctor" placeholder="Nama dokter"
                                   class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div class="relative">
                            <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-paw top-1/2 left-3"></i>
                            <select id="animalFilter" class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Jenis Hewan</option>
                                @foreach (\App\Models\Spesialisasi::distinct()->pluck('nama_hewan') as $spesialisasi)
                                    <option value="{{ strtolower($spesialisasi) }}">{{ $spesialisasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button id="filterButton" class="px-6 py-3 text-lg font-semibold text-white rounded-lg btn-primary">
                            <i class="mr-2 fas fa-search"></i> Cari Dokter
                        </button>
                    </div>
                </div>

                <!-- Sorting and Results -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <i class="mr-2 text-emerald-700 fas fa-paw"></i> Dokter Hewan Tersedia
                        <span class="ml-2 text-sm font-normal text-gray-500">({{ count($vets) }} hasil)</span>
                    </h2>
                    <div class="flex items-center mt-2 space-x-4 md:mt-0">
                        <span class="text-sm font-medium text-gray-600">Urutkan:</span>
                        <div class="relative">
                            <select id="sortDoctor" class="p-2 pl-8 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="rating">Rating Tertinggi</option>
                                <option value="distance">Jarak Terdekat</option>
                                <option value="price">Harga Terendah</option>
                            </select>
                            <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-sort top-1/2 left-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Doctors List -->
                <div id="vetList" class="space-y-6">
                    @foreach ($vets as $vet)
                    <div class="flex flex-col p-6 bg-white shadow-lg rounded-xl card-hover md:flex-row"
                        data-name="{{ strtolower($vet->nama) }}"
                        data-location="{{ strtolower($vet->alamat) }}"
                        data-spesialisasis="{{ strtolower(implode(',', $vet->spesialisasis->pluck('nama_hewan')->toArray())) }}"
                        data-rating="{{ $vet->vetReviews->avg('rating') ?? 0 }}">

                        <!-- Doctor Photo -->
                        <div class="flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                            <div class="relative w-32 h-32 overflow-hidden border-4 shadow-md rounded-xl border-emerald-100">
                                <img src="{{ asset('storage/' . $vet->foto) }}"
                                     alt="{{ $vet->nama }}"
                                     class="object-cover w-full h-full">
                                @if($vet->is_online)
                                <div class="absolute bottom-0 right-0 p-1 text-xs font-bold text-white bg-green-500 rounded-tl-lg">
                                    <i class="fas fa-wifi"></i> Online
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Doctor Info -->
                        <div class="flex-1">
                            <div class="flex flex-col justify-between h-full">
                                <div>
                                    <h3 class="text-xl font-bold text-emerald-800">{{ $vet->nama }}</h3>
                                    <p class="mt-2 text-gray-600">{{ $vet->deskripsi }}</p>

                                    <!-- Specializations -->
                                    <div class="mt-3">
                                        <span class="text-sm font-medium text-gray-600">Spesialisasi:</span>
                                        @if ($vet->spesialisasis->isNotEmpty())
                                            <div class="flex flex-wrap mt-1">
                                                @foreach ($vet->spesialisasis as $spesialisasi)
                                                    <span class="inline-block px-3 py-1 mb-1 mr-1 text-xs font-semibold text-white rounded-full specialization-badge">
                                                        {{ $spesialisasi->nama_hewan }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-sm text-gray-500">Tidak ada spesialisasi</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Location and Rating -->
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <i class="mr-2 text-emerald-600 fas fa-map-marker-alt"></i>
                                        <span class="text-gray-700">{{ $vet->alamat }}</span>
                                    </div>

                                    @php
                                        $rating = $vet->vetReviews->avg('rating') ?? 0;
                                        $reviewCount = $vet->vetReviews->count() ?? 0;
                                    @endphp

                                    <div class="flex items-center mt-2">
                                        <div class="flex mr-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($rating))
                                                    <i class="fas fa-star rating-star"></i>
                                                @elseif ($i - 0.5 <= $rating)
                                                    <i class="fas fa-star-half-alt rating-star"></i>
                                                @else
                                                    <i class="far fa-star rating-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">
                                            {{ number_format($rating, 1) }} ({{ $reviewCount }} ulasan)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex flex-col justify-center mt-4 md:mt-0 md:ml-6">
                            <a href="{{ route('booking.show', $vet->id) }}"
                               class="px-6 py-3 text-lg font-semibold text-center text-white rounded-lg btn-primary">
                                <i class="mr-2 far fa-calendar-alt"></i> Buat Janji
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination or Load More -->
                @if($vets->hasPages())
                <div class="flex justify-center mt-8">
                    {{ $vets->links() }}
                </div>
                @endif
            </div>
        </section>

    @endsection

</body>
</html>
