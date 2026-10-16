<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Fungsi untuk User mengirim pesan dari halaman publik/kontak
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'subjek' => 'nullable|string|max:255',
            'pesan'  => 'required|string',
        ]);

        Contact::create([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'subjek' => $request->subjek ?? 'Pesan dari Website',
            'pesan'  => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim! Tim PT Solusi Koneksi Anda akan segera menghubungi Anda.');
    }

    // Halaman Admin: Menampilkan daftar pesan masuk
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // Halaman Admin: Menghapus pesan masuk
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}