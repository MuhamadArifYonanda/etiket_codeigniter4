<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tanggal & Atraksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .ticket-info {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-tambah,
        .btn-batal {
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-tambah:hover {
            background-color: #007bff;
        }

        .btn-batal:hover {
            background-color: #dc3545;
        }

        .btn-tambah[disabled],
        .btn-batal[disabled] {
            background-color: #d6d6d6;
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .text-right h4 {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .text-right h4 b {
            color: #007bff;
        }

        @media (max-width: 576px) {

            .btn-tambah,
            .btn-batal {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href=" " class="text-white">Politeknik Negeri Lampung</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                    <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                    <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary display-6">Agro-<span class="text-secondary">Edutoursim</span></h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                            <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                <i class="fa fa-phone-alt text-primary fa-2x me-3"></i>
                                <div class="position-absolute" style="top: -7px; left: 20px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column pe-3 border-end border-primary">
                            <span class=" text-primary">Layanan Pelanggan:</span>
                            <a href=" "><span class="text-secondary">+62-812-7207-7173 Anwar</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Pilih Tanggal & Atraksi</h2>
                    <form id="ticketForm" method="POST" action="<?= base_url('tambah'); ?>">
                        <div class="form-group">
                            <label for="tanggal">Pilih Tanggal Kunjungan:</label>
                            <input type="date" id="tanggal" name="tgl_berkunjung" class="form-control" required>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Penjualan tiket ini hanya untuk uji coba terbatas.
                        </div>
                        <div class="row">
                            <?php if (!empty($getAtraksi) && is_array($getAtraksi)) : ?>
                                <?php foreach ($getAtraksi as $atraksi) : ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($atraksi['nama_atraksi']); ?></h5>
                                                <p class="card-text">
                                                    Syarat dan Ketentuan:
                                                <div class="terms-content" data-expanded="false" style="display: none;">
                                                    <ol>
                                                        <?php
                                                        $syarat = explode("\n", $atraksi['sk']);
                                                        foreach ($syarat as $item) :
                                                        ?>
                                                            <li><?= htmlspecialchars(trim($item)); ?></li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                </div>
                                                </p>
                                                <button class="btn btn-link toggle-terms" type="button">Lihat Selengkapnya</button>
                                                <p class="text-right"><b>IDR <?= htmlspecialchars(number_format($atraksi['harga_atraksi'], 0, ',', '.')); ?></b></p>
                                                <div class="mt-auto">
                                                    <button class="btn btn-primary btn-tambah" type="button" data-id="<?= $atraksi['kode_atraksi']; ?>" data-harga="<?= $atraksi['harga_atraksi']; ?>">Tambah</button>
                                                    <button class="btn btn-danger btn-batal mt-2" type="button" data-id="<?= $atraksi['kode_atraksi']; ?>" disabled>Batal</button>
                                                </div>
                                                <input type="hidden" class="ticket-count" value="0" data-id="<?= $atraksi['kode_atraksi']; ?>" name="kode_atraksi[]">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="text-center">Tidak ada atraksi untuk ditampilkan.</p>
                            <?php endif; ?>
                        </div>


                        <div class="text-right my-3">
                            <h4>Subtotal (0 Atraksi): <b>IDR 0</b></h4>
                            <button class="btn btn-secondary" id="submit-btn" disabled>Pilih Tiket</button>
                            <input type="hidden" id="total" name="total" value="0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid footer py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h2 class="fw-bold mb-3">
                            <span class="text-primary">Agro-</span><span class="text-secondary">Edutourism</span>
                        </h2>
                        <p>Monday - Friday: 8am to 5pm</p>
                        <p>Saturday - Sunday: Closed</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <h4 class="text-primary mb-4">LOCATION</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a href="#" class="text-body mb-4">
                            <i class="fa fa-map-marker-alt text-primary me-2"></i> POLI TOUR & TRAVEL POLINELA
                        </a>
                        <a href="tel:+6285789309672" class="text-body mb-4">
                            <i class="fa fa-phone-alt text-primary me-2"></i> +62-857-8930-9672
                        </a>
                        <a href="mailto:politourtravelpolinela@gmail.com" class="text-body mb-4">
                            <i class="fas fa-envelope text-primary me-2"></i> politourtravelpolinela@gmail.com
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <h4 class="text-primary mb-4">OUR GALLERY</h4>
                    <div class="row g-3">
                        <div class="col-4">
                            <img src="img/foto.png" class="img-fluid rounded-circle" alt="Gallery Image">
                        </div>
                        <div class="col-4">
                            <img src="img/foto2.png" class="img-fluid rounded-circle" alt="Gallery Image">
                        </div>
                        <div class="col-4">
                            <img src="img/foto3.png" class="img-fluid rounded-circle" alt="Gallery Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center text-md-start">
            <span class="text-light"><i class="fas fa-copyright me-2"></i> MITechCrew, All rights reserved.</span>
        </div>
    </div>
    <!-- Copyright End -->

    <script>
        $(document).ready(function() {
            $('.toggle-terms').click(function() {
                let termsContent = $(this).siblings('.terms-content');
                let isExpanded = termsContent.data('expanded');

                if (isExpanded) {
                    termsContent.slideUp(); // Sembunyikan konten
                    $(this).text('Lihat Selengkapnya'); // Ubah teks tombol
                } else {
                    termsContent.slideDown(); // Tampilkan konten
                    $(this).text('Lihat Lebih Sedikit'); // Ubah teks tombol
                }

                // Perbarui status
                termsContent.data('expanded', !isExpanded);
            });
        });

        $(document).ready(function() {
            let today = new Date();
            let dd = String(today.getDate()).padStart(2, '0');
            let mm = String(today.getMonth() + 1).padStart(2, '0');
            let yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            $('#tanggal').attr('min', today);

            let total = 0;
            let atraksiCount = 0;
            let selectedAtraksi = [];

            // Tombol "Tambah" klik
            $('.btn-tambah').click(function() {
                let input = $(this).closest('.card-body').find('.ticket-count');
                let harga = parseInt($(this).data('harga'), 10); // Mengambil harga dari data atribut
                let kodeAtraksi = $(this).data('id'); // Mengambil kode atraksi dari data atribut

                if (!isNaN(harga) && input.val() === "0") {
                    input.val(kodeAtraksi);
                    selectedAtraksi.push(kodeAtraksi);
                    $(this).prop('disabled', true); // Nonaktifkan tombol tambah
                    $(this).siblings('.btn-batal').prop('disabled', false); // Aktifkan tombol batal
                    total += harga;
                    atraksiCount++;
                    updateSubtotal(total, atraksiCount);
                }
            });

            $('.btn-batal').click(function() {
                let input = $(this).closest('.card-body').find('.ticket-count');
                let harga = parseInt($(this).siblings('.btn-tambah').data('harga')); // Mengambil harga dari tombol 'Tambah'
                let kodeAtraksi = input.val();

                if (input.val() !== "0") {
                    input.val("0");
                    selectedAtraksi = selectedAtraksi.filter(kode => kode !== kodeAtraksi);
                    $(this).prop('disabled', true);
                    $(this).siblings('.btn-tambah').prop('disabled', false);
                    total -= harga;
                    atraksiCount--;
                    updateSubtotal(total, atraksiCount);
                }
            });


            // Fungsi untuk memperbarui subtotal
            function updateSubtotal(newTotal, atraksiCount) {
                $('#total').val(newTotal);
                $('.text-right h4').html('Subtotal (' + atraksiCount + ' Atraksi): <b>IDR ' + newTotal.toLocaleString() + '</b>');
                $('#submit-btn').prop('disabled', atraksiCount === 0);
            }

            // Kirim formulir saat tombol pilih tiket ditekan
            $('#submit-btn').click(function() {
                $('input[name="kode_atraksi[]"').remove();

                selectedAtraksi.forEach(function(kode) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'kode_atraksi[]',
                        value: kode
                    }).appendTo('#ticketForm');
                });

                $('#ticketForm').submit();
            });
        });
    </script>

</body>

</html>