<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>
<div class="container p-5">
    <a href="<?= base_url('admin/data_deskripsi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center text-white">Tambah Data Deskripsi</h3>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('admin/data_deskripsi/save'); ?>" enctype="multipart/form-data">
                <input type="hidden" id="kode_deskripsi" name="kode_deskripsi" class="form-control" required>
                <div class="form-group mb-3">
                    <label for="kode_atraksi">Pilih Atraksi</label>
                    <select class="form-control" id="kode_atraksi" name="kode_atraksi" required>
                        <option value="">Nama Atraksi</option>
                        <?php foreach ($atraksiList as $d): ?>
                            <option value="<?= $d['kode_atraksi']; ?>" <?= (isset($deskripsi) && $deskripsi->kode_atraksi === $d['kode_atraksi']) ? 'selected' : ''; ?>>
                                <?= $d['nama_atraksi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= esc(isset($deskripsi) ? $deskripsi->deskripsi : ''); ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="dokumentasi">Dokumentasi</label>
                    <input type="file" id="dokumentasi" name="dokumentasi" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Upload gambar (max: 2MB)</small>
                    <?php if (isset($deskripsi) && $deskripsi->dokumentasi): ?>
                        <div class="mt-2">
                            <p>Gambar saat ini:</p>
                            <img src="<?= base_url('uploads/dokumentasi/' . esc($deskripsi->dokumentasi)); ?>" alt="Dokumentasi" class="img-thumbnail" style="max-width: 150px;">
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" style="background-color: #28a745; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Simpan</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>