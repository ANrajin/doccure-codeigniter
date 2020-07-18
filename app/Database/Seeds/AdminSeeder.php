<?php

namespace App\Database\Seeds;

class AdminSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'unique_id' => 'superadmin',
            'username' => 'Super Admin',
            'email'    => 'admin@email.com',
            'password'  => password_hash("admin", PASSWORD_DEFAULT)
        ];

        // Using Query Builder
        $this->db->table('admins')->insert($data);
    }
}
