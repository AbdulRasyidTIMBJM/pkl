<div class="content-wrapper">
    <div class="container">
        <h2><?= $title; ?></h2>
        <form action="<?= base_url('BarangMasuk/store_surat'); ?>" method="POST">
            <div class="form-group">
                <label for="id_alat">Nama Alat</label>
                <select name="id_alat" class="form-control" required>
                    <option value="">Pilih Alat</option>
                    <?php foreach ($alat_medis as $alat): ?>
                        <option value="<?= $alat->id_alat; ?>"><?= $alat->nama_alat; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah_masuk">Jumlah</label>
                <input type="number" name="jumlah_masuk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_supplier">Supplier</label>
                <select name="id_supplier" class="form-control" required>
                    <option value="">Pilih Supplier</option>
                    <?php foreach ($supplier as $sup): ?>
                        <option value="<?= $sup->id_supplier; ?>"><?= $sup->nama_toko; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="hidden" name="status" value="proses pemesanan">
                <p>Proses Pemesanan</p>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('BarangMasuk/indexbaru'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>