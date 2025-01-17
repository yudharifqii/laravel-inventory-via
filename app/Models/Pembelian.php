<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';
    protected $fillable = ['tanggal', 'nama_barang', 'kategori_id', 'pemasok_id', 'penanggungjawab_id', 'jumlah', 'status'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penanggungjawab()
    {
        return $this->belongsTo(PenanggungJawab::class);
    }
}
