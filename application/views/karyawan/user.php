<main id="main" class="main" style="margin-left: 250px;">
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>Nama</th>
          <th>Nomor Telepon</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($karyawan as $u): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $u->nama; ?></td>
            <td><?php echo $u->nomor_telepon; ?></td>
            <td><?php echo $u->alamat; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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
            "dom": '<"row"<"col-md-4"l><"col-md-4 text-center"><"col-md-4 text-right"f>>rtip',
            "buttons": [{
                    extend: 'pdf',
                    title: 'Data karyawan',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'excel',
                    title: 'Data karyawan',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                },
                {
                    extend: 'print',
                    title: 'Data karyawan',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    className: 'btn btn-sm btn-success mr-2 mt-2'
                }
            ]
        }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>