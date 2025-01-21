<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    <h1><?= $title ?></h1>
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
                    <form action="<?php echo site_url('Alat/store/'); ?>" method="post">

                        <div class="form-group">
                            <label for="nama_alat">Nama Alat:</label>
                            <input type="text" name="nama_alat" id="nama_alat" class="form-control" required>
                            <?php echo form_error('nama_alat'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis alat:</label>
                            <input type="text" name="jenis" id="jenis" class="form-control" required>
                            <?php echo form_error('jenis'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            <?php echo form_error('jumlah'); ?>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk:</label>
                            <input type="text" name="merk" id="merk" class="form-control" required>
                            <?php echo form_error('merk'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi:</label>
                            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" required>
                            <?php echo form_error('spesifikasi'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>