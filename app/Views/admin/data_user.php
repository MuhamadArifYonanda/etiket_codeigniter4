<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>

<div class="container pt-5">
    <div class="card">
        <div class="card-header" style="background-color: #007bff">
            <h4 class="card-title text-white text-center">Data Pengunjung</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped-col text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Admin</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $user['kode_admin'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['status'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <a href="/user/edit/<?= $user['kode_user'] ?>" class="btn mb-2" style="background-color: green; color: white;">Edit</a>
                                    <form action="/user/delete/<?= $user['kode_user'] ?>" method="post" style="display:inline-block;">
                                        <button type="submit" class="btn mb-2" style="background-color: red; color: white;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>