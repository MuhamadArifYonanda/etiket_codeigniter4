<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DeskripsiModel;
use App\Models\Admin\AtraksiModel;

class Data_Deskripsi extends BaseController
{
    public function data_deskripsi()
    {
        $model = new DeskripsiModel();
        $data['title'] = 'Data Deskripsi';
        $data['deskripsi'] = $model->getDeskripsiWithAtraksi(); // Mengambil semua data deskripsi dengan join

        return view('admin/data_deskripsi', $data);
    }

    public function readMore($kode_deskripsi)
    {
        $model = new DeskripsiModel();
        $data['title'] = 'Detail Deskripsi';
        $data['getDeskripsi'] = $model->getDeskripsiWithAtraksi($kode_deskripsi); // Mengambil detail deskripsi dengan join

        if (!$data['getDeskripsi']) {
            return redirect()->to(base_url('/'))->with('error', 'Data tidak ditemukan.');
        }

        return view('pengunjung/readmore', $data);
    }

    public function showAddDeskripsi()
    {
        $atraksiModel = new AtraksiModel();
        $deskripsiModel = new DeskripsiModel();

        // Generate kode deskripsi otomatis
        $lastData = $deskripsiModel->orderBy('kode_deskripsi', 'DESC')->first();
        if ($lastData) {
            $lastCode = $lastData['kode_deskripsi'];
            $number = (int)substr($lastCode, 1) + 1;
            $newCode = 'D' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            $newCode = 'D001';
        }

        $data = [
            'title' => 'Tambah Data Deskripsi',
            'atraksiList' => $atraksiModel->findAll(),
            'kode_deskripsi' => $newCode,
        ];

        return view('admin/add_deskripsi', $data);
    }

    public function processAddDeskripsi()
   {
        $deskripsiModel = new DeskripsiModel();

        // Generate kode deskripsi otomatis
        $lastData = $deskripsiModel->orderBy('kode_deskripsi', 'DESC')->first();
        if ($lastData) {
            $lastCode = $lastData['kode_deskripsi'];
            $number = (int)substr($lastCode, 1) + 1;
            $newCode = 'D' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            $newCode = 'D001';
        }

        $img = $this->request->getFile('dokumentasi');
        $imgName = '';

        // Validasi ukuran gambar (maks 2 MB)
        if ($img->isValid() && !$img->hasMoved()) {
            if ($img->getSize() <= 2097152) { // 2 MB in bytes
                $imgName = $img->getRandomName();
                $img->move(WRITEPATH . 'uploads/dokumentasi', $imgName);
            } else {
                session()->setFlashdata('error', 'Ukuran file gambar terlalu besar, maksimal 2MB.');
                return redirect()->back()->withInput();
            }
        }

        $data = [
            'kode_deskripsi' => $newCode,
            'kode_atraksi' => $this->request->getPost('kode_atraksi'),
            'dokumentasi' => $imgName,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($deskripsiModel->saveDeskripsi($data)) {
            session()->setFlashdata('success', 'Data Deskripsi berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menyimpan data.');
        }

        return redirect()->to(base_url('admin/data_deskripsi'));
    }

    public function editDeskripsi($kode_deskripsi)
    {
        $deskripsiModel = new DeskripsiModel();
        $atraksiModel = new AtraksiModel();

        $deskripsi = $deskripsiModel->getDeskripsiWithAtraksi($kode_deskripsi);

        if (!$deskripsi) {
            session()->setFlashdata('error', 'Kode Deskripsi tidak ditemukan.');
            return redirect()->to(base_url('admin/data_deskripsi'));
        }

        $data = [
            'title' => 'Edit Data Deskripsi',
            'deskripsi' => $deskripsi,
            'atraksiList' => $atraksiModel->findAll(),
        ];

        return view('admin/edit_deskripsi', $data);
    }


    public function update()
{
    $deskripsiModel = new DeskripsiModel();

    $kodeDeskripsi = $this->request->getPost('kode_deskripsi');
    $kodeAtraksi = $this->request->getPost('kode_atraksi');
    $deskripsi = $this->request->getPost('deskripsi');
    $file = $this->request->getFile('dokumentasi');

    $data = [
        'kode_atraksi' => $kodeAtraksi,
        'deskripsi' => $deskripsi,
    ];

    if ($file->isValid() && !$file->hasMoved()) {
        $imgName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/dokumentasi', $imgName);

        // Hapus file dokumentasi lama
        $oldData = $deskripsiModel->find($kodeDeskripsi);
        if (!empty($oldData['dokumentasi']) && file_exists(ROOTPATH . 'public/uploads/dokumentasi/' . $oldData['dokumentasi'])) {
            unlink(ROOTPATH . 'public/uploads/dokumentasi/' . $oldData['dokumentasi']);
        }

        $data['dokumentasi'] = $imgName;
    }

    $deskripsiModel->update($kodeDeskripsi, $data);
    session()->setFlashdata('success', 'Data Deskripsi berhasil diperbarui.');
    return redirect()->to(base_url('admin/data_deskripsi'));
}


    public function deleteDeskripsi($kode_deskripsi)
    {
        $model = new DeskripsiModel();
        $getDeskripsi = $model->getDeskripsiWithAtraksi($kode_deskripsi);

        if (!$getDeskripsi) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
        } else {
            $model->deleteDeskripsi($kode_deskripsi);
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/data_deskripsi'));
    }
}
