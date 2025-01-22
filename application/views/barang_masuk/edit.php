<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    Edit Barang masuk
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('BarangMasuk/update/' . $barang_masuk->id_barang_masuk); ?>" method="post">
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
                            <label for="id_unit">Nama Unit:</label>
                            <select name="id_unit" id="id_unit" class="form-control" required>
                                <option value="">Pilih Nama Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option value="<?php echo $u->id_unit; ?>" <?php if ($barang_masuk->id_unit == $u->id_unit) echo 'selected'; ?>><?php echo $u->nama_unit; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_unit'); ?>
                        </div>

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
                url: '<?php echo site_url('BarangMasuk/get_merk'); ?>',
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