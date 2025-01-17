<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenanggungJawabRequest;
use App\Models\PenanggungJawab;
use Illuminate\Http\Request;

class PenanggungJawabController extends Controller
{
    //

    public function index()
    {
        //
        $penanggungjawab = PenanggungJawab::latest()->get();
        return view('penanggungjawab.index', compact('penanggungjawab'));
    }

    public function create()
    {
        //
        return view('penanggungjawab.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenanggungJawabRequest $request)
    {
        //
        PenanggungJawab::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('penanggungjawabPage')->with('success', 'Data berhasil ditambah!');
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
        $penanggungjawab = penanggungjawab::findOrfail($id);
        return view('penanggungjawab.ubah', compact('penanggungjawab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PenanggungJawabRequest $request, string $id)
    {
        //
        $penanggungjawab = penanggungjawab::findOrfail($id);
        $input = $request->all();
        $penanggungjawab->update($input);
        return redirect()->route('penanggungjawabPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $penanggungjawab = penanggungjawab::findOrFail($id);
        $penanggungjawab->delete();
        return redirect()->route('penanggungjawabPage')->with('success', 'Data berhasil dihapus!');
    }
}
