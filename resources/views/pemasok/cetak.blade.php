<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pemasok</title>


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
            margin-top: 0;
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
            margin-bottom: 40px;
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
        <h3 style="text-align: center;">Laporan Data Pemasok</h3>
    </div>

    <!-- Konten Laporan -->
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-md-12">
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemasok as $data)
                            <tr>
                                <td class="text-bold-500">{{$loop->iteration}}</td>
                                <td class="text-bold-500">{{$data->nama}}</td>
                                <td class="text-bold-500">{{$data->email}}</td>
                                <td class="text-bold-500">{{$data->telepon}}</td>
                                <td class="text-bold-500">{{$data->alamat}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="catatan">
                <p style="margin-bottom: 100px;">PT. Via Digital Indonesia</p>
                <p>M. Nicko Farizki</p>
                <p>Direktur</p>
            </div>
        </section>
    </div>
</body>

</html>