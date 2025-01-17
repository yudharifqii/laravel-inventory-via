<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $totalbarang = Barang::sum('jumlah');
        $totalpemasok = DB::table('pemasoks')->count();
        $totaluser = DB::table('users')->count();

        $rekap = Kategori::select('kategoris.*')
            ->selectSub(function ($query) {
                $query->from('barangs')
                    ->select(DB::raw('SUM(jumlah)'))
                    ->whereColumn('barangs.kategori_id', 'kategoris.id');
            }, 'total_jumlah_barang')
            ->get();

        $totalJumlahBarang = $rekap->pluck('total_jumlah_barang')->toArray();
        $namaKategori = Kategori::pluck('nama_kategori')->toArray();





        $chart = LarapexChart::barChart()
            ->addData('Jumlah', $totalJumlahBarang)
            ->setWidth(1100)
            ->setHeight(400)
            ->setXAxis($namaKategori);



        return view('dashboard.index', compact('totalbarang', 'totalpemasok', 'totaluser', 'chart'));
    }
}
