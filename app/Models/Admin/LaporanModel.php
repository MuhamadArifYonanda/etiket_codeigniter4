<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'transaksi'; // Tabel yang berisi data transaksi
    protected $primaryKey = 'id';

    public function getLaporanByBulanTahun($bulan, $tahun)
    {
        // Menyaring laporan berdasarkan bulan dan tahun
        return $this->where('MONTH(transaction_time)', $bulan)
                    ->where('YEAR(transaction_time)', $tahun)
                    ->findAll();
    }
}
