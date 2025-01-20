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

        $cetak = view('barang.cetak', compact('barang'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Data Barang.pdf', $options);
    }

    public function laporanbarangmasuk()
    {
        $barangmasuk = BarangMasuk::with('barang', 'satuan')->latest()->get();

        $cetak = view('barangmasuk.cetak', compact('barangmasuk'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Data Barang Masuk.pdf', $options);
    }

    public function laporanbarangkeluar()
    {
        $barangkeluar = BarangKeluar::with('barang', 'satuan')->latest()->get();

        $cetak = view('barangkeluar.cetak', compact('barangkeluar'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Data Barang Keluar.pdf', $options);
    }

    public function laporanpemasok()
    {
        $pemasok = Pemasok::latest()->get();

        $cetak = view('pemasok.cetak', compact('pemasok'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Data Pemasok.pdf', $options);
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

        $cetak = view('barang.rekap', compact('rekap', 'totalitem'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Rekapitulasi Barang.pdf', $options);
    }

    public function laporanpembelian()
    {

        $pembelian = pembelian::with('pemasok', 'kategori', 'penanggungjawab')->latest()->get();
        $cetak = view('pembelian.cetak', compact('pembelian'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Laporan Data Pembelian.pdf', $options);
    }
}
