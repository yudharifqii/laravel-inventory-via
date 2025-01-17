<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PublicController extends Controller
{
    //

    public function index(string $id)
    {
        $barang = Barang::with('kategori', 'penanggungjawab')->findOrfail($id);
        return view('public.show', compact('barang'));
    }
}
