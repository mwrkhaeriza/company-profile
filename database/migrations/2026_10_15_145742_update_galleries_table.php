<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('galleries', 'judul')) {
                $table->string('judul')->after('id');
            }
            if (!Schema::hasColumn('galleries', 'kategori')) {
                $table->string('kategori')->after('judul');
            }
            if (!Schema::hasColumn('galleries', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('kategori');
            }
            if (!Schema::hasColumn('galleries', 'gambar')) {
                $table->string('gambar')->nullable()->after('keterangan');
            }
        });
    }

    public function down(): void
    {
        //
    }
};