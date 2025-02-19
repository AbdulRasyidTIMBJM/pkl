<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    Edit Barang masuk
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('BarangMasukadmin/updatebaru/' . $barang_masuk->id_barang_masuk); ?>" method="post">
                        <input type="hidden" name="id_barang_masuk" value="<?= $barang_masuk->id_barang_masuk ?>">
                        <div class="form-group">
                            <label for="id_alat">Nama Alat:</label>
                            <select name="id_alat" id="id_alat" class="form-control" required>
                                <option value="">Pilih Nama Alat</option>
                                <?php foreach ($alat_medis as $am) : ?>
                                    <option value="<?php echo $am->id_alat; ?>" <?php if ($barang_masuk->id_alat == $am->id_alat) echo 'selected'; ?>><?php echo $am->nama_alat . ' - ' . $am->merk; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_alat'); ?>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="merk">merk:</label>
                            <input type="text" name="merk" id="merk" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk:</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            <?php echo form_error('tanggal_masuk'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Masuk:</label>
                            <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control" value="<?php echo $barang_masuk->jumlah_masuk; ?>" required>
                            <?php echo form_error('jumlah_masuk'); ?>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Nama supplier:</label>
                            <select name="id_supplier" id="id_supplier" class="form-control" required>
                                <option value="">Pilih Nama supplier</option>
                                <?php foreach ($supplier as $u) : ?>
                                    <option value="<?php echo $u->id_supplier; ?>" <?php if ($barang_masuk->id_supplier == $u->id_supplier) echo 'selected'; ?>><?php echo $u->nama_toko; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_supplier'); ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="status">Status Steril:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Belum Disterilkan" <?php if ($barang_masuk->status == 'Belum Disterilkan') echo 'selected'; ?>>Belum Disterilkan</option>
                                <option value="Sudah Disterilkan" <?php if ($barang_masuk->status == 'Sudah Disterilkan') echo 'selected'; ?>>Sudah Disterilkan</option>
                            </select>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="main-footer">
    <strong>&copy; 2023 <a href="#">Your Company</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#id_alat').change(function() {
            var id_alat = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('BarangMasukadmin/get_merk'); ?>',
                data: {
                    id_alat: id_alat
                },
                success: function(data) {
                    $('#merk').val(data);
                }
            });
        });
    });
</script>