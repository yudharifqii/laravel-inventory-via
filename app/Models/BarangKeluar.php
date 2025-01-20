<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    //

    protected $table = 'barangkeluars';
    protected $fillable = ['barang_id', 'tanggal_barang_keluar', 'jumlah', 'satuan_id', 'keterangan'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
