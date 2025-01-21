<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
            <?php if ($this->session->flashdata('pesan')) { ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> <?= $this->session->flashdata('pesan') ?> </h5>
                </div>
            <?php  } ?>
        </div>
    </section>
</div>