<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>
<div class="container p-5">
    <a href="<?= base_url('admin/data_deskripsi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i> Kembali</a>
    <div class="card">
    <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center text-white">Edit Data Deskripsi</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($deskripsi)) : ?>
                <form method="post" action="<?= base_url('admin/data_deskripsi/update'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    
                    <!-- Hidden field for kode_deskripsi -->
                    <input type="hidden" name="kode_deskripsi" value="<?= htmlspecialchars($deskripsi['kode_deskripsi'] ?? ''); ?>">

                    <!-- Dropdown untuk nama atraksi -->
                    <div class="form-group">
                        <label for="kode_atraksi">Nama Atraksi</label>
                        <select class="form-control" id="kode_atraksi" name="kode_atraksi" required>
                            <option value="">Pilih Nama Atraksi</option>
                            <?php foreach ($atraksiList as $atraksi) : ?>
                                <option value="<?= $atraksi['kode_atraksi']; ?>" <?= ($deskripsi['kode_atraksi'] == $atraksi['kode_atraksi']) ? 'selected' : ''; ?>>
                                    <?= $atraksi['nama_atraksi']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Input untuk deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= htmlspecialchars($deskripsi['deskripsi'] ?? ''); ?></textarea>
                    </div>

                    <!-- Input untuk dokumentasi -->
                    <div class="form-group mb-3">
                        <label for="dokumentasi">Dokumentasi</label>
                        <input type="file" id="dokumentasi" name="dokumentasi" class="form-control" accept="image/*">
                        <?php if (!empty($deskripsi['dokumentasi'])) : ?>
                            <p class="mt-2">Gambar Saat Ini:</p>
                            <img src="<?= base_url('uploads/dokumentasi/' . $deskripsi['dokumentasi']); ?>" alt="Dokumentasi" class="img-thumbnail" style="max-width: 200px;">
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Deskripsi</button>
                </form>
            <?php else : ?>
                <p class="text-danger">Data Deskripsi tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
