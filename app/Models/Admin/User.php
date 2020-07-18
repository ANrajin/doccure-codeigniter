<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['role_id', 'verification_code', 'user_name', 'email', 'mobile', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
