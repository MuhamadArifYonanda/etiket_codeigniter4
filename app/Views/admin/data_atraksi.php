<?= $this->extend('admin/template.php') ?>

<?= $this->section('content') ?>

<div class="container pt-5">
    <div class="text-left mb-4">
        <a href="<?= base_url('admin/add_atraksi') ?>" class="btn" style="background-color: green; color: white;">Tambah Data</a>
    </div>
    <!-- Tabel Data Atraksi -->
    <div class="card">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title text-center text-white">Data Atraksi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped-col text-center">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Kode Atraksi</th>
                            <th>Nama Atraksi</th>
                            <th>Harga Atraksi</th>
                            <th>Syarat dan ketentuan:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($getAtraksi) && is_array($getAtraksi)) : ?>
                            <?php $i = 1;
                            foreach ($getAtraksi as $Atraksi) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($Atraksi['kode_atraksi']); ?></td>
                                    <td><?= htmlspecialchars($Atraksi['nama_atraksi']); ?></td>
                                    <td class="harga"><?= htmlspecialchars($Atraksi['harga_atraksi']); ?></td>
                                    <td>
                                        <ol>
                                            <?php
                                            // Memisahkan syarat dan ketentuan berdasarkan baris baru
                                            $syarat = explode("\n", $Atraksi['sk']);
                                            foreach ($syarat as $item):
                                            ?>
                                                <li><?= htmlspecialchars(trim($item)); ?></li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/editAtraksi' . $Atraksi['kode_atraksi']); ?>" class="btn mb-2" style="background-color: green; color: white;">Edit</a>
                                        <a href="<?= base_url('admin/data_atraksi/delete/' . $Atraksi['kode_atraksi']); ?>" class="btn mb-2" style="background-color: red; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus data Atraksi ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data Atraksi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function formatRupiah(angka) {
        let rupiah = '';
        let angkakotor = angka.replace(/[^0-9]/g, '');
        let panjang = angkakotor.length;
        let j = 0;

        for (let i = panjang; i > 0; i--) {
            j++;
            if (j % 3 === 0 && i !== 1) {
                rupiah = '.' + angkakotor.charAt(i - 1) + rupiah;
            } else {
                rupiah = angkakotor.charAt(i - 1) + rupiah;
            }
        }
        return 'Rp ' + rupiah;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const hargaElements = document.querySelectorAll('.harga');
        hargaElements.forEach(function(element) {
            const harga = element.textContent;
            element.textContent = formatRupiah(harga);
        });
    });
</script>

<?= $this->endSection() ?>