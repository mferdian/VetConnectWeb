@extends('layouts.app')

@section('title', 'Edit Profile - VetConnect')

@section('content')
<div class="max-w-4xl p-8 mx-auto my-12 bg-white shadow-lg rounded-xl">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('profile') }}" class="inline-flex items-center transition-colors text-emerald-700 hover:text-emerald-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Back to Profile
        </a>
    </div>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Edit Profile</h2>
            <p class="text-gray-600">Update your personal information</p>
        </div>
        <div class="relative">
            @if (Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                     class="w-16 h-16 border-4 rounded-full shadow-sm border-emerald-100">
            @else
                <div class="flex items-center justify-center w-16 h-16 bg-gray-200 border-4 rounded-full shadow-sm border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Profile Photo Upload -->
        <div class="p-6 mb-8 rounded-lg bg-gray-50">
            <label class="block mb-4 text-lg font-medium text-gray-700">Profile Photo</label>
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    @if (Auth::user()->profile_photo)
                        <img id='preview_img' class="object-cover w-20 h-20 border-2 rounded-full border-emerald-200"
                             src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Current profile photo">
                    @else
                        <div id='preview_placeholder' class="flex items-center justify-center w-20 h-20 bg-gray-200 border-2 rounded-full border-emerald-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <label class="block">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" name="profile_photo" id="profile_photo"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    <p class="mt-1 text-sm text-gray-500">JPEG, JPG or PNG (Max. 2MB)</p>
                </label>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="mb-8">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Personal Information</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="no_telp" value="{{ Auth::user()->no_telp }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Age</label>
                    <input type="text" name="umur" value="{{ Auth::user()->umur }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
            </div>
        </div>

        <!-- Password Update -->
        <div class="p-6 mb-8 rounded-lg bg-gray-50">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Change Password</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="password"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                           placeholder="Enter new password">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                           placeholder="Confirm new password">
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-500">Leave blank to keep current password</p>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end pt-6 space-x-4 border-t">
            <a href="{{ route('profile') }}"
               class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                Save Changes
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Preview uploaded image
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('preview_img');
                const placeholder = document.getElementById('preview_placeholder');

                if (preview) {
                    preview.src = event.target.result;
                } else if (placeholder) {
                    placeholder.innerHTML = `<img id='preview_img' class="object-cover w-20 h-20 border-2 rounded-full border-emerald-200" src="${event.target.result}" alt="Preview">`;
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
