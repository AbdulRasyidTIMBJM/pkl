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
    <a href="<?php echo site_url('Unit/create'); ?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus"></i> Tambah Data</a>
    <table id="example1" id="example2" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>Nama Unit</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($unit as $a): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $a->nama_unit; ?></td>
            <td>
              <a href="<?= base_url('Unit/edit/' . $a->id_unit) ?> ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="<?= base_url('Unit/delete/' . $a->id_unit) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "pageLength": 5,
      "lengthMenu": [ // Menentukan pilihan jumlah entri
        [5, 10, 20, 30, -1], // Nilai yang akan diterima
        [5, 10, 20, 30, "All"] // Label yang ditampilkan di dropdown
      ],
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "dom": '<"row"<"col-md-4"l><"col-md-4 text-center"><"col-md-4 text-right"f>>rtip',
    }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>

</html>