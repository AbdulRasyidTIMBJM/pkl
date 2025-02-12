<div class="content-wrapper">
    <div class="container">
        <h2>Edit Data Surat</h2>
        <form action="<?= base_url('BarangMasuk/update_surat/' . $barang_masuk->id_barang_masuk); ?>" method="POST">
            <div class="form-group">
                <label for="id_alat">Nama Alat</label>
                <select name="id_alat" class="form-control" required>
                    <option value="">Pilih Alat</option>
                    <?php foreach ($alat_medis as $alat): ?>
                        <option value="<?= $alat->id_alat; ?>" <?= ($alat->id_alat == $barang_masuk->id_alat) ? 'selected' : ''; ?>><?= $alat->nama_alat; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?= $barang_masuk->tanggal_masuk; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_masuk">Jumlah</label>
                <input type="number" name="jumlah_masuk" class="form-control" value="<?= $barang_masuk->jumlah_masuk; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_supplier">Supplier</label>
                <select name="id_supplier" class="form-control" required>
                    <option value="">Pilih Supplier</option>
                    <?php foreach ($supplier as $sup): ?>
                        <option value="<?= $sup->id_supplier; ?>" <?= ($sup->id_supplier == $barang_masuk->id_supplier) ? 'selected' : ''; ?>><?= $sup->nama_toko; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="proses pemesanan" <?= ($barang_masuk->status == 'proses pemesanan') ? 'selected' : ''; ?>>Proses Pemesanan</option>
                    <option value="verified" <?= ($barang_masuk->status == 'verified') ? 'selected' : ''; ?>>verified</option>
                    <option value="di batalkan" <?= ($barang_masuk->status == 'di batalkan') ? 'selected' : ''; ?>>Dibatalkan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="<?= base_url('BarangMasuk/indexbaru'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>