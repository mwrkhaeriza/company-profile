<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGaleri = Gallery::count();

        return view('admin.dashboard', compact('totalGaleri'));
    }
}