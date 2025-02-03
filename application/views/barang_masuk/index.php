<main id="main" class="main" style="margin-left: 250px;">
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
        <?php } elseif ($this->session->flashdata('delete')) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fas fa-ban"></i> <?= $this->session->flashdata('delete') ?></h6>
            </div>
        <?php } ?>
        <!-- Button untuk membuka modal filter -->
        <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal" data-target="#filterModal">
            Filter Data
        </button>

        <!-- Modal Filter -->
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
                        <form method="GET" action="<?php echo site_url('BarangMasuk/index'); ?>">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" class="form-control" id="bulan">
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?= $i ?>" <?= ($i == $this->input->get('bulan')) ? 'selected' : '' ?>><?= date('F', mktime(0, 0, 0, $i, 1)) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" class="form-control" id="tahun" value="<?= $this->input->get('tahun') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" value="<?= $this->input->get('tanggal_awal') ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" value="<?= $this->input->get('tanggal_akhir') ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo site_url('BarangMasuk/create'); ?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus"></i> Tambah Data</a>
        <table id="example1" id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="font-size: 14px;">NO</th>
                    <th style="font-size: 14px;">Nama Alat</th>
                    <th style="font-size: 14px;">Merk</th> 
                    <th style="font-size: 14px;">Operator</th>
                    <th style="font-size: 14px;">Tanggal masuk</th>
                    <th style="font-size: 14px;">Jumlah masuk</th>
                    <th style="font-size: 14px;">Nama Unit</th>
                    <th style="font-size: 14px;">Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang_masuk as $bm): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->nama_alat; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->merk; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->nama; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->tanggal_masuk; ?></td>
                        <td><?php echo $bm->jumlah_masuk; ?></td>
                        <td style="font-size: 12px;"><?php echo $bm->nama_unit; ?></td>  
                        <td style="font-size: 12px;"><?php echo $bm->status; ?></td>
                        <td>
                            <a href="<?= base_url('BarangMasuk/edit/' . $bm->id_barang_masuk) ?> ?>" class="btn btn-sm mt-2 btn-primary">Edit</a>
                            <a href="<?= base_url('BarangMasuk/delete/' . $bm->id_barang_masuk) ?>" class="btn btn-sm mt-2 btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "pageLength": 5,
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
                "targets": 8
            }],
            "dom": '<"row"<"col-md-4"l><"col-md-4 text-center"B><"col-md-4 text-right"f>>rtip',
            "buttons": [{
                    extend: 'pdf',
                    title: 'Data Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'excel',
                    title: 'Data Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'print',
                    title: 'Data Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    },
                    action: function(e, dt, button, config) {
                        // Ganti URL dengan URL halaman print Anda
                        window.open('<?php echo site_url('BarangMasuk/reprint'); ?>', '_blank');
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                }
            ]
        }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>