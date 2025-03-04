<?php

namespace App\Controllers;

use App\Models\Admin\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->getUser();

        $data['title'] = 'Data User';
        return view('pemimpin/data_user', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data User';
        return view('pemimpin/user_form', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'status'   => $this->request->getPost('status'),
            'role'     => $this->request->getPost('role'),
        ];

        if ($validation->run($data, 'user')) {
            $userModel = new UserModel();
            $userModel->insert($data);
            return redirect()->to('pemimpin/data_user');
        } else {
            return view('pemimpin/user_form', ['validation' => $this->validator]);
        }
    }

    public function edit($kode_user)
    {
        $model = new UserModel();
        
        $getUser = $model->getUser($kode_user);

        if (!$getUser) {
            session()->setFlashdata('error', 'User dengan kode ' . $kode_user . ' tidak ditemukan.');
            return redirect()->to(base_url('pemimpin/data_user'));
        }

        $data = [
            'title' => 'Edit Data User',
            'user'  => $getUser
        ];

        return view('pemimpin/edit_user_form', $data);
    }


    public function updateUser()
{
    $model = new UserModel();
    
    // Ambil kode_user dari form
    $kode_user = $this->request->getPost('kode_user');
    
    // Ambil data yang akan diperbarui
    $data = [
        'username' => $this->request->getPost('username'),
        'status'   => $this->request->getPost('status'),
        'role'     => $this->request->getPost('role'),
    ];

    // Cek apakah password baru diinputkan, jika ada kita hash dan masukkan ke data
    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
    }

    // Periksa apakah data valid untuk diperbarui
    if (empty($data['username']) && empty($data['status']) && empty($data['role']) && empty($data['password'])) {
        session()->setFlashdata('error', 'Tidak ada data yang perlu diperbarui.');
        return redirect()->back();
    }

    // Panggil model untuk memperbarui data berdasarkan kode_user
    $updated = $model->editUser($data, $kode_user);

    if ($updated) {
        session()->setFlashdata('success', 'Data user berhasil diperbarui.');
    } else {
        session()->setFlashdata('error', 'Gagal memperbarui data user.');
    }

    return redirect()->to(base_url('pemimpin/data_user'));
}




    public function delete($kode_user)
    {
        $userModel = new UserModel();
        $userModel->delete($kode_user);
        return redirect()->to('pemimpin/data_user');
    }
}
