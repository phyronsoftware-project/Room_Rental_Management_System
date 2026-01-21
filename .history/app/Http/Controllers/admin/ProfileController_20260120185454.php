<?php

namespace App\Http\Controllers\admin;

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $u = auth()->user();

        // store in storage/app/public/avatars
        $path = $request->file('avatar')->store('avatars', 'public');

        // save relative path in DB
        $u->profile_image_url = $path;
        $u->save();

        return back()->with('avatar_ok', 'Avatar updated successfully.');
    }

    public function updateProfile(Request $request)
    {
        $u = auth()->user();

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($u->user_id, 'user_id')],
            'phone' => ['required', 'string', 'max:50'],
            'telegram' => ['nullable', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:1000'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);

        $u->full_name = $request->full_name;
        $u->email = $request->email;
        $u->phone = $request->phone;
        $u->telegram = $request->telegram;
        $u->address = $request->address;
        $u->note = $request->note;
        $u->save();

        return back()->with('profile_ok', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $u = auth()->user();

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if (! Hash::check($request->current_password, $u->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $u->password = Hash::make($request->password);
        $u->save();

        return back()->with('pass_ok', 'Password updated successfully.');
    }
}
