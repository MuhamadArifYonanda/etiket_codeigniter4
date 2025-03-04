<?= $this->extend('pemimpin/template_pemimpin') ?>

<?= $this->section('content') ?>

<div class="container pt-5">
    <div class="card">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center" style="color: white;">Data Pemesanan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order ID</th>
                            <th>Nama Pengunjung</th>
                            <th>Email Pengunjung</th>
                            <th>Atraksi yang dipilih</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi) && is_array($transaksi)): ?>
                            <?php $i = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                            <?php foreach ($transaksi as $item): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= esc($item['order_id']) ?></td>
                                    <td><?= esc($item['nama_pengunjung']) ?></td>
                                    <td><?= esc($item['email_pengunjung']) ?></td>
                                    <td><?= esc($item['nama_atraksi']) ?></td>
                                    <td>Rp. <?= number_format($item['total_pembayaran'], 2, ',', '.') ?></td>
                                    <td>
                                        <?php if ($item['status'] === 'pending'): ?>
                                            <span class="text-warning"><?= esc($item['status']) ?></span>
                                        <?php elseif ($item['status'] === 'settlement'): ?>
                                            <span class="text-success"><?= esc($item['status']) ?></span>
                                        <?php elseif ($item['status'] === 'failed'): ?>
                                            <span class="text-danger"><?= esc($item['status']) ?></span>
                                        <?php else: ?>
                                            <span class="text-muted"><?= esc($item['status']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc(date('d-m-Y H:i:s', strtotime($item['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada transaksi yang ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <?= $pager->links('default', 'pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>