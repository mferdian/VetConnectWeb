@extends('layouts.app')

@php($noNavbar = true)
@section('title', 'Register')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-8">
    <div class="flex w-full max-w-4xl overflow-hidden bg-white shadow-lg rounded-3xl">

        {{-- Kiri: Form Register --}}
        <div class="w-full px-10 py-12 md:w-1/2">
            <h2 class="mb-6 text-3xl font-bold text-gray-900">Register Account</h2>

            @if(session('success'))
                <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Enter your name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('name')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('email')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('password')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('password_confirmation')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 font-semibold text-white rounded-lg bg-emerald-800 hover:bg-emerald-700">
                    Register
                </button>
            </form>

            <div class="flex items-center my-6 space-x-2">
                <div class="flex-1 h-px bg-gray-300"></div>
                <span class="text-sm text-gray-500">or</span>
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>

            <div class="flex flex-col gap-3">
                <button class="flex items-center justify-center w-full gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google logo">
                    Register with Google
                </button>
            </div>

            <p class="mt-6 text-sm text-center text-gray-600">
                Have an account? <a href="{{ route('login') }}" class="text-emerald-600 hover:underline">Login</a>
            </p>
        </div>

        {{-- Kanan: Gambar --}}
        <div class="hidden w-1/2 md:block">
            <img src="{{ asset('images/register.jpg') }}" alt="Register" class="object-cover w-full h-full">
        </div>
    </div>
</div>
@endsection
