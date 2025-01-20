<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangKeluarRequest;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangkeluar = BarangKeluar::with('barang')->latest()->get();
        return view('barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $satuan = Satuan::all();
        return view('barangkeluar.tambah', compact('barang', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangKeluarRequest $request)
    {
        //
        BarangKeluar::create([
            'barang_id' => $request->barang,
            'tanggal_barang_keluar' => $request->tanggal_barang_keluar,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
            'keterangan' => $request->keterangan,
        ]);

        DB::table('barangs')
            ->where('id', $request->barang)
            ->update([
                'jumlah' => DB::raw('jumlah - ' . (int)$request->jumlah),  // Menambahkan jumlah secara langsung
            ]);


        return redirect()->route('barang-keluarPage')->with('success', 'Data berhasil ditambah!');
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
        $barang_keluar = BarangKeluar::with('barang', 'satuan')->findOrfail($id);
        return view('barangkeluar.ubah', compact('barang_keluar', 'barang', 'satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barang = Barang::findOrFail($request->barang); // Ambil data barang yang dipilih

        // Kembalikan stok barang lama
        $barang->jumlah += $barangkeluar->jumlah;

        // Kurangi stok barang dengan jumlah baru
        $barang->jumlah -= $request->jumlah;

        // Simpan perubahan stok barang
        $barang->save();
        $barangkeluar->update([
            'barang_id' => $request->barang,
            'tanggal_barang_keluar' => $request->tanggal_barang_keluar,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
            'keterangan' => $request->keterangan,
        ]);



        return redirect()->route('barang-keluarPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barangKeluar = BarangKeluar::findOrFail($id);

        // Ambil data barang terkait
        $barang = Barang::findOrFail($barangKeluar->barang_id);

        // Mengembalikan stok barang dengan menambahkan jumlah barang keluar
        $barang->jumlah += $barangKeluar->jumlah;

        // Simpan perubahan stok barang
        $barang->save();

        // Hapus data barang keluar
        $barangKeluar->delete();
        return redirect()->route('barang-keluarPage')->with('success', 'Data berhasil dihapus!');
    }
}
