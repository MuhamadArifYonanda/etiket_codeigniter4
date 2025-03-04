<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>

<div class="container pt-5">
    <div class="text-left mb-4">
        <a href="<?= base_url('admin/add_deskripsi') ?>" class="btn" style="background-color: green; color: white;">Tambah Data</a>
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
                            <th>Kode Deskripsi</th>
                            <th>Nama Atraksi</th>
                            <th>Deskripsi</th>
                            <th>Dokumentasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($deskripsi) && is_array($deskripsi)) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($deskripsi as $deskripsi) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($deskripsi['kode_deskripsi']); ?></td>
                                    <td><?= htmlspecialchars($deskripsi['nama_atraksi']); ?></td>
                                    <td style="max-width: 300px; word-wrap: break-word; white-space: normal;">
                                    <?= (strlen($deskripsi['deskripsi']) > 80) ? htmlspecialchars(substr($deskripsi['deskripsi'], 0, 100)) . '...' : htmlspecialchars($deskripsi['deskripsi']); ?>
                                    </td>
                                    <td>
                                        <?php if ($deskripsi['dokumentasi']): ?>
                                            <img src="<?= base_url('uploads/dokumentasi/' . $deskripsi['dokumentasi']); ?>" alt="Dokumentasi" width="100">
                                        <?php else: ?>
                                            Tidak ada gambar
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/editDeskripsi' . $deskripsi['kode_deskripsi']); ?>" class="btn mb-2" style="background-color: green; color: white;">Edit</a>
                                        <a href="<?= base_url('admin/data_deskripsi/delete/' . $deskripsi['kode_deskripsi']); ?>" class="btn mb-2" style="background-color: red; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus data deskripsi ini?')">Hapus</a>
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