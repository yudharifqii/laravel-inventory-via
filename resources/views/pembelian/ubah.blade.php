@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Ubah Pembelian</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('pembelianUpdate', $pembelian->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="formFile" class="form-label">Tanggal</label>
                                <input type="date" class="form-control flatpickr-no-config" name="tanggal" id="tanggal" placeholder="Select date.." value="{{$pembelian->tanggal}}">
                                @error('tanggal')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" autocomplete="off" value="{{$pembelian->nama_barang}}">
                                @error('nama_barang')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <fieldset class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="form-select" id="kategori_id" name="kategori_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($kategori as $data)
                                    <option value="{{$data->id}}" {{ $data->id == $pembelian->kategori_id ? 'selected' : '' }}>{{$data->nama_kategori}}</option>
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
                                    <option value="{{$data->id}}" {{ $data->id == $pembelian->pemasok_id ? 'selected' : '' }}>{{$data->nama}}</option>
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
                                    <option value="{{$data->id}}" {{ $data->id == $pembelian->penanggungjawab_id ? 'selected' : '' }}>{{$data->nama}}</option>
                                    @endforeach
                                </select>
                                @error('penanggungjawab_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off" value="{{$pembelian->jumlah}}">
                                @error('jumlah')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            @if(Auth::user()->role == 'Administrator')
                            <fieldset class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">--Pilih--</option>
                                    <option value="Diajukan" {{$pembelian->status =="Diajukan" ? 'selected' : ''}}>Diajukan</option>
                                    <option value="Disetujui" {{$pembelian->status =="Disetujui" ? 'selected' : ''}}>Disetujui</option>
                                    <option value="Dibatalkan" {{$pembelian->status =="Dibatalkan" ? 'selected' : ''}}>Dibatalkan</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            @else
                            <fieldset class="form-group">
                                <input type="hidden" class="form-control" id="status" name="status" value="{{ $pembelian->status }}" readonly>
                            </fieldset>
                            @endif
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