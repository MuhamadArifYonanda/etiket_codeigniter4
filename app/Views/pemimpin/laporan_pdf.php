<!-- app/Views/admin/laporan_pdf.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi - Bulan <?= $bulan ?> Tahun <?= $tahun ?></h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Status</th>
                <th>Nama Pengunjung</th>
                <th>Atraksi Yang dipilih</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // Initialize row number
            if (!empty($laporan)):
                foreach ($laporan as $item):
                    if ($item['status'] === 'settlement'):?>
                        <tr>
                            <td><?= $no++ ?></td> <!-- Row number -->
                            <td><?= $item['order_id'] ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= $item['nama_pengunjung'] ?></td>
                            <td><?= $item['nama_atraksi'] ?></td>
                            <td><?= number_format($item['total_pembayaran'], 2) ?></td>
                            <td><?= date('d-m-Y', strtotime($item['created_at'])) ?></td>
                        </tr>
                <?php
                    endif; // End of settlement status check
                endforeach;
            else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data transaksi untuk bulan dan tahun yang dipilih.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Display Total Income -->
    <h4>Total Penghasilan: <?= number_format($total_penghasilan, 2) ?></h4>

</body>

</html>