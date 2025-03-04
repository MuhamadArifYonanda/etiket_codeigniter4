<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agroedutorism Polinela | E-Ticket</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">

    <style>
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .error-message {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .general-error {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
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
                                <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                                <div class="position-absolute" style="top: -7px; left: 20px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column pe-3 border-end border-primary">
                            <span class="text-primary">Layanan Pelanggan:</span>
                            <a href=" "><span class="text-secondary">+62-812-7207-7173 Anwar</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <!-- Ticket info display -->
                    <?php if (isset($getTiket) && !empty($getTiket)): ?>
                        <div class="ticket-info">
                            <h2>Detail Tiket</h2>
                            <p>Tanggal Kunjungan: <?= htmlspecialchars($getTiket['tgl_berkunjung']); ?></p>
                            <p>Pilihan Atraksi: <?= htmlspecialchars($namaAtraksi); ?></p>
                            <p>Total: <?= 'Rp ' . number_format($getTiket['total'], 0, ',', '.'); ?></p>
                            <p id="total">Total Pembayaran: Rp 0</p>
                            <input type="hidden" id="harga_atraksi" value="<?= $getTiket['total']; ?>"> <!-- Hidden input for attraction price -->
                        </div>

                    <?php else: ?>
                        <p>Tidak ada detail tiket yang ditemukan.</p>
                    <?php endif; ?>

                    <!-- Form for visitor details -->
                    <form id="ticketForm" method="post" action="<?= base_url('pengunjung/add_pengunjung/save') ?>" onsubmit="return validateForm()">
                        <input type="hidden" name="kode_tiket" value="<?= htmlspecialchars($getTiket['kode_tiket']); ?>">
                        <input type="hidden" name="nama_atraksi" value="<?= $namaAtraksi; ?>">

                        <div class="general-error" id="general_error"></div>    
                        <div class="form-group">
                            <label for="jumlah_tiket">Jumlah Pengunjung</label>
                            <input type="number" id="jumlah_tiket" name="jumlah_tiket" required min="1" oninput="calculateTotal()">
                            <div class="error-message" id="jumlah_tiket_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pengunjung">Nama Pengunjung</label>
                            <input type="text" id="nama_pengunjung" name="nama_pengunjung" required pattern="[A-Za-z\s]+" title="Hanya huruf dan spasi yang diperbolehkan">
                            <div class="error-message" id="nama_pengunjung_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="email_pengunjung">Email</label>
                            <input type="email" id="email_pengunjung" name="email_pengunjung" required>
                            <div class="error-message" id="email_pengunjung_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="tel" id="no_hp" name="no_hp" required pattern="[0-9]{10,15}" title="Masukkan nomor HP yang valid (10-15 digit)">
                            <div class="error-message" id="no_hp_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="error-message" id="jk_error"></div>
                        </div>

                        <input type="hidden" id="total_pembayaran" name="total_pembayaran" value="0">

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal">Buat Tiket</button>
                        <a href="<?= base_url('tiket'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>

                <!-- Modal for Confirmation -->
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pemesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Jumlah Pengunjung:</strong> <span id="confirmJumlahTiket"></span></p>
                                <p><strong>Total Pembayaran:</strong> <span id="confirmTotal"></span></p>
                                <p>Apakah Anda yakin ingin melanjutkan pemesanan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="confirmBtn" disabled>Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <div class="d-flex flex-column p-4 ps-5 text-dark border border-primary"
                                style="border-radius: 0%;">
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
                                        <img src="<?= base_url('img/foto.png') ?>" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="<?= base_url('img/foto2.png') ?>" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="<?= base_url('img/foto3.png') ?>" class="img-fluid rounded-circle p-2" alt="">
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
        <script>
            // Event listener untuk membuka modal
            document.getElementById('confirmationModal').addEventListener('show.bs.modal', function() {
                var jumlahTiket = document.getElementById('jumlah_tiket').value;
                var totalPembayaran = document.getElementById('total_pembayaran').value;

                // Menampilkan jumlah tiket dan total pembayaran di modal
                document.getElementById('confirmJumlahTiket').textContent = jumlahTiket;
                document.getElementById('confirmTotal').textContent = 'Rp ' + parseInt(totalPembayaran).toLocaleString('id-ID');
            });

            // Konfirmasi untuk submit form
            var confirmationBtn = document.getElementById('confirmBtn');
            confirmationBtn.addEventListener('click', function() {
                document.getElementById('ticketForm').submit();
            });

            // Fungsi untuk menghitung total harga tiket
            function calculateTotal() {
                var jumlahTiket = document.getElementById('jumlah_tiket').value;
                var hargaAtraksi = document.getElementById('harga_atraksi').value;

                if (jumlahTiket && hargaAtraksi) {
                    var total = jumlahTiket * hargaAtraksi;
                    document.getElementById('total').textContent = 'Total Pembayaran: Rp ' + total.toLocaleString('id-ID');
                    document.getElementById('total_pembayaran').value = total;
                } else {
                    document.getElementById('total').textContent = 'Total: Rp 0';
                    document.getElementById('total_pembayaran').value = 0;
                }
            }

            // Fungsi untuk validasi form
            function validateForm() {
                var isValid = true;
                var generalError = document.getElementById('general_error');
                generalError.textContent = ''; // Reset pesan kesalahan umum

                // Reset pesan kesalahan
                document.getElementById('jumlah_tiket_error').textContent = '';
                document.getElementById('nama_pengunjung_error').textContent = '';
                document.getElementById('email_pengunjung_error').textContent = '';
                document.getElementById('no_hp_error').textContent = '';
                document.getElementById('jk_error').textContent = '';

                // Validasi jumlah tiket
                var jumlahTiket = document.getElementById('jumlah_tiket');
                if (jumlahTiket.value < 15) {
                    document.getElementById('jumlah_tiket_error').textContent = 'Jumlah pengunjung minimal 15 .';
                    isValid = false;
                }

                // Validasi nama pengunjung
                var namaPengunjung = document.getElementById('nama_pengunjung');
                if (!/^[A-Za-z\s]+$/.test(namaPengunjung.value)) {
                    document.getElementById('nama_pengunjung_error').textContent = 'Nama hanya boleh mengandung huruf dan spasi.';
                    isValid = false;
                }

                // Validasi email
                var emailPengunjung = document.getElementById('email_pengunjung');
                if (!emailPengunjung.validity.valid) {
                    document.getElementById('email_pengunjung_error').textContent = 'Email tidak valid.';
                    isValid = false;
                }

                // Validasi nomor HP
                var noHp = document.getElementById('no_hp');
                if (!/^[0-9]{10,15}$/.test(noHp.value)) {
                    document.getElementById('no_hp_error').textContent = 'Nomor HP harus terdiri dari 10 hingga 15 digit.';
                    isValid = false;
                }

                // Validasi jenis kelamin
                var jk = document.getElementById('jk');
                if (jk.value === '') {
                    document.getElementById('jk_error').textContent = 'Silakan pilih jenis kelamin.';
                    isValid = false;
                }

                // Jika tidak valid, tampilkan pesan kesalahan umum
                if (!isValid) {
                    generalError.textContent = 'Harap Isi Form dengan Benar sebelum melanjutkan.';
                }

                // Aktifkan atau nonaktifkan tombol konfirmasi
                confirmationBtn.disabled = !isValid;

                return isValid;
            }

            // Tambahkan event listener untuk validasi saat input berubah
            document.querySelectorAll('#ticketForm input, #ticketForm select').forEach(function(input) {
                input.addEventListener('input', validateForm);
            });
        </script>


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