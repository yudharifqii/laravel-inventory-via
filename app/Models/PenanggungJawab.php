<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    use HasFactory;
    protected $table = 'penanggungjawabs';
    protected $fillable = ['nama', 'keterangan'];
}
