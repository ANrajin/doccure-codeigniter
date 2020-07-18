<?php

namespace App\Models;

use CodeIgniter\Model;

class Doctor extends Model
{
    protected $table      = 'doctor';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'address',
        'postal_code',
        'division_id',
        'district_id',
        'image'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
