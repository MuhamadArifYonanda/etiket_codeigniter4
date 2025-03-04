<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin: 30px auto;
            width: 20cm;
            height: 8cm;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 15px 20px;
        }

        .card-body p {
            font-size: 16px;
            margin-bottom: 12px;
        }

        .thank-you-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #6c757d;
            font-weight: 500;
        }

        .btn-primary {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            body * {
                visibility: hidden;
            }

            .card, .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                top: 10%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 25cm;
                height: 1cm;
                margin: 0;
                box-shadow: none;
                page-break-inside: avoid;
            }

            .btn-primary {
                display: none;
            }

            @page {
                size: 25cm 12cm;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Tiket Anda</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama Pengunjung:</strong> <?= $transaksi['nama_pengunjung']; ?></p>
                        <p><strong>Email:</strong> <?= $transaksi['email_pengunjung']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nama Atraksi:</strong> <?= $transaksi['nama_atraksi']; ?></p>
                        <p><strong>Total Pembayaran:</strong> Rp <?= number_format($transaksi['total_pembayaran'], 0, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary mb-3" onclick="window.print()">Cetak Tiket</button>
                <p class="thank-you-message">Terima kasih telah memesan tiket bersama kami. Selamat menikmati kunjungan Anda!</p>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
