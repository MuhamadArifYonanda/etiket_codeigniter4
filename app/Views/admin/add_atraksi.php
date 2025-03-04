<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>
<div class="container p-5">
    <a href="<?= base_url('admin/data_atraksi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center text-white">Tambah Data Atraksi</h3>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/admin/data_atraksi/save'); ?>">
                <input type="text" name="kode_atraksi" class="form-control" value="<?= htmlspecialchars($kode_atraksi); ?>" readonly>
                <div class="form-group mb-3">
                    <label for="nama_atraksi">Nama Atraksi</label>
                    <input type="text" name="nama_atraksi" class="form-control" value="<?= htmlspecialchars($data_atraksi->nama_atraksi ?? ''); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="harga_atraksi">Harga Atraksi</label>
                    <input type="number" name="harga_atraksi" class="form-control" value="<?= htmlspecialchars($data_atraksi->harga_atraksi ?? ''); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="sk">Syarat dan Ketentuan</label>
                    <textarea name="sk" class="form-control" rows="3" required placeholder="Tulis syarat dan ketentuan di sini, tekan Enter untuk menambah item baru."><?= htmlspecialchars($data_atraksi->sk ?? ''); ?></textarea>
                    <small class="form-text text-muted">Tekan Enter untuk menambah syarat dan ketentuan baru.</small>
                </div>
                <button type="submit" style="background-color: #28a745; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Simpan</button>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>