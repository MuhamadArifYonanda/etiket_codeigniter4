<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TransaksiModel;
use Midtrans\Notification;
use Midtrans\Config;

class Transaksi extends BaseController
{
    public function __construct()
    {
        // Set Midtrans config
        Config::$serverKey = 'SB-Mid-server-v9UHIgoqJH2gu3g87fmgWMwN'; // Ganti dengan server key Anda
        Config::$isProduction = false; // Ubah ke true jika di production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Endpoint untuk menerima notifikasi
    public function notification()
    {
        // Terima data notifikasi dari Midtrans
        $notif = new Notification();

        // Ambil status transaksi
        $order_id = $notif->order_id;
        $status_code = $notif->transaction_status;
        $payment_type = $notif->payment_type;

        // Proses status transaksi
        if ($status_code == 'capture') {
            if ($payment_type == 'credit_card') {
                // Penanganan jika transaksi sukses dan menggunakan kartu kredit
                $this->updateTransactionStatus($order_id, 'paid');
            }
        } elseif ($status_code == 'settlement') {
            // Penanganan jika transaksi berhasil diselesaikan
            $this->updateTransactionStatus($order_id, 'paid');
        } elseif ($status_code == 'pending') {
            // Penanganan jika transaksi dalam status pending
            $this->updateTransactionStatus($order_id, 'pending');
        } elseif ($status_code == 'cancel') {
            // Penanganan jika transaksi dibatalkan
            $this->updateTransactionStatus($order_id, 'cancelled');
        }
        // Jika status lainnya, bisa ditambahkan penanganan sesuai kebutuhan

        // Menampilkan hasil transaksi
        return json_encode(['status' => 'success']);
    }

    private function updateTransactionStatus($order_id, $status)
    {
        // Implementasi untuk memperbarui status transaksi pada database
        // Misalnya, Anda bisa menggunakan model untuk melakukan query ke database
        $transactionModel = new \App\Models\Admin\TransaksiModel();
        $transactionModel->updateStatus($order_id, $status);
    }


    // Fungsi untuk menampilkan transaksi di halaman admin
    public function viewTransaksi()
    {
        $transaksiModel = new TransaksiModel();
        $perPage = 10;

        $data['title'] = 'Transaksi';
        $data['transaksi'] = $transaksiModel->paginate($perPage);
        $data['pager'] = $transaksiModel->pager; // Objek pager
        $data['perPage'] = $perPage; // Mengambil semua transaksi

        return view('admin/transaksi', $data);
    }
}
