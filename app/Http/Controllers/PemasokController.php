<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemasokRequest;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    //
    public function index()
    {
        //
        $pemasok = Pemasok::latest()->get();
        return view('pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pemasok.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemasokRequest $request)
    {
        //
        Pemasok::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pemasokPage')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pemasok = pemasok::findOrfail($id);
        return view('pemasok.detail', compact('pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pemasok = Pemasok::findOrfail($id);
        return view('pemasok.ubah', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PemasokRequest $request, string $id)
    {
        //
        $pemasok = Pemasok::findOrfail($id);
        $input = $request->all();
        $pemasok->update($input);
        return redirect()->route('pemasokPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();
        return redirect()->route('pemasokPage')->with('success', 'Data berhasil dihapus!');
    }
}
