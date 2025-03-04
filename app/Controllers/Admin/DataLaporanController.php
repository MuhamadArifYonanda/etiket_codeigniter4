<?php

namespace App\Controllers\Admin;

use App\Models\Admin\TransaksiModel;
use App\Controllers\BaseController;
use App\Libraries\PdfGenerator;

class DataLaporanController extends BaseController
{
    public function index()
    {
        // Menampilkan form filter
        $data['title'] = "Filter Laporan";
        return view('admin/laporan_filter',$data);
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
        return view('admin/laporan', $data);
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
        $html = view('admin/laporan_pdf', $data); // Create a separate view for the PDF layout

        // Initialize PdfGenerator and generate the PDF
        $pdf = new PdfGenerator();
        $pdf->generate($html, 'laporan_' . $bulan . '_' . $tahun);
    }
}
