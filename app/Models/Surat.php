<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
    'nomor','judul','kategori_id','tanggal','file_pdf'
];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}

