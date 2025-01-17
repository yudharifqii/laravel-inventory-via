<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaworkspace</title>


    <link rel="shortcut icon" href="{{asset('assets/static/images/logo/via.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app-dark.css')}}">
</head>

<body>
    <script src="{{asset('assets/static/js/initTheme.js')}}"></script>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title text-center">Detail Data Barang</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <tbody>
                            <tr>
                                <th>Nama Barang</th>
                                <td class="text-bold-500">: {{$barang->nama}}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td class="text-bold-500">: {{$barang->jumlah}}</td>
                            </tr>
                            <tr>
                                <th>Harga Satuan</th>
                                <td class="text-bold-500">: Rp. {{number_format($barang->harga_satuan, 2)}}</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td class="text-bold-500">: {{$barang->kondisi}}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td class="text-bold-500">: {{$barang->kategori->nama_kategori ?? 'Data Sudah Dihapus'}}</td>
                            </tr>
                            <tr>
                                <th>Penanggung Jawab</th>
                                <td class="text-bold-500">: {{$barang->penanggungjawab->nama ?? 'Data Sudah Dihapus'}}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td class="text-bold-500">: {{$barang->keterangan}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pembelian</th>
                                <td class="text-bold-500">: {{ date('d M Y', strtotime($barang->tanggal_pembelian)) }}</td>
                            </tr>
                            <tr>
                                <th>Masa Pakai</th>
                                <td class="text-bold-500">: {{$barang->masa_pakai}} Tahun</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td class="text-bold-500">: Rp. {{number_format($barang->total_harga, 2)}}</td>
                            </tr>
                            <tr>
                                <th>Total Penyusutan</th>
                                <td class="text-bold-500">: Rp. {{number_format($barang->total_penyusutan, 2)}}</td>
                            </tr>
                            <tr>
                                <th>Foto Barang</th>
                                <td class="text-bold-500">: <img src="{{asset('images/'.$barang->foto_barang)}}" width="200"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="{{asset('assets/compiled/js/app.js')}}"></script>

</body>

</html>