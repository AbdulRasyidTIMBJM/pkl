<main class="content-wrapper">
    <div class="container">
        <h2>Surat Perminataan Barang Baru</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">Filter Data</button>
        <button type="button" class="btn btn-primary" id="cetakSurat">Cetak Surat</button>
        <a href="<?= base_url('BarangMasuk/create_surat'); ?>" class="btn btn-success">Tambah Data</a> <!-- Tombol Tambah Data -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="font-size: 14px;">NO</th>
                    <th style="font-size: 14px;">Nama Alat</th>
                    <th style="font-size: 14px;">Merk</th> 
                    <th style="font-size: 14px;">Tanggal</th>
                    <th style="font-size: 14px;">Jumlah</th>
                    <th style="font-size: 14px;">Supplier</th>
                    <th style="font-size: 14px;">Status</th>
                    <th style="font-size: 14px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($barang_masuk as $bm): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->nama_alat; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->merk; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->tanggal_masuk; ?></td>
                        <td><?php echo $bm->jumlah_masuk; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->nama_toko; ?></td>
                        <td>
                            <?php if ($bm->status == 'verified') { ?>
                                <span class="badge badge-success"><?= $bm->status ?></span>
                            <?php } elseif ($bm->status == 'di batalkan') { ?>
                                <span class="badge badge-danger"><?= $bm->status ?></span>
                            <?php } else { ?>
                                <span class="badge badge-warning"><?= $bm->status ?></span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= base_url('BarangMasuk/edit_surat/' . $bm->id_barang_masuk); ?>" class="btn btn-warning btn-sm">Edit</a> <!-- Tombol Edit -->
                            <input type="checkbox" name="id_barang_masuk[]" value="<?= $bm->id_barang_masuk ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Filter Data -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="id_supplier" class="form-control">
                                <?php foreach ($this->BarangMasuk_model->get_all_supplier() as $supplier) : ?>
                                    <option value="<?= $supplier->id_supplier ?>"><?= $supplier->nama_toko ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="applyFilter">Apply Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

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
        // Tombol Cetak Surat
        $('#cetakSurat').click(function() {
            var idBarangMasuk = [];
            $('input[name="id_barang_masuk[]"]:checked').each(function() {
                idBarangMasuk.push($(this).val());
            });
            if (idBarangMasuk.length > 0) {
                window.location.href = '<?= base_url('BarangMasuk/cetak_surat') ?>?id_barang_masuk=' + idBarangMasuk.join(',');
            } else {
                alert('Pilih data yang ingin di cetak!');
            }
        });

        // Tombol Apply Filter
        $('#applyFilter').click(function() {
            var tanggalAwal = $('input[name="tanggal_awal"]').val();
            var tanggalAkhir = $('input[name="tanggal_akhir"]').val();
            var idSupplier = $('select[name="id_supplier"]').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('BarangMasuk/get_barang_masuk_by_filter') ?>',
                data: {
                    tanggal_awal: tanggalAwal,
                    tanggal_akhir: tanggalAkhir,
                    id_supplier: idSupplier
                },
                success: function(data) {
                    $('#dataBarangMasuk').html(data);
                }
            });
        });
    });
</script>