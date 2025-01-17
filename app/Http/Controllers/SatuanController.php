<?php

namespace App\Http\Controllers;

use App\Http\Requests\Satuan as RequestsSatuan;
use App\Http\Requests\SatuanRequest;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $satuan = Satuan::latest()->get();
        return view('satuan.index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('satuan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SatuanRequest $request)
    {
        //
        Satuan::create([
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('satuanPage')->with('success', 'Data berhasil ditambah!');
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
        $satuan = satuan::findOrfail($id);
        return view('satuan.ubah', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $satuan = satuan::findOrfail($id);
        $input = $request->all();
        $satuan->update($input);
        return redirect()->route('satuanPage')->with('success', 'Data berhasil diubah!');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $satuan = satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuanPage')->with('success', 'Data berhasil dihapus!');
    }
}
