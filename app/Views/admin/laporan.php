<!-- app/Views/admin/laporan.php -->

<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card mx-auto" style="width: 100%;">
    <div class="card-header text-white text-center" style="background-color: #007bff;">Laporan Transaksi</div>

        <div class="card-body">
            <!-- Menampilkan filter yang dipilih -->
            <h4>Data Laporan untuk Bulan: <?= $bulan ?> Tahun: <?= $tahun ?></h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Transaksi</th>
                        <th>Status</th>
                        <th>Nama Pengunjung</th>
                        <th>Atraksi yang dipilih</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Initialize row number
                    if (!empty($laporan)):
                        foreach ($laporan as $item):
                            if ($item['status'] === 'settlement'): ?>
                                <tr>
                                    <td><?= $no++ ?></td> <!-- Row number -->
                                    <td><?= $item['order_id'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><?= $item['nama_pengunjung'] ?></td>
                                    <td><?= $item['nama_atraksi'] ?></td>
                                    <td><?= number_format($item['total_pembayaran'], 2) ?></td>
                                    <td><?= date('d-m-Y', strtotime($item['created_at'])) ?></td>
                                </tr>
                        <?php
                            endif; // End of settlement status check
                        endforeach;
                    else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data transaksi untuk bulan dan tahun yang dipilih.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Display Total Income -->
            <h5>Total Penghasilan: <?= number_format($total_penghasilan, 2) ?></h5>

            <!-- Form to generate PDF -->
            <form method="POST" action="<?= base_url('admin/cetak_pdf') ?>" target="_blank">
                <input type="hidden" name="bulan" value="<?= $bulan ?>">
                <input type="hidden" name="tahun" value="<?= $tahun ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf"></i> Cetak PDF
                </button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>