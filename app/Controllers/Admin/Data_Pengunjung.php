<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengunjungModel;
use App\Models\Admin\AtraksiModel;
use App\Models\Admin\PemesananModel;
use App\Models\TiketModel;

class Data_Pengunjung extends BaseController
{
    public function data_pengunjung()
    {
        $model = new PengunjungModel();

        $perPage = 10; // Number of records per page

        $data = [
            'title' => 'Data Pengunjung',
            'getPengunjung' => $model->paginate($perPage), // Pagination
            'pager' => $model->pager, // Pager object
            'perPage' => $perPage, // Pass $perPage to the view
        ];

        return view('admin/data_pengunjung', $data);
    }

    public function addPengunjung($kode_tiket)
{
    $tiketModel = new TiketModel();
    $atraksiModel = new AtraksiModel();

    // Ambil data tiket berdasarkan kode_tiket
    $data['getTiket'] = $tiketModel->byKode($kode_tiket);

    if (empty($data['getTiket'])) {
        return redirect()->back()->with('error', 'Tiket tidak ditemukan.');
    }

    // Pisahkan kode_atraksi menjadi array
    $kodeAtraksiArray = explode(',', $data['getTiket']['kode_atraksi']);

    // Ambil nama atraksi berdasarkan kode atraksi
    $namaAtraksiArray = [];
    foreach ($kodeAtraksiArray as $kode) {
        $atraksi = $atraksiModel->find($kode);
        if ($atraksi) {
            $namaAtraksiArray[] = $atraksi['nama_atraksi'];
        }
    }

    // Gabungkan nama atraksi menjadi string
    $data['namaAtraksi'] = implode(', ', $namaAtraksiArray);

    return view('pengunjung/add_pengunjung', $data);
}


public function simpanPengunjung()
{
    $pengunjungModel = new PengunjungModel();

    if (!$this->validate([
        'nama_pengunjung' => 'required',
        'email_pengunjung' => 'required|valid_email',
        'jk' => 'required',
        'no_hp' => 'required|numeric',
        'kode_tiket' => 'required',
        'total_pembayaran' => 'required|numeric',
        'nama_atraksi' => 'required',
    ])) {
        session()->setFlashdata('errors', $this->validator->getErrors());
        return redirect()->back()->withInput();
    }

    // Generate unique kode_pengunjung
    $lastPengunjungData = $pengunjungModel->orderBy('kode_pengunjung', 'DESC')->first();
    $newPengunjungCode = $lastPengunjungData
        ? 'P' . str_pad((int)substr($lastPengunjungData['kode_pengunjung'], 1) + 1, 3, '0', STR_PAD_LEFT)
        : 'P001';

    // Prepare data untuk pengunjung
    $pengunjungData = [
        'kode_pengunjung' => $newPengunjungCode,
        'kode_tiket' => $this->request->getPost('kode_tiket'),
        'nama_atraksi' => $this->request->getPost('nama_atraksi'), 
        'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
        'email_pengunjung' => $this->request->getPost('email_pengunjung'),
        'jk' => $this->request->getPost('jk'),
        'no_hp' => $this->request->getPost('no_hp'),
        'total_pembayaran' => $this->request->getPost('total_pembayaran'),
    ];
    
    $pengunjungModel->savePengunjung($pengunjungData);


    session()->setFlashdata('success', 'Data Pengunjung dan Pemesanan berhasil disimpan.');
    return redirect()->to(site_url('admin/payment/' . $pengunjungData['kode_pengunjung']));
}


    public function editPengunjung($kode_pengunjung)
    {
        $model = new PengunjungModel();
        $getPengunjung = $model->find($kode_pengunjung);

        if (!$getPengunjung) {
            session()->setFlashdata('error', 'Kode Pengunjung ' . $kode_pengunjung . ' tidak ditemukan.');
            return redirect()->to(site_url('admin/data_pengunjung'));
        }

        $data = [
            'title' => 'Edit Data Pengunjung',
            'Pengunjung' => $getPengunjung,
        ];

        return view('admin/edit_pengunjung', $data);
    }

    public function deletePengunjung($kode_pengunjung)
    {
        $model = new PengunjungModel();
        if ($model->delete($kode_pengunjung)) {
            session()->setFlashdata('success', 'Data Pengunjung berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kode Pengunjung tidak ditemukan.');
        }

        return redirect()->to(site_url('admin/data_pengunjung'));
    }
}
