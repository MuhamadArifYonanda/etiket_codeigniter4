<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Midtrans\Config;
use App\Models\Admin\PengunjungModel;
use App\Models\Admin\TransaksiModel;
use Midtrans\Snap;


class Payment extends BaseController
{
    public function __construct()
    {
        // Load Midtrans configuration
        Config::$serverKey = 'SB-Mid-server-v9UHIgoqJH2gu3g87fmgWMwN'; // Ganti dengan Server Key Anda
        Config::$clientKey = 'SB-Mid-client-HYlfqf1JPh0bAo_o'; // Ganti dengan Client Key Anda
        Config::$isProduction = false; // Set true jika Anda sudah siap untuk produksi
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index($kode_pengunjung)
    {
        $pemesanModel = new PengunjungModel();
        $data['pemesanan'] = $pemesanModel->find($kode_pengunjung);

        if (!$data['pemesanan']) {
            return redirect()->to('/admin/data_pengunjung')->with('error', 'Pemesanan tidak ditemukan.');
        }

        $orderId = $this->generateOrderId();
        $snapToken = $this->generatePaymentUrl(
            $orderId,
            $data['pemesanan']['total_pembayaran'],
            $data['pemesanan']['nama_pengunjung'],
            $data['pemesanan']['email_pengunjung'],
            $data['pemesanan']['nama_atraksi']
        );

        $this->saveTransaction(
            $orderId,
            $kode_pengunjung,
            $data['pemesanan']['nama_pengunjung'],
            $data['pemesanan']['email_pengunjung'],
            $data['pemesanan']['total_pembayaran'],
            $data['pemesanan']['nama_atraksi'],
            'pending'
        );

        return view('admin/payment', [
            'kode_pengunjung' => $kode_pengunjung,
            'total_pembayaran' => $data['pemesanan']['total_pembayaran'],
            'nama_pengunjung' => $data['pemesanan']['nama_pengunjung'],
            'nama_atraksi' => $data['pemesanan']['nama_atraksi'],
            'email_pengunjung' => $data['pemesanan']['email_pengunjung'],
            'no_hp' => $data['pemesanan']['no_hp'],
            'snapToken' => $snapToken,
            'order_id' => $orderId,
        ]);
    }

    private function saveTransaction($orderId, $kode_pengunjung, $customerName, $customerEmail, $amount, $atraksiName, $status)
    {
        $transaksiModel = new TransaksiModel();

        $existingTransaction = $transaksiModel->where('order_id', $orderId)->first();

        if (!$existingTransaction) {
            $data = [
                'order_id' => $orderId,
                'kode_pengunjung' => $kode_pengunjung,
                'nama_pengunjung' => $customerName,
                'email_pengunjung' => $customerEmail,
                'total_pembayaran' => $amount,
                'nama_atraksi' => $atraksiName,
                'status' => $status,
            ];

            $transaksiModel->insert($data);
        }
    }

    private function generateOrderId()
    {
        return 'ORDER-' . substr(md5(uniqid(rand(), true)), 0, 8);
    }

    private function generatePaymentUrl($orderId, $amount, $customerName, $customerEmail, $atraksiName)
    {
        $transaction = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $customerName,
                'atraksi_name' => $atraksiName,
                'email' => $customerEmail,
            ],
        ];

        $snapToken = Snap::getSnapToken($transaction);
        return $snapToken;
    }

    public function notificationHandler()
    {
        $json = file_get_contents('php://input');
        $notification = json_decode($json);

        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;

        $transaksiModel = new \App\Models\Admin\TransaksiModel();

        // Perbarui status transaksi berdasarkan status notifikasi
        switch ($transactionStatus) {
            case 'capture': // Untuk kartu kredit
            case 'settlement': // Pembayaran selesai
                $status = 'settlement';
                break;
            case 'pending': // Pembayaran tertunda
                $status = 'pending';
                break;
            case 'deny': // Pembayaran ditolak
            case 'cancel': // Pembayaran dibatalkan
            case 'expire': // Waktu pembayaran habis
                $status = 'failed';
                break;
            default:
                $status = 'unknown';
        }

        // Update status transaksi di database
        $transaksiModel->update($orderId, ['status' => $status]);

        // Berikan respons ke Midtrans
        return $this->response->setJSON(['message' => 'Notification received successfully.']);
    }
}
