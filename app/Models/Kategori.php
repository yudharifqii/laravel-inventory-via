<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function barang()
    {
        return $this->hasMany(barang::class)->orderBy('id', 'asc');
    }
}
