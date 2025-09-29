<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama_kategori'=>'Undangan'],
            ['nama_kategori'=>'Pengumuman'],
            ['nama_kategori'=>'Nota Dinas'],
            ['nama_kategori'=>'Pemberitahuan'],
        ]);
    }
}
