<?php

namespace App\Controllers;

use App\Models\TiketModel;
use App\Models\Admin\AtraksiModel;
use CodeIgniter\Controller;

class TiketController extends Controller
{
    // Menampilkan halaman pemesanan
    public function addPemesanan()
    {
        $tiketModel = new TiketModel();
        $atraksiModel = new AtraksiModel();

        // Mengambil data tiket dan atraksi
        $data['title'] = 'Ticket';
        $data['ticket'] = $tiketModel->getTiket();
        $data['getAtraksi'] = $atraksiModel->findAll();

        return view('pengunjung/pemesanan', $data);
    }

    // Menambahkan tiket
    public function tambahTiket()
    {
        $tiketModel = new TiketModel();
        $atraksiModel = new AtraksiModel();

        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'tgl_berkunjung' => 'required|valid_date[Y-m-d]', // Pastikan tanggal valid
            'kode_atraksi' => 'required', // Pastikan setidaknya satu atraksi dipilih
            'total' => 'required|numeric' // Pastikan total berupa angka
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembali dengan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Mengambil data dari POST
        $tanggal = $this->request->getPost('tgl_berkunjung');
        $pilihanAtraksi = $this->request->getPost('kode_atraksi'); // Kode atraksi yang dipilih
        $total = $this->request->getPost('total');

        // Memastikan kode atraksi yang dipilih tidak kosong
        if (!empty($pilihanAtraksi)) {
            // Menyaring hanya kode atraksi yang valid
            $pilihanAtraksiValid = array_filter($pilihanAtraksi, function($kodeAtraksi) {
                return $kodeAtraksi != "0"; // Pastikan bukan kode '0'
            });

            // Jika ada kode atraksi yang valid
            if (!empty($pilihanAtraksiValid)) {
                // Menyimpan data tiket ke dalam array
                $data = [
                    'kode_tiket' => $this->generateKodeTiket(), // Menghasilkan kode tiket baru
                    'kode_atraksi' => implode(',', $pilihanAtraksiValid), // Menyimpan kode atraksi sebagai string yang dipisahkan koma
                    'tgl_berkunjung' => $tanggal,
                    'total' => $total
                ];

                // Log data sebelum disimpan
                log_message('info', 'Inserting ticket data: ' . print_r($data, true));

                // Menyimpan data tiket
                $tiketModel->insert($data);

                // Set pesan flash untuk sukses
                session()->setFlashdata('success', 'Tiket berhasil ditambahkan! Kode Tiket: ' . $data['kode_tiket']);

                // Redirect ke halaman add_pengunjung dengan kode tiket yang baru
                return redirect()->to('/add_pengunjung/' . $data['kode_tiket']);
            }
        }

        // Jika tidak ada atraksi yang dipilih
        return redirect()->back()->with('error', 'Silakan pilih minimal satu atraksi.');
    }

    // Menampilkan halaman untuk menambahkan pengunjung
    public function add_pengunjung($kode_tiket)
    {
        $tiketModel = new TiketModel();
        log_message('info', 'kode_tiket received: ' . $kode_tiket);

        // Mengambil data tiket berdasarkan kode_tiket
        $data['getTiket'] = $tiketModel->byKode($kode_tiket);

        // Mengecek apakah tiket ditemukan
        if (empty($data['getTiket'])) {
            log_message('error', 'Ticket not found for kode_tiket: ' . $kode_tiket);
            return redirect()->back()->with('error', 'Tiket tidak ditemukan.');
        } else {
            log_message('info', 'Ticket found: ' . print_r($data['getTiket'], true));
        }

        return view('pengunjung/add_pengunjung', $data);
    }

    // Fungsi untuk menghasilkan kode tiket secara acak
    private function generateKodeTiket()
    {
        $tiketModel = new TiketModel();
        do {
            $kodeTiket = 'TKT-' . strtoupper(bin2hex(random_bytes(5))); // Membuat kode tiket acak
            $exists = $tiketModel->where('kode_tiket', $kodeTiket)->first(); // Cek apakah kode tiket sudah ada
        } while ($exists); // Jika kode sudah ada, generate lagi

        return $kodeTiket;
    }
}
