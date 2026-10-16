<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Halaman Publik User: Menampilkan galeri khusus user
    public function publicIndex()
    {
        $galleries = Gallery::latest()->get();
        return view('gallery', compact('galleries')); // Mengarah ke resources/views/gallery.blade.php
    }

    // Halaman Admin: Menampilkan daftar galeri
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    // Halaman Admin: Form tambah galeri
    public function create()
    {
        return view('admin.galleries.create');
    }

    // Halaman Admin: Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori ?? 'Umum',
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galleries', 'public');
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil disimpan dan langsung tampil!');
    }

    // Halaman Admin: Form edit galeri
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    // Halaman Admin: Update galeri
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori ?? 'Umum',
        ];

        if ($request->hasFile('gambar')) {
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                Storage::disk('public')->delete($gallery->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Halaman Admin: Hapus galeri
    public function destroy(Gallery $gallery)
    {
        if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}