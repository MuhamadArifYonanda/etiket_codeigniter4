<!-- app/Views/admin/laporan_filter.php -->

<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header" style="background-color: #007bff;">
            <h4 class="text-center text-white">Filter Data Laporan</h4>
        </div>
        <form method="POST" action="<?= base_url('admin/cetak_laporan') ?>">
            <div class="card-body">
                <!-- Filter Bulan -->
                <div class="form-group row mb-3">
                    <label for="bulan" class="col-sm-4 col-form-label">Bulan</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="bulan" name="bulan" required>
                            <option value="">---Pilih Bulan---</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>

                <!-- Filter Tahun -->
                <div class="form-group row mb-3">
                    <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="tahun" name="tahun" required>
                            <option value="">---Pilih Tahun---</option>
                            <?php
                            $tahun = date('Y'); // Current year
                            for ($i = $tahun; $i >= 2010; $i--) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" style="background-color: #007bff" ;>
                    <i class="fas fa-search"></i> Filter Laporan
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>