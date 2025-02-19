<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    Edit Barang Keluar
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6><i class="icon fas fa-check"></i> <?= $this->session->flashdata('success') ?> </h6>
                        </div>
                    <?php } elseif ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6><i class="icon fas fa-exclamation-triangle"></i> <?= $this->session->flashdata('error') ?> </h6>
                        </div>
                    <?php } ?>
                    <form action="<?php echo site_url('BarangKeluaradmin/update/' . $barang_keluar->id_barang_keluar); ?>" method="post">
                        <input type="hidden" name="id_barang_keluar" value="<?= $barang_keluar->id_barang_keluar ?>">
                        <div class="form-group">
                            <label for="id_alat">Nama Alat:</label>
                            <select name="id_alat" id="id_alat" class="form-control" required>
                                <option value="">Pilih Nama Alat</option>
                                <?php foreach ($alat_medis as $am) : ?>
                                    <option value="<?php echo $am->id_alat; ?>" <?php if ($barang_keluar->id_alat == $am->id_alat) echo 'selected'; ?>><?php echo $am->nama_alat . ' - ' . $am->merk; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_alat'); ?>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="merk">merk:</label>
                            <input type="text" name="merk" id="merk" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Keluar:</label>
                            <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control" value="<?= $barang_keluar->jumlah_keluar ?>" required>
                            <?php echo form_error('jumlah_keluar'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar:</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            <?php echo form_error('tanggal_keluar'); ?>
                        </div>
                        <div class="form-group">
                            <label for="id_unit">Nama Unit:</label>
                            <select name="id_unit" id="id_unit" class="form-control" required>
                                <option value="">Pilih Nama Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option value="<?php echo $u->id_unit; ?>" <?php if ($barang_keluar->id_unit == $u->id_unit) echo 'selected'; ?>><?php echo $u->nama_unit; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_unit'); ?>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Steril:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Sudah Disterilkan" <?php if ($barang_keluar->status == 'Sudah Disterilkan') echo 'selected'; ?>>Sudah Disterilkan</option>
                                <option value="Belum Disterilkan" <?php if ($barang_keluar->status == 'Belum Disterilkan') echo 'selected'; ?>>Belum Disterilkan</option>
                            </select>
                            <?php echo form_error('status'); ?>
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
                url: '<?php echo site_url('BarangKeluar/get_merk'); ?>',
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