<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['order_id', 'nama_pengunjung', 'nama_atraksi', 'email_pengunjung', 'total_pembayaran', 'status', 'created_at'];

    public function getLaporanByBulanTahun($bulan, $tahun)
    {
        // Query transactions filtered by month and year
        return $this->where('MONTH(created_at)', $bulan)
            ->where('YEAR(created_at)', $tahun)
            ->findAll();
    }

    public function getTransaksiWithPengunjung($orderId)
    {
        return $this->select('transaksi.*, pengunjung.kode_pengunjung, pengunjung.nama_pengunjung')
            ->join('tiket', 'tiket.kode_tiket = transaksi.kode_tiket') // Relasi transaksi -> tiket
            ->join('pengunjung', 'pengunjung.kode_tiket = tiket.kode_tiket') // Relasi tiket -> pengunjung
            ->where('transaksi.order_id', $orderId)
            ->first(); // Ambil satu data
    }

    public function getTotalTransaksi()
    {
        return $this->countAll();
    }

    public function getTotalPembayaran()
    {
        return $this->selectSum('total_pembayaran')->get()->getRow()->total_pembayaran;
    }

    public function updateStatus($order_id, $status)
    {
        return $this->update($order_id, ['status' => $status]);
    }
}
