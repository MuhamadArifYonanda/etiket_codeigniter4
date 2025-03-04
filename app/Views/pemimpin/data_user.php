<?= $this->extend('pemimpin/template_pemimpin') ?>

<?= $this->section('content') ?>

<div class="container pt-5">
    <div class="text-left mb-4">
        <a href="<?= base_url('pemimpin/tambah_user') ?>" class="btn" style="background-color: green; color: white;">Tambah Data</a>
    </div>
    <div class="card">
        <div class="card-header" style="background-color: #007bff" ;>
            <h3 class="card-title text-center text-white"><?= htmlspecialchars($title); ?></h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user) && is_array($user)) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $user) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($user['username']); ?></td>
                                    <td><?= htmlspecialchars($user['status']); ?></td>
                                    <td><?= htmlspecialchars($user['role']); ?></td>
                                    <td>
                                        <a href="<?= base_url('pemimpin/edit/' . $user['kode_user']); ?>" class="btn mb-2" style="background-color: green; color: white;">Edit</a>
                                        <a href="<?= base_url('pemimpin/delete/' . $user['kode_user']); ?>" class="btn mb-2" style="background-color: red; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data deskripsi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>