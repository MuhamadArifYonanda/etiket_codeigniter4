<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengunjungModel;
use App\Models\Admin\TransaksiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $pengunjungModel = new PengunjungModel();
        $transaksiModel = new TransaksiModel();

        // Ambil total pengunjung, transaksi, dan pembayaran
        $totalPengunjung = $pengunjungModel->getTotalPengunjung();
        $totalTransaksi = $transaksiModel->getTotalTransaksi();
        $totalPembayaran = $transaksiModel->getTotalPembayaran();

        // Ambil data pesanan berdasarkan atraksi
        $dataAtraksi = $pengunjungModel->getPesananByAtraksi();

        // Persiapkan data untuk chart
        $chartData = [
            'labels' => array_column($dataAtraksi, 'nama_atraksi'), // Menyusun nama atraksi
            'pesanan' => array_column($dataAtraksi, 'total_pesanan'), // Menyusun total pesanan
        ];

        // Kirim data ke view
        return view('admin/dashboard', [
            'title' => 'Dashboard',
            'totalPengunjung' => $totalPengunjung,
            'totalTransaksi' => $totalTransaksi,
            'totalPembayaran' => $totalPembayaran,
            'chartData' => $chartData
        ]);
    }
}
