<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AkunController extends Controller
{
    public function index(): View
    {
        return view('akun.index');
    }

    public function updateUsername(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
        ]);

        Auth::user()->update($validated);

        return redirect()
            ->route('akun.index')
            ->with('success', 'Username berhasil diperbarui');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'password_lama' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($validated['password_lama'], Auth::user()->password)) {
            return back()->withErrors([
                'password_lama' => 'Password lama tidak sesuai',
            ]);
        }

        Auth::user()->update([
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()
            ->route('akun.index')
            ->with('success', 'Password berhasil diperbarui');
    }
}
