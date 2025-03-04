<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengunjungModel;
use App\Models\Admin\DeskripsiModel;
use App\Models\TiketModel;

class Pengunjung extends BaseController
{
    public function index()
{
    $model = new DeskripsiModel();
    $data['getDeskripsi'] = $model->getDeskripsiWithAtraksi();

    if (empty($data['getDeskripsi'])) {
        $data['error'] = 'Tidak ada deskripsi yang tersedia saat ini.';
    }

    return view('pengunjung/landingpage', $data);
}

}
