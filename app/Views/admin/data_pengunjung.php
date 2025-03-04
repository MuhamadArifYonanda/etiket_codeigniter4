<?= $this->extend('admin/template.php') ?>

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
                            <th>Kode Pengunjung</th>
                            <th>Atraksi yang Di Pilih</th>
                            <th>Email</th>
                            <th>Nama Pengunjung</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($getPengunjung) && is_array($getPengunjung)) : ?>
                            <?php $i = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                            <?php foreach ($getPengunjung as $pengunjung) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $pengunjung['kode_pengunjung']; ?></td>
                                    <td><?= $pengunjung['nama_atraksi']; ?></td>
                                    <td><?= $pengunjung['email_pengunjung']; ?></td>
                                    <td><?= $pengunjung['nama_pengunjung']; ?></td>
                                    <td><?= $pengunjung['jk']; ?></td>
                                    <td><?= $pengunjung['no_hp']; ?></td>
                                    <td><?= 'Rp ' . number_format($pengunjung['total_pembayaran'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pengunjung</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tombol paginasi -->
            <div class="d-flex justify-content-center mt-3">
                <?= $pager->links('default', 'pagination'); ?>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
