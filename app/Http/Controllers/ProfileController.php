<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Menampilkan form edit profil perusahaan
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    // Mengupdate data profil perusahaan
    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'tentang_kami' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
        ]);

        $profile = Profile::first();

        if ($profile) {
            $profile->update($request->all());
        } else {
            Profile::create($request->all());
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}