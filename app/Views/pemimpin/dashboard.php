<?= $this->extend('pemimpin/template_pemimpin') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard</h1>
    </div>

    <!-- Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title text-white">Total Pengunjung</h5>
                    <p class="card-text h3 text-white"><?= $totalPengunjung; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title text-white">Total Transaksi</h5>
                    <p class="card-text h3 text-white"><?= $totalTransaksi; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title text-white">Total Pembayaran</h5>
                    <p class="card-text h3 text-white">Rp <?= number_format($totalPembayaran, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>


    <!-- Chart -->
    <div class="container mt-4">
        <h1 class="h3 mb-4">Atraksi Paling Banyak Dipesan</h1>

        <div class="card">
            <div class="card-body">
                <canvas id="chartPesanan"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPesanan').getContext('2d');
    const chartPesanan = new Chart(ctx, {
        type: 'bar', // Tipe chart (bar, pie, dll.)
        data: {
            labels: <?= json_encode($chartData['labels']) ?>, // Nama atraksi
            datasets: [{
                label: 'Jumlah Pesanan',
                data: <?= json_encode($chartData['pesanan']) ?>, // Jumlah pesanan
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Sembunyikan legenda jika hanya satu dataset
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<?= $this->endSection() ?>