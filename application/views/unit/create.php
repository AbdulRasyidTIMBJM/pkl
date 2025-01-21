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
                    <form action="<?php echo site_url('Unit/store/'); ?>" method="post">

                        <div class="form-group">
                            <label for="nama_unit">Nama Unit:</label>
                            <input type="text" name="nama_unit" id="nama_unit" class="form-control" required>
                            <?php echo form_error('nama_unit'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>