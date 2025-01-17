@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Tambah Pembelian</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('pembelianStore')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="formFile" class="form-label">Tanggal</label>
                                <input type="date" class="form-control flatpickr-no-config" name="tanggal" id="tanggal" placeholder="Select date..">
                                @error('tanggal')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" autocomplete="off">
                                @error('nama_barang')
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
                            <fieldset class="form-group">
                                <label for="pemasok_id">Pemasok</label>
                                <select class="form-select" id="pemasok_id" name="pemasok_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($pemasok as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                                @error('pemasok_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="penanggungjawab_id">Penanggung Jawab</label>
                                <select class="form-select" id="penanggungjawab_id" name="penanggungjawab_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($penanggungjawab as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                                @error('penanggungjawab_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
                                @error('jumlah')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('pembelianPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection