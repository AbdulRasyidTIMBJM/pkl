<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    <h4><?= $title ?></h4>
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
                    <form action="<?php echo site_url('BarangKeluar/store'); ?>" method="post">
                        <div class="form-group">
                            <label for="id_alat">Nama Alat:</label>
                            <select name="id_alat" class="form-control" required>
                                <option value="">Pilih Alat</option>
                                <?php foreach ($alat_medis as $alat): ?>
                                    <option value="<?= $alat->id_alat ?>"><?= $alat->nama_alat ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar:</label>
                            <input type="date" name="tanggal_keluar" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Keluar:</label>
                            <input type="number" name="jumlah_keluar" class="form-control" required>
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
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>