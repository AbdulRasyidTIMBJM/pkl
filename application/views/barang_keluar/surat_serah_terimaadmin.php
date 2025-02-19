<main class="content-wrapper">
    <div class="container">
        <h2>Surat Serah Terima Barang Keluar</h2>
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">Filter Data</button>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" id="cetakSurat">Cetak Surat</button>
            </div>
        </div>
        <table id="example1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Unit</th>
                </tr>
            </thead>
            <tbody id="dataBarangKeluar">
                <?php $no = 1; foreach ($barang_keluar as $bk) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d-m-Y', strtotime($bk->tanggal_keluar)) ?></td>
                        <td><?= $bk->nama_alat ?></td>
                        <td><?= $bk->merk ?></td>
                        <td><?= $bk->jumlah_keluar?></td>
                        <td><?= $bk->nama ?></td>
                        <td><?= $bk->nama_unit ?></td>
                        <td><input type="checkbox" name="id_barang_keluar[]" value="<?= $bk->id_barang_keluar ?>"></td>
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
                                <option value="">Semua Unit</option>
                                <?php foreach ($this->BarangKeluar_model->get_all_unit() as $unit) : ?>
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
    <!-- Modal Konfirmasi Sebelum Cetak -->
    <div class="modal fade" id="konfirmasiCetakModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiCetakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiCetakModalLabel">Konfirmasi Cetak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama Pihak Pertama</label>
                            <input type="text" name="nama_pihak_pertama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jabatan Pihak Pertama</label>
                            <input type="text" name="jabatan_pihak_pertama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Pihak Kedua</label>
                            <input type="text" name="nama_pihak_kedua" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jabatan Pihak Kedua</label>
                            <input type="text" name="jabatan_pihak_kedua" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" id="konfirmasiCetak">Konfirmasi Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        // Tombol Cetak Surat
        $('#cetakSurat').click(function() {
            $('#konfirmasiCetakModal').modal('show');
        });

        // Tombol Apply Filter
        $('#applyFilter').click(function() {
            var tanggalAwal = $('input[name="tanggal_awal"]').val();
            var tanggalAkhir = $('input[name="tanggal_akhir"]').val();
            var idUnit = $('select[name="id_unit"]').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('BarangKeluaradmin/get_barang_keluar_by_filter') ?>',
                data: {
                    tanggal_awal: tanggalAwal,
                    tanggal_akhir: tanggalAkhir,
                    id_unit: idUnit
                },
                success: function(data) {
                    $('#dataBarangKeluar').html(data);
                }
            });
        });

        // Tombol Konfirmasi Cetak
        $('#konfirmasiCetak').click(function(e) {
            e.preventDefault();
            var namaPihakPertama = $('input[name="nama_pihak_pertama"]').val();
            var jabatanPihakPertama = $('input[name="jabatan_pihak_pertama"]').val();
            var namaPihakKedua = $('input[name="nama_pihak_kedua"]').val();
            var jabatanPihakKedua = $('input[name="jabatan_pihak_kedua"]').val();
            var idBarangKeluar = [];
            $('input[name="id_barang_keluar[]"]:checked').each(function() {
                idBarangKeluar.push($(this).val());
            });
            window.location.href = '<?= base_url('BarangKeluaradmin/cetak_surat_serah_terima') ?>?id_barang_keluar=' + idBarangKeluar.join(',') + '&nama_pihak_pertama=' + namaPihakPertama + '&jabatan_pihak_pertama=' + jabatanPihakPertama + '&nama_pihak_kedua=' + namaPihakKedua + '&jabatan_pihak_kedua=' + jabatanPihakKedua;
        }); 

        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 20, 30, -1],
                [5, 10, 20, 30, "All"]
            ],
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "columnDefs": [{
                "orderable": false,
                "targets": 7
            }],
            "dom": '<"row"<"col-md-4"l><"col-md-4 text-center"><"col-md-4 text-right"f>>rtip',
        });
    });
</script>