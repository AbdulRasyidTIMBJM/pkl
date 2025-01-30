<div class="main" style="margin-left: 250px; transition: margin 0.5s; overflow-x: hidden;">
<div class="container mt-4">
    <h2>Profil Pengguna</h2>
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="<?= get_user_image(); ?>" alt="Profil" style="height: 200px; object-fit: cover;">
        </div>
        <div class="col-md-8">
    <h5 class="card-title"><strong>Nama:</strong> <?= $user['nama'] ?></h5>
    <p class="card-text">
        <strong>Username:</strong> <?= $user['username'] ?><br>
        <strong>Alamat:</strong> <?= $user['alamat'] ?><br>
        <strong>Nomor Telepon:</strong> <?= $user['nomor_telepon'] ?><br>
        <strong>Level:</strong> <?= $user['level'] == 1 ? 'Admin' : 'User' ?>
    </p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Edit Profil</button>
        </div>
    </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('profileadmin/update_profile') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required><?= $user['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control" value="<?= $user['nomor_telepon'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Profil</label>
                        <input type="file" name="img" class="form-control">
                        <small>*Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='<?= base_url('Profileadmin') ?>'">Batal</button>
<button type="submit" class="btn btn-success" onclick="window.location.href='<?= base_url('Profileadmin') ?>'">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>
<footer style="position: fixed; bottom: 0; padding: 10px;"> 
    
