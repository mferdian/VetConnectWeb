@extends('layouts.app')

@php($noNavbar = true)
@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-8">
    <div class="flex w-full max-w-5xl overflow-hidden bg-white shadow-lg rounded-3xl">

        {{-- Kiri: Form Login --}}
        <div class="w-full p-8 md:w-1/2">
            <h2 class="mb-2 text-2xl font-bold">Login</h2>
            <p class="mb-6 text-sm text-gray-600">Enter your account to Login</p>

            {{-- Flash Messages --}}
            @if(session('failed'))
                <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded-lg">
                    {{ session('failed') }}
                </div>
            @endif

            @if(session('success'))
                <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Login Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Enter your email">
                    @error('email')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="••••••••">
                    @error('password')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 mt-2 font-semibold text-white rounded-lg bg-emerald-800 hover:bg-emerald-700">
                    Login
                </button>

                <div class="flex items-center my-4 space-x-2 text-sm text-gray-500">
                    <div class="flex-1 border-t"></div>
                    <span>or</span>
                    <div class="flex-1 border-t"></div>
                </div>

                <div class="flex flex-col sm:flex-row">
                    <button type="button" class="flex items-center justify-center w-full gap-2 py-2 text-sm border rounded-lg hover:bg-gray-100">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                        Login with Google
                    </button>
                </div>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="font-medium text-emerald-600 hover:text-emerald-500">Register</a>
            </p>
        </div>

        {{-- Kanan: Gambar --}}
        <div class="hidden w-1/2 bg-center bg-cover md:block rounded-r-3xl"
             style="background-image: url('{{ asset('images/login.jpg') }}')">
        </div>
    </div>
</div>
@endsection
