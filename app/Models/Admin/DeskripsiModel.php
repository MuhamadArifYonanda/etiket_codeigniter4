<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DeskripsiModel extends Model
{
    protected $table                 = 'data_deskripsi'; // Nama tabel yang sesuai dengan basis data Anda
    protected $primaryKey            = 'kode_deskripsi'; // Primary key for the table
    protected $allowedFields         = [
        'kode_deskripsi',
        'kode_atraksi',
        'deskripsi',
        'dokumentasi',
    ];
    protected $useTimestamps         = true;
    protected $dateFormat            = 'date';


    public function saveDeskripsi($data)
    {
        return $this->insert($data); // Gunakan metode bawaan CI4 untuk menyimpan data
    }

    public function editDeskripsi($data, $kode_deskripsi)
    {
        return $this->update($kode_deskripsi, $data); // Update data berdasarkan kode
    }

    public function deleteDeskripsi($kode_deskripsi)
    {
        return $this->where('kode_deskripsi', $kode_deskripsi)->delete(); // Hapus data berdasarkan kode
    }



    public function getDeskripsiWithAtraksi($kode_atraksi = null)
    {
        $builder = $this->select('data_deskripsi.*, data_atraksi.nama_atraksi') // Pilih kolom data deskripsi dan nama atraksi
            ->join('data_atraksi', 'data_atraksi.kode_atraksi = data_deskripsi.kode_atraksi'); // Join dengan tabel atraksi

        if ($kode_atraksi !== null) {
            $builder->where('data_deskripsi.kode_deskripsi', $kode_atraksi); // Filter berdasarkan kode deskripsi jika diberikan
            return $builder->get()->getRowArray(); // Ambil satu baris data sebagai array
        }

        return $builder->findAll(); // Ambil semua data jika tidak ada filter
    }
}
