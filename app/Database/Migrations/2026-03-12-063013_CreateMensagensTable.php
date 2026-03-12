<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMensagensTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'telefone' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'area' => [
                'type'       => 'VARCHAR',
                'constraint' => 80,
                'null'       => true,
            ],
            'assunto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'mensagem' => [
                'type' => 'TEXT',
            ],
            'lida' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'respondida' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'notas' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('lida');
        $this->forge->addKey('respondida');
        $this->forge->createTable('mensagens');
    }

    public function down(): void
    {
        $this->forge->dropTable('mensagens', true);
    }
}