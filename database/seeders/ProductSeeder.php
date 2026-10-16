<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'nama_produk' => 'Layanan Internet Dedicated Fiber Optic',
                'kategori'    => 'Internet Dedicated',
                'status'      => 'Aktif',
                'harga'       => 2500000,
                'deskripsi'   => 'Koneksi internet dedicated simetris 1:1 dengan SLA 99.5% untuk kebutuhan bisnis.',
                'gambar'      => null,
            ],
            [
                'nama_produk' => 'Instalasi Jaringan LAN & Fiber Optic',
                'kategori'    => 'Jaringan & Infrastruktur',
                'status'      => 'Aktif',
                'harga'       => 5000000,
                'deskripsi'   => 'Perancangan dan penarikan kabel jaringan perkantoran & gedung.',
                'gambar'      => null,
            ],
            [
                'nama_produk' => 'Pemasangan IP CCTV System',
                'kategori'    => 'Security System',
                'status'      => 'Aktif',
                'harga'       => 3500000,
                'deskripsi'   => 'Sistem pemantauan keamanan pintar berbasis IP Camera dengan akses HP.',
                'gambar'      => null,
            ],
            [
                'nama_produk' => 'Managed Router & Network Service',
                'kategori'    => 'Managed Service',
                'status'      => 'Aktif',
                'harga'       => 1500000,
                'deskripsi'   => 'Pemeliharaan dan optimasi konfigurasi router/firewall jaringan.',
                'gambar'      => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}