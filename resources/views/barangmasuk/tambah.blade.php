@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Tambah Barang Masuk</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('barang-masukStore')}}" method="post">
                            @csrf
                            <fieldset class="form-group">
                                <label for="barang">Barang</label>
                                <select class="form-select" id="barang" name="barang">
                                    <option value="">--Pilih--</option>
                                    @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                                @error('barang')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Tanggal Barang Masuk</label>
                                <input type="date" class="form-control flatpickr-no-config" name="tanggal_barang_masuk" id="tanggal_barang_masuk" placeholder="Select date..">
                                @error('tanggal_barang_masuk')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
                                @error('jumlah')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <fieldset class="form-group">
                                <label for="satuan_id">Satuan</label>
                                <select class="form-select" id="satuan_id" name="satuan_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($satuan as $data)
                                    <option value="{{$data->id}}">{{$data->satuan}}</option>
                                    @endforeach
                                </select>
                                @error('satuan_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('barang-masukPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection