<div class="container" style="margin-top: 100px; margin-bottom: 50px;"> 
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"> 
                <div class="card-body" style="font-weight: bold;"> 
                    Edit Barang Rusak
                </div> 
                <div class="card-body"> 
                    <form action="<?php echo site_url('BarangRusak/update/' . $barang_rusak->id_barang_rusak); ?>" method="post"> 
                        <input type="hidden" name="id_barang_rusak" value="<?= $barang_rusak->id_barang_rusak ?>"> 
                        <div class="form-group"> 
                            <label for="id_alat">Nama Alat:</label> 
                            <select name="id_alat" id="id_alat" class="form-control" required> 
                                <option value="">Pilih Nama Alat</option> 
                                <?php foreach ($alat_medis as $am) : ?> 
                                    <option value="<?php echo $am->id_alat; ?>" <?php if ($barang_rusak->id_alat == $am->id_alat) echo 'selected'; ?>><?php echo $am->nama_alat; ?></option> 
                                <?php endforeach; ?> 
                            </select> 
                            <?php echo form_error('id_alat'); ?> 
                        </div> 
                        <div class="form-group"> 
                            <label for="tanggal_rusak">Tanggal Rusak:</label> 
                            <input type="date" name="tanggal_rusak" id="tanggal_rusak" class="form-control" value="<?php echo $barang_rusak->tanggal_rusak; ?>" required> 
                            <?php echo form_error('tanggal_rusak'); ?> 
                        </div> 
                        <div class="form-group"> 
                            <label for="jumlah_rusak">Jumlah Rusak:</label> 
                            <input type="number" name="jumlah_rusak" id="jumlah_rusak" class="form-control" value="<?php echo $barang_rusak->jumlah_rusak; ?>" required> 
                            <?php echo form_error('jumlah_rusak'); ?> 
                        </div> 
                        <div class="form-group"> 
                            <label for="alasan">Alasan:</label> 
                            <textarea name="alasan" id="alasan" class="form-control" required><?php echo $barang_rusak->alasan; ?></textarea> 
                            <?php echo form_error('alasan'); ?> 
                        </div> 
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>