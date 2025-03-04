<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Ganti dengan nama tabel Anda
    protected $primaryKey = 'kode_user';
    protected $allowedFields = ['kode_user', 'username', 'password', 'status', 'role'];

    public function getUser($kode_user = false)
    {
        if ($kode_user === false) {
            return $this->findAll(); // Ambil semua data jika tidak ada kode atraksi tertentu
        } else {
            return $this->where('kode_user', $kode_user)->first(); // Ambil satu data berdasarkan kode atraksi
        }
    }
    
    public function editUser($data, $kode_user)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kode_user', $kode_user); // Menambahkan kondisi where untuk kode_user
        return $builder->update($data); // Pastikan kita menggunakan builder dan update dengan kondisi yang benar
    }
    
}
