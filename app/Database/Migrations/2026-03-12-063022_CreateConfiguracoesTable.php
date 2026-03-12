<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConfiguracoesTable extends Migration
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
            // Chave única ex: "site_nome", "site_email", "endereco"
            'chave' => [
                'type'       => 'VARCHAR',
                'constraint' => 80,
            ],
            'valor' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Agrupamento: "geral", "contacto", "redes_sociais", "seo"
            'grupo' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'geral',
            ],
            'tipo' => [
                'type'       => 'ENUM',
                'constraint' => ['text', 'textarea', 'email', 'url', 'tel', 'image'],
                'default'    => 'text',
            ],
            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
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
        $this->forge->addUniqueKey('chave');
        $this->forge->addKey('grupo');
        $this->forge->createTable('configuracoes');
    }

    public function down(): void
    {
        $this->forge->dropTable('configuracoes', true);
    }
}