<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //

    protected $table = 'barangmasuks';
    protected $fillable = ['barang_id', 'tanggal_barang_masuk', 'jumlah', 'satuan_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
