<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Http\Requests\BarangUpdateRequest;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\PenanggungJawab;
use App\Models\Satuan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class BarangController extends Controller
{
    //

    public function index()
    {
        //
        $barang = Barang::with('kategori')->latest()->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('barang.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRequest $request)
    {
        $filename = null;
        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
        }

        Barang::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kategori_id' => $request->kategori_id,
            'foto_barang' => $filename,
            'keterangan' => $request->keterangan
        ]);


        return redirect()->route('barangPage')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = Barang::with('kategori')->findOrfail($id);
        return view('barang.detail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = Kategori::all();
        $barang = barang::with('kategori')->findOrfail($id);
        return view('barang.ubah', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangUpdateRequest $request, string $id)
    {
        //
        $barang = Barang::findOrfail($id);

        $filename = $barang->foto_barang; // Gunakan nama file lama sebagai default

        // Cek apakah ada file gambar baru
        if ($request->hasFile('foto_barang')) {
            // Hapus foto lama jika ada
            if ($barang->foto_barang) {
                $oldImagePath = public_path('images/' . $barang->foto_barang);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath); // Hapus file lama
                }
            }

            // Simpan file gambar baru
            $file = $request->file('foto_barang');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Buat nama file unik
            $file->move(public_path('images'), $filename); // Simpan di folder images
        }

        // Update data
        $barang->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kategori_id' => $request->kategori_id,
            'foto_barang' => $filename,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('barangPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        // Dapatkan path foto
        $fotoPath = public_path('images/' . $barang->foto_barang);

        // Hapus file foto dari server jika ada
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        // Hapus data dari database
        $barang->delete();

        return redirect()->route('barangPage')->with('success', 'Data berhasil dihapus!');
    }
}
