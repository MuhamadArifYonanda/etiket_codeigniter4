<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agroedutorism Polinela|E-Ticket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <!-- Top Bar -->
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px;">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3">
                        <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                        <a href="#" class="text-white">Politeknik Negeri Lampung</a>
                    </small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-lg py-3">
                <a href="#" class="navbar-brand">
                    <h1 class="text-primary display-6">Agro-<span class="text-secondary">Edutourism</span></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto d-flex gap-3">
                        <a href="#tiket" class="nav-link btn btn-primary text-white my-2 my-lg-0">Beli Tiket</a>
                        <a href="#atraksi" class="nav-link btn btn-primary text-white my-2 my-lg-0">Informasi Atraksi</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <a href="#" class="position-relative wow tada" data-wow-delay=".9s">
                            <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                        <div class="d-flex flex-column pe-3 border-end border-primary">
                            <span class="text-primary">Layanan Pelanggan:</span>
                            <a href="#"><span class="text-secondary">+62-812-7207-7173 Anwar</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Navbar End -->
    <?= $this->renderSection('content') ?>
    <!-- About Start -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Carousel Gambar -->
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div id="photoCarousel" class="carousel slide border" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/foto.png" class="d-block w-100 img-height" alt="Foto 1">
                            </div>
                            <div class="carousel-item">
                                <img src="img/foto2.png" class="d-block w-100 img-height" alt="Foto 2">
                            </div>
                            <div class="carousel-item">
                                <img src="img/foto3.png" class="d-block w-100 img-height" alt="Foto 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Konten About -->
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">About Us</h4>
                    <h1 class="text-dark mb-4 display-5">Agroedutourism Polinela: Serunya Rekreasi sambil Belajar</h1>
                    <p class="mb-4">Agroedutourism Polinela adalah tempat wisata yang unik karena menggabungkan rekreasi dengan pendidikan seputar pertanian dan aktivitas agrikultur lainnya.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Menanam Sayuran</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Memanen Sayuran</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Menangkap Ikan</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Memberi Makan Ternak</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Membuat Roti</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Naik Odong-odong</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Camping</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Memancing</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Naik Getek</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Naik Perahu Karet</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->
    <!-- Service Start -->
    <div id="atraksi" class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" style="max-width: 700px;">
                <h1 class="mb-5 display-3">Atraksi Agroedutorism Politeknik Negeri Lampung</h1>
            </div>
            <div class="row g-5 justify-content-center">
                <?php if (!empty($getDeskripsi)) : ?>
                    <?php foreach ($getDeskripsi as $deskripsi) : ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn">
                            <div class="text-center border-primary border bg-white service-item h-100">
                                <div class="d-flex flex-column p-4 h-100">
                                    <!-- Gambar -->
                                    <div class="overflow-hidden img-border-radius mb-3">
                                        <?php if (!empty($deskripsi['dokumentasi'])) : ?>
                                            <img src="<?= base_url('uploads/dokumentasi/' . $deskripsi['dokumentasi']); ?>"
                                                alt="Dokumentasi"
                                                class="img-fluid w-100 img-height">
                                        <?php else : ?>
                                            <img src="<?= base_url('path/to/default-image.jpg'); ?>"
                                                alt="Default Image"
                                                class="img-fluid w-100 img-height"> <!-- Gambar default -->
                                        <?php endif; ?>
                                    </div>
                                    <!-- Konten -->
                                    <div class="text-center flex-grow-1">
                                        <h4 class="my-3"><?= htmlspecialchars($deskripsi['nama_atraksi']); ?></h4>
                                        <p class="description">
                                            <?= (strlen($deskripsi['deskripsi']) > 80) ? htmlspecialchars(substr($deskripsi['deskripsi'], 0, 100)) . '...' : htmlspecialchars($deskripsi['deskripsi']); ?>
                                        </p>
                                    </div>
                                    <!-- Button Read More -->
                                    <?php if (strlen($deskripsi['deskripsi']) > 80): ?>
                                        <div class="mt-auto">
                                            <a href="<?= base_url('readmore' . $deskripsi['kode_deskripsi']); ?>" class="btn btn-primary">Read More</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Tidak ada atraksi untuk ditampilkan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- Programs Start -->
    <div id="tiket" class="container-fluid program py-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">E-Ticket Agroedutorism</h4>
                <h1 class="mb-5 display-3">BOOK YOUR TRIP!</h1>
                <h5>Beli Tiket Paket wisata atau tiket masuk Agroedutorism disini</h5>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-4">
                <a class="btn btn-primary" href="<?= base_url('tiket') ?>">Paket Wisata</a>
            </div>
        </div>
    </div>
    <!-- Program End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h2 class="fw-bold mb-3"><span class="text-primary mb-0">Agro-</span><span class="text-secondary">Edutoursim</span></h2>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <div class="d-flex flex-column p-4 ps-5 text-dark ">
                            <p>Monday - Friday: 8am to 5pm</p>
                            <p>Saturday - Sunday: Close</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">LOCATION</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a href="" class="text-body mb-4"><i class="fa fa-map-marker-alt text-primary me-2"></i>POLI TOUR & TRAVEL POLINELA</a>
                            <a href="" class="text-start rounded-0 text-body mb-4"><i class="fa fa-phone-alt text-primary me-2"></i> +62-857-8930-9672</a>
                            <a href="" class="text-start rounded-0 text-body mb-4"><i class="fas fa-envelope text-primary me-2"></i>politourtravelpolinela@gmail.com</a>
                            <div class="footer-icon d-flex">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">OUR GALLARY</h4>
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="footer-galary-img rounded-circle border border-primary">
                                    <img src="img/foto.png" class="img-fluid rounded-circle p-2" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="footer-galary-img rounded-circle border border-primary">
                                    <img src="img/foto2.png" class="img-fluid rounded-circle p-2" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="footer-galary-img rounded-circle border border-primary">
                                    <img src="img/foto3.png" class="img-fluid rounded-circle p-2" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>MITechCrew</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed By MITechCrew
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>