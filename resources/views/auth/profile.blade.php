@extends('layouts.app')

@section('title', 'My Profile - VetConnect')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
<div class="max-w-4xl p-6 mx-auto my-8 bg-white shadow-lg rounded-xl">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center transition-colors text-emerald-700 hover:text-emerald-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Back to Home
        </a>
    </div>

    <!-- Profile Header -->
    <div class="flex flex-col items-center mb-8 text-center md:flex-row md:text-left md:justify-between">
        <div class="flex items-center mb-4 md:mb-0">
            <div class="relative mr-6">
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                         alt="Profile Photo"
                         class="object-cover w-20 h-20 border-4 rounded-full shadow-md border-emerald-100">
                @else
                    <div class="flex items-center justify-center w-20 h-20 text-3xl font-bold text-white border-4 rounded-full shadow-md bg-gradient-to-r from-emerald-600 to-emerald-800 border-emerald-100">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="absolute bottom-0 right-0 flex items-center justify-center w-6 h-6 rounded-full bg-emerald-500">
                    <i class="text-xs text-white fas fa-check"></i>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h1>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
                <div class="flex items-center mt-1 space-x-2 text-sm text-gray-500">
                    <span>Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                    <span class="text-gray-300">•</span>
                    <span class="text-emerald-600">
                        <i class="fas fa-circle"></i> Active
                    </span>
                </div>
            </div>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('profile.edit') }}"
               class="flex items-center px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 bg-emerald-600 rounded-lg hover:bg-emerald-700 hover:shadow-md">
                <i class="mr-2 text-sm fas fa-user-edit"></i> Edit Profile
            </a>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        <!-- Personal Information Card -->
        <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                <i class="mr-2 text-emerald-600 fas fa-user-circle"></i>
                Personal Information
            </h3>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Full Name</label>
                    <p class="mt-1 text-gray-800">{{ Auth::user()->name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Email Address</label>
                    <p class="mt-1 text-gray-800">{{ Auth::user()->email }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Phone Number</label>
                        <p class="mt-1 text-gray-800">{{ Auth::user()->no_telp ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Age</label>
                        <p class="mt-1 text-gray-800">{{ Auth::user()->umur ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Information Card -->
        <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                <i class="mr-2 text-emerald-600 fas fa-shield-alt"></i>
                Account Security
            </h3>

            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Password</label>
                        <p class="mt-1 text-sm text-gray-800">Last changed 3 months ago</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-800">
                        Change
                    </a>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Two-Factor Authentication</label>
                        <p class="mt-1 text-sm text-gray-800">Not enabled</p>
                    </div>
                    <button class="text-sm font-medium text-emerald-600 hover:text-emerald-800">
                        Enable
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Login Activity</label>
                        <p class="mt-1 text-sm text-gray-800">Last login: {{ now()->format('M j, Y H:i') }}</p>
                    </div>
                    <button class="text-sm font-medium text-emerald-600 hover:text-emerald-800">
                        View All
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
