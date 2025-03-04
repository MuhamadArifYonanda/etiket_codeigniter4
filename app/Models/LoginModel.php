<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'kode_user';
    protected $allowedFields    = ['kode_admin, username, password, status, role'];

    protected bool $allowEmptyInserts = false;
}
