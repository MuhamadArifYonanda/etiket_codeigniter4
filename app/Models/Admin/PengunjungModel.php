<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table                 = 'data_pengunjung'; // Nama tabel
    protected $primaryKey            = 'kode_pengunjung'; // Primary key
    protected $allowedFields         = [
        'kode_pengunjung',
        'kode_tiket',
        'nama_atraksi',
        'nama_pengunjung',
        'email_pengunjung',
        'jk',
        'no_hp',
        'total_pembayaran',
    ];

    public function getPengunjung($kode_pengunjung = false)
    {
        if ($kode_pengunjung === false) {
            return $this->findAll(); // Mengambil semua data jika kode_pengunjung tidak diberikan
        }
        return $this->where('kode_pengunjung', $kode_pengunjung)->first(); // Mengambil satu data tertentu
    }


    public function savePengunjung($data)
    {
        return $this->insert($data); // Menggunakan metode save bawaan Model CI4
    }

    public function editPengunjung($data, $kode_pengunjung)
    {
        return $this->update($kode_pengunjung, $data); // Update data berdasarkan primaryKey
    }


    public function deletePengunjung($kode_pengunjung)
    {
        return $this->delete($kode_pengunjung); // Menghapus data berdasarkan primaryKey
    }

    public function getTotalPengunjung()
    {
        return $this->countAll();
    }

    // In AtraksiModel, make sure you're selecting 'nama_atraksi'
    public function byKode($kode_tiket)
    {
        return $this->db->table('tiket')
            ->join('atraksi', 'tiket.id_atraksi = atraksi.id_atraksi')  // Pastikan id_atraksi di tabel tiket ada
            ->where('kode_tiket', $kode_tiket)
            ->get()
            ->getRowArray();
    }



    public function getAtraksi($kode_atraksi)
    {
        return $this->db->table('data_atraksi')
            ->select('nama_atraksi, harga_atraksi')
            ->where('kode_atraksi', $kode_atraksi)
            ->get()
            ->getRowArray(); // Mengambil data pertama yang cocok
    }

    // public function getPesananByAtraksi()
    // {
    //     return $this->db->table('data_pengunjung')
    //         ->select('nama_atraksi, COUNT(*) as total_pesanan')
    //         ->groupBy('nama_atraksi')
    //         ->orderBy('total_pesanan', 'DESC') // Urutkan dari yang paling banyak
    //         ->get()
    //         ->getResultArray();
    // }

    public function getPesananByAtraksi()
    {
        // Ambil semua data pengunjung dengan nama atraksi yang mungkin lebih dari satu
        $pengunjungData = $this->findAll();

        // Array untuk menyimpan jumlah pesanan per atraksi
        $atraksiCount = [];

        // Looping setiap pengunjung untuk memisahkan atraksi
        foreach ($pengunjungData as $pengunjung) {
            // Pisahkan nama atraksi yang dipilih jika lebih dari satu (asumsi dipisah dengan koma)
            $atraksiList = explode(',', $pengunjung['nama_atraksi']);

            foreach ($atraksiList as $atraksi) {
                $atraksi = trim($atraksi); // Menghapus spasi jika ada
                if (isset($atraksiCount[$atraksi])) {
                    $atraksiCount[$atraksi] += 1;
                } else {
                    $atraksiCount[$atraksi] = 1;
                }
            }
        }

        // Format data hasil
        $result = [];
        foreach ($atraksiCount as $namaAtraksi => $jumlahPesanan) {
            $result[] = ['nama_atraksi' => $namaAtraksi, 'total_pesanan' => $jumlahPesanan];
        }

        return $result;
    }
}
