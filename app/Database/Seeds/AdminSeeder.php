<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nome'       => 'Administrador',
                'email'      => 'admin@advocacia.co.mz',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'ativo'      => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome'       => 'Editor',
                'email'      => 'editor@advocacia.co.mz',
                'password'   => password_hash('editor123', PASSWORD_DEFAULT),
                'role'       => 'editor',
                'ativo'      => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}