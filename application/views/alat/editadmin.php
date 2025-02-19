<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="font-weight: bold;">
                    <h1><?= $title ?></h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('Alatadmin/update/' . $alat->id_alat); ?>" method="post">
                        <input type="hidden" name="id_alat" value="<?= $alat->id_alat ?>">
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat:</label>
                            <input type="text" name="nama_alat" id="nama_alat" class="form-control" value="<?php echo $alat->nama_alat; ?>" required>
                            <?php echo form_error('nama_alat'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis alat:</label>
                            <input type="text" name="jenis" id="jenis" class="form-control" value="<?php echo $alat->jenis; ?>" required>
                            <?php echo form_error('jenis'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo $alat->jumlah; ?>" required>
                            <?php echo form_error('jumlah'); ?>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk:</label>
                            <input type="text" name="merk" id="merk" class="form-control" value="<?php echo $alat->merk; ?>" required>
                            <?php echo form_error('merk'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi:</label>
                            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" value="<?php echo $alat->spesifikasi; ?>" required>
                            <?php echo form_error('spesifikasi'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>