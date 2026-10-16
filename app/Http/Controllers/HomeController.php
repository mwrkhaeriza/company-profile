<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // Menampilkan ringkasan produk dan artikel terbaru di halaman Home
        $products = Product::latest()->take(3)->get();
        $articles = Article::latest()->take(3)->get();
        
        return view('welcome', compact('products', 'articles'));
    }
}