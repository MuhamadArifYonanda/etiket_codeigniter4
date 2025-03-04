<?= $this->extend('pemimpin/template_pemimpin') ?>

<?= $this->section('content') ?>

<div class="container p-5">
    <a href="<?= base_url('pemimpin/data_user'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center text-white">Tambah User</h3>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('pemimpin/insert_user'); ?>">
                <?= csrf_field() ?>
                <div class="form-group mb-3">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" id="username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non Aktif</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="role">Role:</label>
                    <select class="form-control" name="role" id="role">
                        <option value="admin">Admin</option>
                        <option value="pemimpin">Pemimpin</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #28a745; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Simpan</button>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>