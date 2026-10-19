<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Halaman Publik Produk (Untuk Pengunjung Website)
    public function publicIndex()
    {
        $products = Product::latest()->get();

        if (View::exists('products')) {
            return view('products', compact('products'));
        } elseif (View::exists('product')) {
            return view('product', compact('products'));
        } elseif (View::exists('user.products')) {
            return view('user.products', compact('products'));
        }

        return view('products', compact('products'));
    }

    // Halaman Admin: Menampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Halaman Admin: Form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Halaman Admin: Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'deskripsi'   => $request->deskripsi,
        ];

        // Proses Upload Gambar ke public/images/
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Pastikan folder public/images ada
            $destinationPath = public_path('images');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            
            $file->move($destinationPath, $filename);
            $data['gambar'] = $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman Admin: Form edit produk
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Halaman Admin: Update produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'deskripsi'   => $request->deskripsi,
        ];

        // Proses Upload Gambar Baru (Jika diisi)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $destinationPath = public_path('images');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            
            $file->move($destinationPath, $filename);
            
            // Hapus gambar lama jika ada (opsional, agar storage tidak penuh)
            if ($product->gambar && File::exists(public_path('images/' . $product->gambar))) {
                File::delete(public_path('images/' . $product->gambar));
            }

            $data['gambar'] = $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Halaman Admin: Hapus produk
    public function destroy(Product $product)
    {
        // Hapus file gambar fisik dari folder public/images
        if ($product->gambar && File::exists(public_path('images/' . $product->gambar))) {
            File::delete(public_path('images/' . $product->gambar));
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}