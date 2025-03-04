<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>
<div class="container p-5">
    <a href="<?= base_url('admin/data_atraksi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
    <div class="card-header" style="background-color: #007bff">
            <h4 class="card-title text-white text-center">Edit Data Atraksi</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($atraksi)) : ?>
                <form method="post" action="<?= base_url('admin/data_atraksi/update'); ?>">
                    <input type="hidden" name="kode_atraksi" value="<?= htmlspecialchars(is_object($atraksi) ? $atraksi->kode_atraksi : ($atraksi['kode_atraksi'] ?? '')); ?>">
                    <div class="form-group">
                        <label for="nama_atraksi">Nama atraksi</label>
                        <input type="text" id="nama_atraksi" name="nama_atraksi" class="form-control" value="<?= htmlspecialchars(is_object($atraksi) ? $atraksi->nama_atraksi : ($atraksi['nama_atraksi'] ?? '')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_atraksi">Harga Atraksi</label>
                        <input type="number" id="harga_atraksi" name="harga_atraksi" class="form-control" value="<?= htmlspecialchars(is_object($atraksi) ? $atraksi->harga_atraksi : ($atraksi['harga_atraksi'] ?? '')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="sk">Syarat dan Ketentuan</label>
                        <textarea id="sk" name="sk" class="form-control" required><?= htmlspecialchars(is_object($atraksi) ? $atraksi->sk : ($atraksi['sk'] ?? '')); ?></textarea>
                        <small class="form-text text-muted">Tekan Enter untuk menambah syarat dan ketentuan baru.</small>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update atraksi</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>