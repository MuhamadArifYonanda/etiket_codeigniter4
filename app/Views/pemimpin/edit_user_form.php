<?= $this->extend('pemimpin/template_pemimpin') ?>

<?= $this->section('content') ?>
<div class="container p-5">
    <a href="<?= base_url('pemimpin/data_user'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
        <div class="card-header" style="background-color: #007bff">
            <h4 class="card-title text-white text-center">Edit User</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($user)) : ?>
                <form method="post" action="<?= base_url('pemimpin/updateUser'); ?>">
                    <!-- Input hidden untuk kode_user -->
                    <input type="hidden" name="kode_user" value="<?= $user['kode_user'] ?>">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password (leave blank to keep current):</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="aktif" <?= $user['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= $user['status'] == 'nonaktif' ? 'selected' : '' ?>>Non Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" name="role" id="role">
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="pemimpin" <?= $user['role'] == 'pemimpin' ? 'selected' : '' ?>>Pemimpin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update user</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
