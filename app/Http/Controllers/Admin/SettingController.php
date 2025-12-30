<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function profile()
    {
        return view('admin.settings.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->forceFill($data)->save();

        return back()->with('status', __('Profile updated'));
    }

    public function password()
    {
        return view('admin.settings.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = $request->user();
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return back()->with('status', __('Password updated'));
    }

    public function appearance()
    {
        return view('admin.settings.appearance');
    }

    public function updateAppearance(Request $request)
    {
        $data = $request->validate([
            'theme' => ['required', 'in:system,light,dark'],
        ]);

        $request->session()->put('theme', $data['theme']);

        return back()->with('appearance_status', __('Appearance saved'));
    }
}
