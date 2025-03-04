<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('login', $data);
    }

    public function login_action()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('login', $data);
        } else {
            $session = session();
            $LoginModel = new LoginModel();

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $cekusername = $LoginModel->where('username', $username)->first();

            if ($cekusername) {
                $password_db = $cekusername['password'];
                if (password_verify($password, $password_db)) {
                    $session_data = [
                        'username' => $cekusername['username'],
                        'logged_in' => TRUE,
                        'role' => $cekusername['role']
                    ];
                    $session->set($session_data);

                    switch ($cekusername['role']) {
                        case 'admin':
                            return redirect()->to('admin/dashboard');
                        case 'pemimpin':
                            return redirect()->to('pemimpin/dashboard');
                        default:
                            session()->setFlashdata('pesan', 'Akun anda tidak terdaftar');
                            return redirect()->to('login');
                    }
                } else {
                    session()->setFlashdata('pesan', 'Password salah, Silahkan coba lagi');
                    return redirect()->to('login');
                }
            } else {
                session()->setFlashdata('pesan', 'Username salah, Silahkan coba lagi');
                return redirect()->to('login');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
}
