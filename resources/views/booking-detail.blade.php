@extends('layouts.app')

@section('title', 'Booking - VetConnect')
@section('content')

    <body class="min-h-screen font-sans bg-gradient-to-br from-teal-50 via-emerald-50 to-green-50">

        <div class="container px-4 py-12 mx-auto">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <h1 class="mb-2 text-4xl font-bold text-gray-800">
                    <i class="mr-3 text-black-600 fas fa-stethoscope"></i>
                    Booking Konsultasi
                </h1>
                <p class="text-lg text-gray-600">Jadwalkan konsultasi dengan dokter hewan terpercaya</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="overflow-hidden bg-white border border-gray-100 shadow-2xl rounded-2xl">

                    <!-- Doctor Info Section with Beautiful Header -->
                    <div
                        class="relative p-6 overflow-hidden text-white shadow-md bg-gradient-to-r from-teal-600 to-teal-700 rounded-xl">
                        <!-- Decorative background pattern -->
                        <div class="absolute inset-0 pointer-events-none opacity-10">
                            <div class="absolute w-32 h-32 bg-white rounded-full -top-8 -right-8"></div>
                            <div class="absolute w-24 h-24 bg-white rounded-full -bottom-4 -left-4"></div>
                        </div>

                        <div class="relative z-10 flex items-center space-x-5">
                            <!-- Profile Image -->
                            <div class="relative">
                                <img src="{{ $vet->foto ? asset('storage/' . $vet->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($vet->nama) . '&background=497D74&color=fff' }}"
                                    alt="Dr. {{ $vet->nama }}"
                                    class="object-cover w-16 h-16 border-4 border-white rounded-full shadow-md">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 bg-green-500 border-2 border-white rounded-full -bottom-1 -right-1">
                                    <i class="text-xs text-black fas fa-check"></i>
                                </div>
                            </div>

                            <!-- Doctor Info -->
                            <div class="">
                                <h2 class="mb-1 ml-4 text-xl font-semibold text-black">Dr. {{ $vet->nama }}</h2>
                                <p class="mb-1 ml-4 text-sm text-black">
                                    <i class="mr-1 fas fa-user-md"></i>
                                    {{ $vet->spesialisasi ?? 'Dokter Hewan' }}
                                </p>
                                <div class="flex items-center ml-4 space-x-4 text-xs text-black">
                                    <span><i class="mr-1 fas fa-star"></i> 4.9/5</span>
                                    <span><i class="mr-1 fas fa-users"></i> 500+ Pasien</span>
                                    <span><i class="mr-1 fas fa-award"></i> Bersertifikat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Section -->
                    <div class="p-8">
                        <form method="POST" action="{{ route('booking.store') }}" class="space-y-8">
                            @csrf
                            <input type="hidden" name="vet_id" value="{{ $vet->id }}">

                            <!-- Appointment Details -->
                            <div class="p-6 border border-gray-200 bg-gray-50 rounded-xl">
                                <div class="flex items-center mb-6">
                                    <div class="p-3 mr-4 bg-teal-100 rounded-full">
                                        <i class="text-xl text-black-600 fas fa-calendar-alt"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800">Detail Janji Temu</h3>
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <!-- Date Selection -->
                                    <div class="space-y-2">
                                        <label for="vet_date_id" class="block mb-3 font-semibold text-gray-700">
                                            <i class="mr-2 text-black-600 fas fa-calendar-day"></i>
                                            Pilih Tanggal Konsultasi
                                        </label>
                                        <select name="vet_date_id" id="vet_date_id"
                                            class="w-full px-4 py-3 text-gray-800 transition-all duration-200 bg-white border-2 border-gray-300 shadow-sm rounded-xl focus:ring-4 focus:ring-teal-200 focus:border-teal-500 hover:shadow-md">
                                            @foreach ($vet->vetDates as $date)
                                                <option value="{{ $date->id }}">
                                                    {{ $date->tanggal->translatedFormat('l, d F Y') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Time Selection -->
                                    <div class="space-y-2">
                                        <label for="vet_time_id" class="block mb-3 font-semibold text-gray-700">
                                            <i class="mr-2 text-black-600 fas fa-clock"></i>
                                            Pilih Jam Konsultasi
                                        </label>
                                        <select name="vet_time_id" id="vet_time_id"
                                            class="w-full px-4 py-3 text-gray-800 transition-all duration-200 bg-white border-2 border-gray-300 shadow-sm rounded-xl focus:ring-4 focus:ring-teal-200 focus:border-teal-500 hover:shadow-md">
                                            <option value="">Pilih waktu terlebih dahulu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient Information -->
                            <div class="p-6 border border-emerald-200 bg-emerald-50 rounded-xl">
                                <div class="flex items-center mb-6">
                                    <div class="p-3 mr-4 rounded-full bg-emerald-100">
                                        <i class="text-xl text-emerald-600 fas fa-paw"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800">Informasi Pasien</h3>
                                </div>

                                <div class="space-y-2">
                                    <label for="keluhan" class="block mb-3 font-semibold text-gray-700">
                                        <i class="mr-2 text-emerald-600 fas fa-notes-medical"></i>
                                        Keluhan & Gejala
                                    </label>
                                    <textarea name="keluhan" id="keluhan" rows="5"
                                        class="w-full px-4 py-3 transition-all duration-200 bg-white border-2 border-gray-300 shadow-sm resize-none rounded-xl focus:ring-4 focus:ring-emerald-200 focus:border-emerald-500 hover:shadow-md"
                                        placeholder="Jelaskan kondisi hewan peliharaan Anda secara detail...&#10;&#10;Contoh:&#10;• Gejala yang dialami&#10;• Sudah berlangsung berapa lama&#10;• Apakah ada perubahan perilaku&#10;• Riwayat vaksinasi terakhir"></textarea>
                                    <p class="mt-2 text-sm text-gray-500">
                                        <i class="mr-1 fas fa-info-circle"></i>
                                        Informasi detail akan membantu dokter memberikan diagnosis yang tepat
                                    </p>
                                </div>
                            </div>

                            <!-- Pricing & Booking -->
                            <input type="hidden" name="harga" value="{{ $vet->harga + 5000 }}">

                            <div class="p-6 border border-green-200 bg-green-50 rounded-xl">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <div class="p-3 mr-4 bg-green-100 rounded-full">
                                            <i class="text-xl text-green-600 fas fa-money-bill-wave"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Biaya Konsultasi</h3>
                                            <p class="text-gray-600">Sudah termasuk biaya admin</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-3xl font-bold text-green-600">Rp
                                            {{ number_format($vet->harga + 5000, 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500">per konsultasi</p>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="w-full px-6 py-4 font-bold text-white transition-all duration-300 transform bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 rounded-xl hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-emerald-700 group">
                                    <i class="mr-3 fas fa-calendar-check group-hover:animate-pulse"></i>
                                    Konfirmasi Janji Temu
                                </button>

                                <div class="p-4 mt-6 bg-white border border-gray-200 rounded-lg">
                                    <div class="flex items-start space-x-3">
                                        <i class="mt-1 text-emerald-500 fas fa-shield-alt"></i>
                                        <div class="text-sm text-gray-600">
                                            <p class="mb-1 font-semibold text-gray-800">Kebijakan Pembayaran:</p>
                                            <ul class="space-y-1">
                                                <li>• Pembayaran dilakukan di halaman pembayaran setelah konfirmasi</li>
                                                <li>• Dapat dibatalkan hingga 2 jam sebelum jadwal konsultasi</li>
                                                <li>• Tersedia berbagai metode pembayaran yang aman</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

@endsection
