<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'kode_tiket';
    protected $allowedFields = ['kode_tiket', 'kode_atraksi', 'tgl_berkunjung', 'total'];

    // Method untuk mengambil tiket beserta detail atraksi
    public function getTiket()
    {
        return $this->select(['tiket.kode_tiket', 'tiket.tgl_berkunjung', 'tiket.total', 'data_atraksi.nama_atraksi', 'data_atraksi.harga_atraksi'])
            ->join('data_atraksi', 'tiket.kode_atraksi = data_atraksi.kode_atraksi') // Menambahkan JOIN dengan tabel data_atraksi
            ->findAll(); // Mengambil semua data
    }

    // Method untuk mengambil tiket berdasarkan kode_tiket
    public function byKode($kode_tiket)
    {
        log_message('info', 'Mengambil tiket dengan kode_tiket: ' . $kode_tiket);
        return $this->where('kode_tiket', $kode_tiket)->first();
    }

    // Method untuk mengambil detail atraksi berdasarkan kode_atraksi
    public function getAtraksi($kode_atraksi)
    {
        return $this->select('nama_atraksi, harga_atraksi')
            ->join('data_atraksi', 'tiket.kode_atraksi = data_atraksi.kode_atraksi')
            ->where('tiket.kode_atraksi', $kode_atraksi)
            ->first(); // Mengambil data pertama yang cocok
    }
}
