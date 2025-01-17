<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengadaan Barang</title>


    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .kop-surat {
            text-align: left;
            justify-content: center;
        }

        .kop-surat h3,
        .kop-surat h4,
        .kop-surat p {
            margin: 1;
        }

        .catatan {
            margin-bottom: 0;
            margin-top: 100px;
            text-align: right;
            margin: 0;
        }

        .page-heading {
            margin-top: 0px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <div class=" kop-surat">
        <div class="row">
            <div class="col">
                <div class="text-content">
                    <img class="logo-left" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/static/images/logo/kop.png'))) }}" alt="logo" width="100%">
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Judul Laporan -->
    <div class="page-heading">
        <h3 style="text-align: center; margin-bottom: 3px">Surat Pengadaan Barang</h3>
        <h5 style="text-align: center; margin-top: 0px;">{{$pembelian->id}}/VIA/PENGADAAN/<?= date('Y') ?></h5>
    </div>

    <p style="text-align: right;">Banjarmasin, <?= date('d M Y') ?></p>





    <!-- Konten Laporan -->
    <div class="page-content">
        <p>Kepada Yth</p>
        <p>{{$pembelian->pemasok->nama ?? 'Data Sudah Dihapus'}}</p>
        <p>{{$pembelian->pemasok->alamat ?? 'Data Sudah Dihapus'}}</p>


        <p style="margin-bottom: 0px; margin-top: 50px; line-height: 2">Dengan Hormat, </p>
        <p style="margin-top: 0px; line-height: 2; text-align: justify;">Sehubungan dengan kebutuhan barang untuk keperluan operasional di PT. Via Digital Indonesia, kami bermaksud untuk melakukan pengadaan barang sebagai berikut:</p>


        <section class="row">
            <div class="col-12 col-md-12">
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-bold-500">{{$pembelian->nama_barang}}</td>
                                <td class="text-bold-500">{{$pembelian->jumlah}}</td>
                                <td class="text-bold-500">Rp. {{number_format($pembelian->harga_satuan, 2)}}</td>
                                <td class="text-bold-500">Rp. {{number_format($pembelian->total, 2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <p style="margin-top: 0px; line-height: 2; text-align: justify;">Demikian surat pengadaan ini kami buat dengan harapan agar dapat diproses secepatnya. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
            <div class="catatan">
                <p>Hormat Kami,</p>
                <img class="logo-left" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/static/images/logo/via.png'))) }}" alt="logo" width="15%">
                <p>PT. Via Digital Indonesia</p>
            </div>
        </section>
    </div>
</body>

</html>