<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PemesananModel;

class Data_Pemesanan extends BaseController
{
    public function data_pemesanan()
    {
        
        $model = new PemesananModel();
        $perPage = 10;

        $data['title'] = 'Data Pemesanan';
        $data['pemesanan'] = $model->getPemesananLengkap();

        return view('admin/data_pemesanan', $data);
    }
}
