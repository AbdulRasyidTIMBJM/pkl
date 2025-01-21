<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <!-- Tambahkan CSS AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css'); ?>">
    <style>
        /* Styling untuk halaman cetak */
        body {
            font-family: 'Arial', sans-serif;
        }

        #kopSurat {
            margin-bottom: 20px;
            text-align: center;
        }

        .kop-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .kop-logo {
            width: 80px;
            height: auto;
            margin-right: 20px;
        }

        .kop-text h2 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }

        .kop-text p {
            font-size: 14px;
            margin: 0;
        }

        hr {
            border: none;
            border-top: 1px solid black;
            margin-top: 10px;
        }

        /* Styling tabel untuk cetak */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <div id="kopSurat">
        <div class="kop-container">
            <img src="<?= base_url('assets/dist/img/logo.png'); ?>" alt="Logo Rumah Sakit" class="kop-logo">
            <div class="kop-text">
                <h2>RUMAH SAKIT ISLAM BANJARMASIN</h2>
                <p>Jl. Letjend. S. Parman No. 88 Telp. (0511) 3354896-3350332</p>
                <p>e-mail: rs_islambjm@yahoo.com Banjarmasin - Kode Pos 70115</p>
            </div>
        </div>
        <hr>
    </div>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Alat</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Merk</th>
                <th>Spesifikasi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($alat as $a): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_alat; ?></td>
                    <td><?php echo $a->jenis; ?></td>
                    <td><?php echo $a->jumlah; ?></td>
                    <td><?php echo $a->merk; ?></td>
                    <td><?php echo $a->spesifikasi; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        // Memulai print otomatis saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>