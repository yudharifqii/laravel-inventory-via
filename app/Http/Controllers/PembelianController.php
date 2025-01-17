<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemasokRequest;
use App\Http\Requests\PembelianRequest;
use App\Http\Requests\PembelianUpdateRequest;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PenanggungJawab;
use Dompdf\Dompdf;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //

    public function index()
    {
        $pembelian = Pembelian::with('pemasok')->latest()->get();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $pemasok = Pemasok::all();
        $kategori = Kategori::all();
        $penanggungjawab = PenanggungJawab::all();

        return view('pembelian.tambah', compact('pemasok', 'kategori', 'penanggungjawab'));
    }

    public function store(PembelianRequest $request)
    {
        Pembelian::create([
            'tanggal' => $request->tanggal,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'pemasok_id' => $request->pemasok_id,
            'penanggungjawab_id' => $request->penanggungjawab_id,
            'jumlah' => $request->jumlah,
            'status' => 'Diajukan',
        ]);

        return redirect()->route('pembelianPage')->with('success', 'Data berhasil ditambah!');
    }

    public function edit(string $id)
    {
        //
        $pemasok = pemasok::all();
        $kategori = Kategori::all();
        $penanggungjawab = PenanggungJawab::all();
        $pembelian = pembelian::with('pemasok', 'kategori', 'penanggungjawab')->findOrfail($id);
        return view('pembelian.ubah', compact('pembelian', 'pemasok', 'kategori', 'penanggungjawab'));
    }

    public function show(string $id)
    {
        $detail = Pembelian::findOrfail($id);
        $pemasok = pemasok::all();
        return view('pembelian.detail', compact('detail', 'pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PembelianUpdateRequest $request, string $id)
    {
        $pembelian = pembelian::findOrfail($id);
        $pembelian->update([
            'tanggal' => $request->tanggal,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'pemasok_id' => $request->pemasok_id,
            'penanggungjawab_id' => $request->penanggungjawab_id,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
        ]);
        return redirect()->route('pembelianPage')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(string $id)
    {
        //
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelianPage')->with('success', 'Data berhasil dihapus!');
    }

    public function cetak(string $id)
    {
        $pembelian = pembelian::with('pemasok')->findOrfail($id);

        $cetak =  view('pembelian.surat', compact('pembelian'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($cetak->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        $options = array(
            'Attachment' => false
        );

        // Output PDF to browser
        return $dompdf->stream('Surat Pengadaan Barang.pdf', $options);
    }
}
