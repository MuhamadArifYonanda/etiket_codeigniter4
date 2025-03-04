<?php

namespace App\Controllers;


use App\Models\Admin\PengunjungModel;
use App\Models\Admin\TransaksiModel;
use App\Libraries\PdfGenerator;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardPemimpin extends BaseController
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
        return view('pemimpin/dashboard', [
            'title' => 'Dashboard',
            'totalPengunjung' => $totalPengunjung,
            'totalTransaksi' => $totalTransaksi,
            'totalPembayaran' => $totalPembayaran,
            'chartData' => $chartData
        ]);
    }


    public function laporan()
    {
        // Menampilkan form filter
        $data['title'] = "Filter Laporan";
        return view('pemimpin/laporan_filter',$data);
    }

    public function cetak_laporan()
    {
        // Mendapatkan data bulan dan tahun dari form
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        // Mengambil data laporan berdasarkan bulan dan tahun
        $model = new TransaksiModel();
        $laporan = $model->getLaporanByBulanTahun($bulan, $tahun);

        // Menghitung total penghasilan
        $total_penghasilan = 0;
        foreach ($laporan as $item) {
            $total_penghasilan += $item['total_pembayaran'];
        }

        // Menyimpan data untuk ditampilkan di view
        $data['laporan'] = $laporan;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['title'] = "Cetak Laporan";
        $data['total_penghasilan'] = $total_penghasilan;

        // Menampilkan data laporan
        return view('pemimpin/laporan', $data);
    }

    public function cetak_pdf()
    {
        // Mendapatkan data bulan dan tahun dari POST
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        // Mengambil data laporan berdasarkan bulan dan tahun
        $model = new TransaksiModel();
        $laporan = $model->getLaporanByBulanTahun($bulan, $tahun);

        // Menghitung total penghasilan
        $total_penghasilan = 0;
        foreach ($laporan as $item) {
            $total_penghasilan += $item['total_pembayaran'];
        }

        // Menyimpan data untuk ditampilkan di view
        $data['laporan'] = $laporan;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['total_penghasilan'] = $total_penghasilan;

        // Generate HTML content for the report
        $html = view('pemimpin/laporan_pdf', $data); // Create a separate view for the PDF layout

        // Initialize PdfGenerator and generate the PDF
        $pdf = new PdfGenerator();
        $pdf->generate($html, 'laporan_' . $bulan . '_' . $tahun);
    }
}
