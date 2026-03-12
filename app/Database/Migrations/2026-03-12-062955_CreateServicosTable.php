<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicosTable extends Migration
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
            'icone' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'default'    => 'ph-scales',
                'null'       => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Texto longo para a página individual (futuro)
            'conteudo' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'destaque' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'ativo' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'ordem' => [
                'type'       => 'INT',
                'constraint' => 3,
                'default'    => 0,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('destaque');
        $this->forge->addKey('ativo');
        $this->forge->createTable('servicos');
    }

    public function down(): void
    {
        $this->forge->dropTable('servicos', true);
    }
}