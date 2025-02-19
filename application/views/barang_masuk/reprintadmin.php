<main id="main" class="main" style="margin-left: 250px;">
  <div class="card">
    <div class="card-header">
      <h3> <?= $title ?>  </h3>
    </div>
    <div class="card-body">
      <form action="<?= site_url('BarangMasukadmin/print') ?>" method="get">
        <div class="form-group">
          <label for="tanggal_awal">Tanggal Awal:</label>
          <input type="date" name="tanggal_awal" required class="form-control form-control-sm">
        </div>
        <div class="form-group">
          <label for="tanggal_akhir">Tanggal Akhir:</label>
          <input type="date" name="tanggal_akhir" required class="form-control form-control-sm">
        </div>
        <button type="submit" class="btn btn-sm btn-success">Cetak</button>
      </form>
    </div>
  </div>
</main>
