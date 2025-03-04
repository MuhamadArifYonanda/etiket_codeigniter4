<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TransaksiModel;
use App\Models\Admin\PengunjungModel;

class CetakTiket extends BaseController
{
    public function view($orderId)
    {
        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->where('order_id', $orderId)->first();

        if (!$transaksi) {
            return redirect()->to('/admin/payment')->with('error', 'Tiket tidak ditemukan.');
        }

        return view('pengunjung/cetak_tiket', [
            'transaksi' => $transaksi,
            'title' => 'Cetak Tiket',
        ]);
    }

//     public function view($orderId)
// {
//     $transaksiModel = new transaksiModel();

//     // Ambil data pengunjung berdasarkan kode_pengunjung
//     $pengunjung = $transaksiModel->find($orderId);

//     if (!$pengunjung) {
//         return redirect()->back()->with('error', 'Data tidak ditemukan.');
//     }

//     // Kirim data ke view
//     $data = [
//         'title' => 'Tiket Anda',
//         'pengunjung' => $pengunjung,
//     ];

//     return view('pengunjung/cetak_tiket', $data);
// }

}
