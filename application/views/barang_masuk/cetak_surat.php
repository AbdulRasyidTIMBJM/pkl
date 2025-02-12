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

        table th,
        table td {
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

    <h2 style="text-align: center; margin-bottom: 0;">Surat Permintaan Barang Baru</h2>
    <p style="text-align: center; margin-top: 0;">Nomor Surat: SP/<?php echo date('d-m-Y', strtotime($barang_masuk[0]->tanggal_masuk)); ?>/<?php echo $barang_masuk[0]->id_barang_masuk; ?></p>
    <div class="row">
        <h3 style="margin: 0;">Kepada Yth.</h3>
        <?php foreach ($barang_masuk as $bm): ?>
            <p style="margin: 0;">Toko Peralatan Medis "<?php echo $bm->nama_toko; ?>"</p>
        <?php endforeach; ?>
        <p style="margin: 0;">Dari</p>
        <p style="margin: 0;">Unit CSSD</p>
        <p style="margin: 0;">Rumah Sakit ISLAM BANJARMASIN</p>
        <p style="margin: 0;">Jl. Letjend. S. Parman No. 88 Telp. (0511) 3354896-3350332</p>
        <p></p>
        <p>Perihal: Pemesanan Barang Medis</p>
    </div>
    <p>Dengan hormat,</p>
    <p>Sehubungan dengan kebutuhan unit CSSD Rumah Sakit Banjarmasin, kami bermaksud untuk memesan barang dengan rincian sebagai berikut:</p>
    <p>Kami harap barang dapat dikirim paling lambat 3-7 hari kedepan ke alamat Jl. Letjend. S. Parman No. 88, Unit CSSD. Pembayaran akan dilakukan sesuai dengan ketentuan yang telah disepakati.</p>
    <p>Demikian surat pemesanan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
    <table>
        <thead>
            <tr>
                <th style="font-size: 14px;">NO</th>
                <th style="font-size: 14px;">Nama Alat</th>
                <th style="font-size: 14px;">Merk</th>
                <th style="font-size: 14px;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($barang_masuk as $bm): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $bm->nama_alat; ?></td>
                    <td><?php echo $bm->merk; ?></td>
                    <td><?php echo $bm->jumlah_masuk; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <p>Demikian surat pemesanan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
    <br>
    <div style="text-align: right;">
        <p style="text-align: right;">Banjarmasin, <?php echo date('d-m-Y', strtotime($barang_masuk[0]->tanggal_masuk)); ?></p>
        <div style="display: inline-block; text-align: center;">
            <p>Hormat Kami</p>
            <p>Unit CSSD</p>
            <p>RUMAH SAKIT ISLAM BANJARMASIN</p>
            <br><br>
            <br><br>
            <p><?php echo $barang_masuk[0]->nama; ?></p>
        </div>
    </div>
</div>
</body>