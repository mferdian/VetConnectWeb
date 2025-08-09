<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function edit()
    {
        return view('auth.editProfile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_telp' => 'nullable|string|max:15',
            'umur' => 'nullable|integer|min:1',
        ]);

        $userModel = User::find($user->id);

        $userModel->name = $request->name;
        $userModel->email = $request->email;
        $userModel->no_telp = $request->no_telp;
        $userModel->umur = $request->umur;

        if ($request->password) {
            $userModel->password = Hash::make($request->password);
        }


        if ($request->hasFile('profile_photo')) {
            if ($userModel->profile_photo) {
                Storage::delete($userModel->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $userModel->profile_photo = $path;
        }

        $userModel->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    // Delete the account
    public function destroy()
    {
        $user = Auth::user();
        $userModel = User::find($user->id);

        if ($userModel->profile_photo) {
            Storage::delete($userModel->profile_photo);
        }

        $userModel->delete();
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
