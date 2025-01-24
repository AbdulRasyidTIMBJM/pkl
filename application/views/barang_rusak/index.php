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
        <a href="<?php echo site_url('BarangRusak/create'); ?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus"></i> Tambah Data</a>
        <table id="example1" id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>Operator</th>
                    <th>Unit</th>
                    <th>Tanggal Rusak</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang_rusak as $br): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $br->nama_alat; ?></td>
                        <td><?php echo $br->merk; ?></td>
                        <td><?php echo $br->nama; ?></td>
                        <td><?php echo $br->nama_unit; ?></td>
                        <td><?php echo $br->tanggal_rusak; ?></td>
                        <td><?php echo $br->jumlah_rusak; ?></td>
                        <td class="small-text"><?php echo $br->alasan; ?></td>
                        <td>
                            <a href="<?= base_url('BarangRusak/edit/' . $br->id_barang_rusak) ?> ?>" class="btn btn-sm mt-2 btn-primary">Edit</a>
                            <a href="<?= base_url('BarangRusak/delete/' . $br->id_barang_rusak) ?>" class="btn btn-sm mt-2 btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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
                    "targets": 7
                },
                {
                    "orderable": false,
                    "targets": 8
                }, // Menonaktifkan pengurutan pada kolom ke-8 (indeks 7)
                {
                    "width": "7%",
                    "targets": 0
                }, // Mengatur lebar kolom "NO" (indeks 0)
                {
                    "width": "17%",
                    "targets": 1
                }, // Mengatur lebar kolom "Nama Alat" (indeks 1)
                {
                    "width": "12%",
                    "targets": 2
                }, // Mengatur lebar kolom "Operator" (indeks 2)
                {
                    "width": "15%",
                    "targets": 3
                }, // Mengatur lebar kolom "Tanggal Rusak" (indeks 3)
                {
                    "width": "10%",
                    "targets": 4
                }, // Mengatur lebar kolom "Jumlah Rusak" (indeks 4)
                {
                    "width": "10%",
                    "targets": 5
                }, // Mengatur lebar kolom "Keterangan" (indeks 5)
                {
                    "width": "13%",
                    "targets": 6
                }, // Mengatur lebar kolom "Aksi" (indeks 6)
                {
                    "width": "20%",
                    "targets":7
                },
                {
                    "width": "13%",
                    "targets": 8
                }
            ],
            "dom": '<"row"<"col-md-4"l><"col-md-4 text-center"B><"col-md-4 text-right"f>>rtip',
            "buttons": [{
                    extend: 'pdf',
                    title: 'Data Barang Rusak',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'excel',
                    title: 'Data Barang Rusak',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'print',
                    title: 'Data Barang Rusak',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    action: function(e, dt, button, config) {
                        // Ganti URL dengan URL halaman print Anda
                        window.open('<?php echo site_url('BarangRusak/reprint'); ?>', '_blank');
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                }
            ]
        }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>