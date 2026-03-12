<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNoticiasTable extends Migration
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
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'categoria' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'resumo' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'conteudo' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'imagem' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'autor' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            // FK opcional para users.id
            'user_id' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'destaque' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'publicado' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'publicado_em' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->addKey('publicado');
        $this->forge->addKey('destaque');
        $this->forge->addKey('categoria');
        $this->forge->createTable('noticias');
    }

    public function down(): void
    {
        $this->forge->dropTable('noticias', true);
    }
}