<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    <?= $title ?>
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
                    <form action="<?php echo site_url('BarangMasukadmin/store'); ?>" method="post">
                        <div class="form-group">
                            <label for="id_alat">Nama Alat:</label>
                            <select name="id_alat" id="id_alat" class="form-control" required>
                                <option value="">Pilih Nama Alat</option>
                                <?php foreach ($alat_medis as $am) : ?>
                                    <option value="<?php echo $am->id_alat; ?>"><?php echo $am->nama_alat . ' - ' . $am->merk; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="merk">merk:</label>
                            <input type="text" name="merk" id="merk" class="form-control" readonly>
                        </div>
                        <input type="hidden" name="pengguna_id" value="<?= $this->session->userdata('id') ?>">
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk:</label>
                            <input type="date" name="tanggal_masuk" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Masuk:</label>
                            <input type="number" name="jumlah_masuk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_unit">Nama Unit:</label>
                            <select name="id_unit" class="form-control" required>
                                <option value="">Pilih Unit</option>
                                <?php foreach ($unit as $u): ?>
                                    <option value="<?= $u->id_unit ?>"><?= $u->nama_unit ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
<div class="form-group" style="display: none;">
    <label for="status">Status Steril:</label>
    <input type="hidden" name="status" id="status" class="form-control" value="Belum Disterilkan" required>
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