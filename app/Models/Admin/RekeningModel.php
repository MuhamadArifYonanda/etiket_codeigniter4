<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RekeningModel extends Model
{
    protected $table                 = 'data_rekening'; // Nama tabel yang sesuai dengan basis data Anda
    protected $primaryKey            = 'kode_rekening'; // Primary key for the table
    protected $allowedFields         = [
        'kode_rekening',
        'nama_rek',
        'no_rek',
        'nama_bank_e-wallet',
    ];
    protected $useTimestamps         = true;
    protected $dateFormat            = 'date';

    public function getRekening($kode_rekening = false)
    {
        if ($kode_rekening === false) {
            return $this->findAll(); // Ambil semua data jika tidak ada kode rekening tertentu
        } else {
            return $this->where('kode_rekening', $kode_rekening)->first(); // Ambil satu data berdasarkan kode rekening
        }
    }

    public function saveRekening($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editRekening($data, $kode_rekening)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kode_rekening', $kode_rekening);
        return $this->update($kode_rekening, $data); // Update data berdasarkan kode rekening
    }

    public function deleteRekening($kode_rekening)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['kode_rekening' => $kode_rekening]); // Hapus data berdasarkan kode rekening
    }
}
