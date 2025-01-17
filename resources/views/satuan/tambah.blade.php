@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Tambah Satuan</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('satuanStore')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="satuan">Nama Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" autocomplete="off">
                                @error('satuan')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('satuanPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection