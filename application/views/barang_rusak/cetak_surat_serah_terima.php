<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css'); ?>">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        #kopSurat {
            text-align: center;
            margin-bottom: 30px;
        }

        .kop-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .kop-logo {
            width: 70px;
            height: auto;
            margin-right: 15px;
        }

        .kop-text h2 {
            font-size: 20px;
            margin: 0;
            font-weight: bold;
        }

        .kop-text p {
            font-size: 14px;
            margin: 0;
        }

        hr {
            border: 1px solid black;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .signature div {
            width: 45%;
        }

        .signature p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div id="kopSurat">
        <div class="kop-container">
            <img src="<?= base_url('assets/dist/img/logo.png'); ?>" alt="Logo Rumah Sakit" class="kop-logo">
            <div class="kop-text">
                <h2>RUMAH SAKIT ISLAM BANJARMASIN</h2>
                <p>Jl. Letjend. S. Parman No. 88 Telp. (0511) 3354896-3350332</p>
                <p>Email: rs_islambjm@yahoo.com Banjarmasin - Kode Pos 70115</p>
            </div>
        </div>
        <hr>
    </div>

    <h2 style="text-align: center;">Surat Serah Terima Barang Keluar</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>PIHAK PERTAMA</h4>
            <p>Nama: </p>
            <p>Jabatan: </p>
        </div>
        <div class="col-md-6">
            <h4>PIHAK KEDUA</h4>
            <p>Nama: </p>
            <p>Jabatan: </p>
        </div>
    </div>
    <p>PIHAK PERTAMA adalah UNIT yang menyerahkan barang ke Unit CSSD dan unit CSSD adalah sebagai PIHAK KEDUA.</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Rusak</th>
                <th>Nama Alat</th>
                <th>Merk</th>
                <th>Nama Unit</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($barang_rusak as $bk): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d-m-Y', strtotime($bk->tanggal_rusak)) ?></td>
                <td><?= $bk->nama_alat ?></td>
                <td><?= $bk->merk ?></td>
                <td><?= $bk->nama_unit ?></td>
                <td class="small-text"><?php echo $bk->alasan; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="signature">
        <div>
            <p>Penerima,</p>
            <p>(PIHAK KEDUA)</p>
            <br><br>
            <br><br>
            <p>(.............................................)</p>
        </div>
        <div>
            <p>Penyerah,</p>
            <p>(PIHAK PERTAMA)</p>
            <br><br>
            <br><br>
            <p>(.............................................)</p>
        </div>
    </div>
</body>
</html>