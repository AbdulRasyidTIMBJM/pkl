<div class="main" style="margin-left: 250px; transition: margin 0.5s; overflow-x: hidden;">
            <?php if ($this->session->flashdata('pesan')) { ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-info"></i> <?= $this->session->flashdata('pesan') ?> </h6>
                </div>
            <?php  } ?>
        </div>
<body>
    <main id="main" class="main" style="margin-left: 250px;">
        <div class="row" style="margin-top: 50px;">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info" style="height: 120px;">
                    <div class="inner">
                        <h3 style="font-size: 24px;"><?= $total_alat; ?></h3>
                        <p style="font-size: 12px;">Total Alat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wrench" style="font-size: 24px;"></i>
                    </div>
                    <a href="<?= base_url('Alat'); ?>" class="small-box-footer" style="font-size: 12px;">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success" style="height: 120px;">
                    <div class="inner">
                        <h3 style="font-size: 24px;"><?= $total_bm; ?></h3>
                        <p style="font-size: 12px;">Barang Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-up" style="font-size: 24px;"></i>
                    </div>
                    <a href="<?= base_url('BarangMasuk'); ?>" class="small-box-footer" style="font-size: 12px;">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning" style="height: 120px;">
                    <div class="inner">
                        <h3 style="font-size: 24px;"><?= $total_bk; ?></h3>
                        <p style="font-size: 12px;">Barang Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-down" style="font-size: 24px;"></i>
                    </div>
                    <a href="<?= base_url('BarangKeluar'); ?>" class="small-box-footer" style="font-size: 12px;">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger" style="height: 120px;">
                    <div class="inner">
                        <h3 style="font-size: 24px;"><?= $total_br; ?></h3>
                        <p style="font-size: 12px;">Barang Rusak</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
                    </div>
                    <a href="<?= base_url('BarangRusak'); ?>" class="small-box-footer" style="font-size: 12px;">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="main-footer" style="position: fixed; bottom: 0; width: 100%;">
        <strong>&copy; 2023 <a href="#">Your Company</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <!-- /.row -->
    <style>
        .small-box {
            margin: 10px;
        }

        .small-box-footer {
            padding: 5px;
        }
    </style>
</body>

</html>