<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //

    protected $table = 'barangs';
    protected $fillable = ['nama', 'jumlah', 'kategori_id', 'foto_barang', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
