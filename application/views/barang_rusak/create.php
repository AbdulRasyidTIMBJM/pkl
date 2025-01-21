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
                    <form action="<?php echo site_url('BarangRusak/store'); ?>" method="post">
                        <div class="form-group">
                            <label for="id_alat">Nama Alat:</label>
                            <select name="id_alat" class="form-control" required>
                                <option value="">Pilih Alat</option>
                                <?php foreach ($alat_medis as $alat): ?>
                                    <option value="<?= $alat->id_alat ?>"><?= $alat->nama_alat ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="pengguna_id" value="<?= $this->session->userdata('id') ?>">
                        <div class="form-group">
                            <label for="tanggal_rusak">Tanggal Rusak:</label>
                            <input type="date" name="tanggal_rusak" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_rusak">Jumlah Rusak:</label>
                            <input type="number" name="jumlah_rusak" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan:</label>
                            <textarea name="alasan" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>