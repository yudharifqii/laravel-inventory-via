<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;



class LaporanController extends Controller
{
    //
    public function laporanbarang()
    {
        $barang = Barang::with('kategori')->latest()->get();

        return view('barang.laporan', compact('barang'));
    }

    public function laporanbarangmasuk()
    {
        $barangmasuk = BarangMasuk::with('barang', 'satuan')->latest()->get();

        return view('barangmasuk.laporan', compact('barangmasuk'));
    }

    public function laporanbarangkeluar()
    {
        $barangkeluar = BarangKeluar::with('barang', 'satuan')->latest()->get();

        return view('barangkeluar.laporan', compact('barangkeluar'));
    }

    public function laporanrekapitulasi()
    {
        $totalitem = Barang::sum('jumlah');;

        $rekap = Kategori::select('kategoris.*')
            ->selectSub(function ($query) {
                $query->from('barangs')
                    ->select(DB::raw('SUM(jumlah)'))
                    ->whereColumn('barangs.kategori_id', 'kategoris.id');
            }, 'total_jumlah_barang')
            ->get();

        return view('barang.laporanrekap', compact('rekap', 'totalitem'));
    }

    public function laporanpembelian()
    {

        $pembelian = pembelian::with('pemasok', 'kategori', 'penanggungjawab')->latest()->get();
        return view('pembelian.laporan', compact('pembelian'));
    }
}
