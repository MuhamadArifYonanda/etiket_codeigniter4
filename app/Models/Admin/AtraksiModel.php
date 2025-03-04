<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AtraksiModel extends Model
{
    protected $table                 = 'data_atraksi'; // Nama tabel yang sesuai dengan basis data Anda
    protected $primaryKey            = 'kode_atraksi'; // Primary key for the table
    protected $allowedFields         = [
        'kode_atraksi',
        'nama_atraksi',
        'harga_atraksi',
        'sk',
    ];
    protected $useTimestamps         = true;
    protected $dateFormat            = 'date';

    public function getAtraksi($kode_atraksi = false)
    {
        if ($kode_atraksi === false) {
            return $this->findAll(); // Ambil semua data jika tidak ada kode atraksi tertentu
        } else {
            return $this->where('kode_atraksi', $kode_atraksi)->first(); // Ambil satu data berdasarkan kode atraksi
        }
    }

    public function saveAtraksi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editAtraksi($data, $kode_atraksi)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kode_atraksi', $kode_atraksi);
        return $this->update($kode_atraksi, $data); // Update data berdasarkan kode atraksi
    }

    public function deleteAtraksi($kode_atraksi)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['kode_atraksi' => $kode_atraksi]); // Hapus data berdasarkan kode atraksi
    }
}
