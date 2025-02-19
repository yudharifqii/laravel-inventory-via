@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Tambah Barang</h3>
</div>
<div class="page-content">
    <section id="basic-vertical-layouts">
        <form action="{{Route('barangStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="nama">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                                            @error('nama')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off" readonly value="0">
                                            @error('jumlah')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <fieldset class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select class="form-select" id="kategori_id" name="kategori_id">
                                                <option value="">--Pilih--</option>
                                                @foreach($kategori as $data)
                                                <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Foto Barang</label>
                                            <input class="form-control" type="file" name="foto_barang" id="formFile">
                                            @error('foto_barang')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                            @error('keterangan')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex mt-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="{{Route('barangPage')}}"
                                                class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection