<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\Admin\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Tampilkan semua pengguna
    public function data_user()
    {
        $data['users'] = $this->userModel->findAll();
        $data['title'] = 'Data Pengelola';

        return view('admin/data_user', $data);
    }

    // Tambah data pengguna
    public function create()
    {
        return view('admin/tambah_user');
    }

    // Proses simpan data
    public function store()
    {
        $data = [
            'kode_admin' => $this->request->getPost('kode_admin'),
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'status'     => $this->request->getPost('status'),
            'role'       => $this->request->getPost('role'),
        ];

        $this->userModel->insert($data);
        return redirect()->to('/user');
    }

    // Edit data pengguna
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('user/edit', $data);
    }

    // Proses update data
    public function update($id)
    {
        $data = [
            'kode_admin' => $this->request->getPost('kode_admin'),
            'username'   => $this->request->getPost('username'),
            'status'     => $this->request->getPost('status'),
            'role'       => $this->request->getPost('role'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $data);
        return redirect()->to('/user');
    }

    // Hapus data pengguna
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user');
    }
}
