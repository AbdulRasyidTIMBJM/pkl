<main class="content-wrapper">
    <div class="container">
        <h2>Surat Serah Terima Barang Keluar</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">Filter Data</button>
        <button type="button" class="btn btn-primary" id="cetakSurat">Cetak Surat</button>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Rusak</th>
                <th>Nama Alat</th>
                <th>Merk</th>
                <th>Nama Unit</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody id="dataBarangRusak">
            <?php $no = 1; foreach ($barang_rusak as $bk): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d-m-Y', strtotime($bk->tanggal_rusak)) ?></td>
                <td><?= $bk->nama_alat ?></td>
                <td><?= $bk->merk ?></td>
                <td><?= $bk->nama_unit ?></td>
                <td class="small-text"><?php echo $bk->alasan; ?></td>
                <td><input type="checkbox" name="id_barang_rusak[]" value="<?= $bk->id_barang_rusak ?>"></td>
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
                            <label>Unit</label>
                            <select name="id_unit" class="form-control">
                                <?php foreach ($this->BarangRusak_model->get_all_unit() as $unit) : ?>
                                    <option value="<?= $unit->id_unit ?>"><?= $unit->nama_unit ?></option>
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
            var idBarangRusak = [];
            $('input[name="id_barang_rusak[]"]:checked').each(function() {
                idBarangRusak.push($(this).val());
            });
            if (idBarangRusak.length > 0) {
                window.location.href = '<?= base_url('BarangRusak/cetak_surat_serah_terima') ?>?id_barang_rusak=' + idBarangRusak.join(',');
            } else {
                alert('Pilih data yang ingin di cetak!');
            }
        });

        // Tombol Apply Filter
        $('#applyFilter').click(function() {
            var tanggalAwal = $('input[name="tanggal_awal"]').val();
            var tanggalAkhir = $('input[name="tanggal_akhir"]').val();
            var idUnit = $('select[name="id_unit"]').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('BarangRusak/get_barang_rusak_by_filter') ?>',
                data: {
                    tanggal_awal: tanggalAwal,
                    tanggal_akhir: tanggalAkhir,
                    id_unit: idUnit
                },
                success: function(data) {
                    $('#dataBarangRusak').html(data);
                }
            });
        });
    });
</script>