<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangMasukRequest;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangmasuk = BarangMasuk::with('barang')->latest()->get();
        return view('barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $satuan = Satuan::all();
        return view('barangmasuk.tambah', compact('barang', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangMasukRequest $request)
    {
        //


        BarangMasuk::create([
            'barang_id' => $request->barang,
            'tanggal_barang_masuk' => $request->tanggal_barang_masuk,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
        ]);

        DB::table('barangs')
            ->where('id', $request->barang)
            ->update([
                'jumlah' => DB::raw('jumlah + ' . (int)$request->jumlah),  // Menambahkan jumlah secara langsung
            ]);


        return redirect()->route('barang-masukPage')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $barang = barang::all();
        $satuan = Satuan::all();
        $barang_masuk = BarangMasuk::with('barang', 'satuan')->findOrfail($id);
        return view('barangmasuk.ubah', compact('barang_masuk', 'barang', 'satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangMasukRequest $request, string $id)
    {
        //
        $barangmasuk = BarangMasuk::findOrfail($id);

        $jumlahLama = $barangmasuk->jumlah;

        // Ambil jumlah baru dari input request
        $jumlahBaru = $request->jumlah;

        // Hitung selisih jumlah yang perlu diubah
        $selisihJumlah = $jumlahBaru - $jumlahLama;

        // Ambil data barang terkait
        $barang = Barang::findOrFail($request->barang);

        // Update jumlah barang di tabel barang
        $barang->jumlah += $selisihJumlah;  // Tambah atau kurangi jumlah berdasarkan selisih
        $barang->save();
        $barangmasuk->update([
            'barang_id' => $request->barang,
            'tanggal_barang_masuk' => $request->tanggal_barang_masuk,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
        ]);



        return redirect()->route('barang-masukPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barang-masukPage')->with('success', 'Data berhasil dihapus!');
    }
}
