@extends('layouts.app')

@section('title', 'Booking - VetConnect')

@section('content')
<body class="bg-gray-100">

    <!-- Hero Section -->
    <section class="container flex flex-col px-6 mx-auto mt-12 md:flex-row">
        <!-- Bagian Kiri: Informasi -->
        <div class="pr-8 md:w-1/2">
            <h3 class="text-4xl font-bold text-black">
                Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>
            </h3>
            <p class="mt-2 text-center text-gray-600">Layanan Telemedisin Hewan: Siap Siaga untuk Membantu Hewan Peliharaanmu Hidup Lebih Sehat.</p>

            <!-- Gambar Ilustrasi -->
            <img src="{{ asset('images/Booking Dokter.png') }}" alt="Dokter Ilustrasi" class="relative w-40 mx-auto mt-4 transform md:w-52 lg:w-64 md:ml-40 lg:mr-20">

            <p class="mt-2 text-center text-gray-600">Pilih dokter berpengalaman dan booking sekarang</p>

            <h4 class="mt-6 text-xl font-bold">
                Mengapa Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>?
            </h4>
            <ul class="mt-4 space-y-3">
                <li class="flex items-center">
                    <img src="{{ asset('images/icon1.png') }}" class="mr-2 w-9 h-9"> Kemudahan dan Kepraktisan
                </li>
                <li class="flex items-center">
                    <img src="{{ asset('images/icon2.png') }}" class="mr-2 w-9 h-9"> Pilihan Dokter Hewan Berpengalaman
                </li>
                <li class="flex items-center">
                    <img src="{{ asset('images/Icon3.png') }}" class="mr-2 w-9 h-9"> Hemat Waktu dan Tenaga
                </li>
            </ul>
        </div>

        <!-- Grid Dokter -->
        <div class="grid w-3/4 grid-cols-1 gap-6 mx-auto md:w-2/3 lg:w-1/2 md:grid-cols-2 lg:grid-cols-3">
            <!-- Kartu Dokter -->
            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Ajay Kaul" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Ajay Kaul</h4>
                <p class="text-sm text-gray-600">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Naresh Terhan" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Naresh Terhan</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Vinod Raina" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Vinod Raina</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <!-- Duplikasi Kartu Dokter -->
            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Ajay Kaul" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Ajay Kaul</h4>
                <p class="text-sm text-gray-600">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Naresh Terhan" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Naresh Terhan</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Vinod Raina" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Vinod Raina</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>
        </div>
    </section>

</body>
</html>
<footer class="py-6 mt-10 bg-gray-100">
    <div class="flex flex-col items-center justify-between max-w-6xl px-6 mx-auto md:flex-row">
        <!-- Kiri: Info -->
        <div class="text-left">
            <h3 class="text-xl font-bold text-gray-800">Vet<span class="text-[#497D74]">Connect</span></h3>
            <p class="mt-2 font-medium text-gray-700">
                Want to consult a vet? Just book online at <span class="font-bold">VetConnect</span>!
            </p>
            <div class="mt-3 space-y-2 text-sm text-gray-600">
                <p>📍 Location: Jl. Kesehatan No.10, Jakarta</p>
                <p>📧 Email: support@vetconnect.com</p>
                <p>📞 WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>

        <!-- Kanan: Partner Form -->
        <div class="mt-6 text-center md:mt-0 md:text-left">
            <h4 class="text-lg font-bold text-gray-800">
                🔗 Want to be our partner? 🎁🐾
            </h4>
            <p class="text-sm text-gray-600">
                Join us and be part of the best animal health service! ✨
                Enter your email and we will send you a form.
            </p>
            <div class="flex mt-3">
                <input type="email" placeholder="Enter Your E-mail"
                    class="px-4 py-2 border border-gray-300 w-60 rounded-l-md focus:outline-none">
                <button class="bg-[#497D74] text-white px-4 py-2 rounded-r-md hover:bg-[#3b665d]">
                    Join
                </button>
            </div>
        </div>
    </div>

    <!-- Copyright & Social Media -->
    <div class="relative mt-6">
        <div class="flex items-center justify-between px-40 pt-6 border-t border-gray-300">
            <!-- Kiri: Copyright -->
            <p class="text-sm text-gray-600 movable">© 2025 VetConnect - Your Pet’s Loyal Friend!</p>

            <!-- Kanan: Social Media -->
            <div class="flex space-x-4 movable">
                <a href="#"><img src="{{ asset('images/Instagram.png') }}" alt="Instagram" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Facebook.png') }}" alt="Facebook" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Twitter.png') }}" alt="Twitter" class="w-6 h-6"></a>
            </div>
        </div>
    </div>
    @endsection
</footer>

<!-- Tambahkan CSS untuk memindahkan elemen -->
<style>
    /* Geser teks copyright */
    .movable:first-child {
        position: relative;
        top: -5px;  /* Geser ke bawah */
        left: 20px; /* Geser ke kanan */
    }

    /* Geser ikon sosial media */
    .movable:last-child {
        position: relative;
        top: -5px;  /* Geser ke atas */
        left: -15px; /* Geser ke kiri */
    }
</style>
