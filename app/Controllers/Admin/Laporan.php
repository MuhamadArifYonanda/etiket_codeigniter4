<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        $data['title']       = 'Data Atraksi';
        return view('admin/laporan',$data);
    }
}