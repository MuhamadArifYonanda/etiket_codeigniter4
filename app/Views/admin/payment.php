<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tiket</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<CLIENT-KEY>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>


<body>
    <!-- Navbar Start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Politeknik Negeri Lampung</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a href="#" class="navbar-brand">
                    <h1 class="text-primary display-6">Agro<span class="text-secondary">Edutoursim</span></h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                            <a href="#" class="position-relative wow tada" data-wow-delay=".9s">
                                <i class="fa fa-phone-alt text-primary fa-2x me-3"></i>
                                <div class="position-absolute" style="top: -7px; left: 20px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column pe-3 border-end border-primary">
                            <span class=" text-primary">Layanan Pelanggan:</span>
                            <a href="#"><span class="text-secondary">+62-812-7207-7173 Anwar</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Payment Confirmation Section -->
    <!-- Bagian ini tetap seperti sebelumnya -->

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h1 class="text-center">Konfirmasi Pembayaran</h1>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Detail Pesanan</h5>
                            <p><strong>Total Pembayaran:</strong> Rp <?= number_format($total_pembayaran, 0, ',', '.'); ?></p>
                            <p><strong>Nama:</strong> <?= htmlspecialchars($nama_pengunjung); ?></p>
                            <p><strong>Atraksi yang Dipilih:</strong> <?= htmlspecialchars($nama_atraksi); ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($email_pengunjung); ?></p>
                            <p><strong>Telepon:</strong> <?= htmlspecialchars($no_hp); ?></p>
                            <hr>
                            <h5 class="card-title">Lanjutkan ke Pembayaran</h5>
                            <button id="pay-button" class="btn btn-primary btn-lg w-100">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Payment Confirmation Section End -->

    <!-- Footer Start -->
    <footer>
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-primary">LOCATION</h4>
                        <p>POLI TOUR & TRAVEL POLINELA</p>
                        <p><i class="fa fa-phone-alt text-primary me-2"></i> +62-857-8930-9672</p>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-primary">FOLLOW US</h4>
                        <a href="#"><i class="fab fa-facebook-f me-2"></i></a>
                        <a href="#"><i class="fab fa-instagram me-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Include Midtrans Snap.js -->
    <script>
        document.getElementById('pay-button').onclick = function () {
            const payButton = this;
            payButton.disabled = true;
            payButton.textContent = 'Memproses...';

            snap.pay('<?= $snapToken ?>', {
                onSuccess: function (result) {
                    alert('Pembayaran Berhasil!');
                    console.log(result);
                    window.location.href = '/pengunjung/cetak_tiket/' + result.order_id;
                },
                onPending: function (result) {
                    alert('Pembayaran Pending!');
                    console.log(result);
                    payButton.disabled = false;
                    payButton.textContent = 'Bayar Sekarang';
                },
                onError: function (result) {
                    alert('Pembayaran Gagal! Silakan coba lagi.');
                    console.log(result);
                    payButton.disabled = false;
                    payButton.textContent = 'Bayar Sekarang';
                },
                onClose: function () {
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
                    payButton.disabled = false;
                    payButton.textContent = 'Bayar Sekarang';
                }
            });
        };
    </script>

</body>

</html>
