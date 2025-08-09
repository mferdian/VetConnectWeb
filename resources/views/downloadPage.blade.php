@extends('layouts.app')
@section('title', 'VetConnect - App Download')
@section('content')

    <body class="bg-gray-100">

        <!-- Navbar -->


        <!-- Main Content -->
        <div class="flex flex-col items-center justify-between px-6 py-12 mx-auto md:flex-row max-w-7xl">

            <!-- Bagian Gambar Handphone -->
            <div class="flex justify-center w-full md:w-1/2">
                <img src="images/gambarvetconnectmobile3.png" alt="VetConnect App Preview" class="w-4/5 md:w-full">
            </div>

            <!-- Bagian Teks dan Form -->
            <div class="w-full mt-10 text-center md:w-1/2 md:mt-0 md:text-left">
                <h1 class="text-4xl font-bold leading-tight text-gray-900">
                    Download the <span class="text-[#497D74]">VetConnect</span> App
                </h1>
                <p class="mt-4 text-gray-600">Get the link to download the app</p>

                <!-- Form Input Nomor Telepon -->
                <div class="flex items-center w-full mt-6 overflow-hidden border border-gray-300 rounded-lg md:w-96">
                    <span class="px-4 py-2 text-gray-700 bg-gray-100">+62</span>
                    <input type="text" placeholder="Enter phone number" class="w-full px-4 py-2 focus:outline-none">
                    <button class="bg-[#497D74] text-white px-8 py-2 hover:bg-[#3b665d]">Send</button>
                </div>

                <!-- Tombol Download -->
                <div class="flex justify-center mt-6 space-x-4 md:justify-start">
                    <img src="images/google_play.png" alt="Google Play" class="h-11">
                    </a>
                    <img src="images/apple_store.png" alt="App Store" class="h-11">
                    </a>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
