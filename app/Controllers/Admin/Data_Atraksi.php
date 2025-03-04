<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AtraksiModel;

class Data_Atraksi extends BaseController
{
    public function data_atraksi()
    {
        $model               = new AtraksiModel();
        $data['title']       = 'Data Atraksi';
        $data['getAtraksi'] = $model->getAtraksi();

        return view('admin/data_atraksi', $data);
    }

    public function addAtraksi()
    {
        $model = new AtraksiModel();
        $lastData = $model->orderBy('kode_atraksi', 'DESC')->first();
        if ($lastData) {
            // Ambil kode terakhir dan increment
            $lastCode = $lastData['kode_atraksi'];
            $number = (int)substr($lastCode, 1) + 1;
            $newCode = 'A' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada data, kode mulai dari A001
            $newCode = 'A001';
        }

        $data = [
            'title' => 'Tambah Data Atraksi',
            'data_atraksi' => null,
            'kode_atraksi' => $newCode,
        ];

        if ($this->request->getMethod() === 'post') {
            $model = new AtraksiModel();
            $data = [
                'kode_atraksi'          => $this->request->getPost('kode_atraksi'),
                'nama_atraksi'          => $this->request->getPost('nama_atraksi'),
                'harga_atraksi'         => $this->request->getPost('harga_atraksi'),
                'sk'                    => $this->request->getPost('sk'),
            ];

            $model->save($data);
            session()->setFlashdata('success', 'Data Atraksi berhasil ditambahkan.');

            return redirect()->to(base_url('admin/data_atraksi'));
        }

        return view('admin/add_atraksi', $data);
    }

    public function simpanAtraksi()
    {
        $model = new AtraksiModel();

        $data = [
            'kode_atraksi'          => $this->request->getPost('kode_atraksi'),
            'nama_atraksi'          => $this->request->getPost('nama_atraksi'),
            'harga_atraksi'         => $this->request->getPost('harga_atraksi'),
            'sk'                    => $this->request->getPost('sk'),
        ];

        $model->saveAtraksi($data);
        session()->setFlashdata('success', 'Data Atraksi berhasil disimpan.');
        return redirect()->to(base_url('admin/data_atraksi'));
    }


    public function editAtraksi($kode_atraksi)
    {
        $model = new AtraksiModel();
        $getAtraksi = $model->getAtraksi($kode_atraksi); // Mengambil data atraksi berdasarkan kode_atraksi
        $data = [
            'title' => 'Edit Data Atraksi',
            'atraksi' => $getAtraksi
        ];

        if (!$getAtraksi) {
            session()->setFlashdata('error', 'Kode atraksi ' . $kode_atraksi . ' tidak ditemukan.');
            return redirect()->to(base_url('admin/data_atraksi'));
        }

        return view('admin/edit_atraksi', $data);
    }

    public function updateAtraksi()
    {
        $model = new AtraksiModel();
        $kode_atraksi = $this->request->getPost('kode_atraksi');
        $data = [
            'kode_atraksi'          => $this->request->getPost('kode_atraksi'),
            'nama_atraksi'          => $this->request->getPost('nama_atraksi'),
            'harga_atraksi'         => $this->request->getPost('harga_atraksi'),
            'sk' => $this->request->getPost('sk'),
        ];


        $model->editAtraksi($data, $kode_atraksi);
        session()->setFlashdata('success', 'Data atraksi berhasil diperbarui.');
        return redirect()->to(base_url('admin/data_atraksi'));
    }

    public function deleteAtraksi($kode_atraksi)
    {
        $model = new AtraksiModel();
        $getAtraksi = $model->getAtraksi($kode_atraksi);

        if (!$getAtraksi) {
            session()->setFlashdata('error', 'Kode atraksi ' . $kode_atraksi . ' tidak ditemukan.');
        } else {
            $model->deleteatraksi($kode_atraksi);
            session()->setFlashdata('success', 'Data Atraksi berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/data_atraksi'));
    }
}
