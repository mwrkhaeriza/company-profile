<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // Halaman Publik Artikel
    public function publicIndex()
    {
        $articles = Article::latest()->get();
        return view('article', compact('articles'));
    }

    // Halaman Admin: Menampilkan daftar artikel
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    // Halaman Admin: Form tambah artikel
    public function create()
    {
        return view('admin.articles.create');
    }

    // Halaman Admin: Simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan input 'isi' dari form langsung ke kolom 'konten' di database
        $data = [
            'judul'  => $request->judul,
            'konten' => $request->isi, 
            'slug'   => Str::slug($request->judul),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Halaman Admin: Form edit artikel
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Halaman Admin: Update artikel
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul'  => $request->judul,
            'konten' => $request->isi,
            'slug'   => Str::slug($request->judul),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Halaman Admin: Hapus artikel
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}