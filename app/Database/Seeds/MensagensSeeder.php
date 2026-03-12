<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MensagensSeeder extends Seeder
{
    public function run(): void
    {
        $now  = date('Y-m-d H:i:s');

        $data = [
            [
                'nome'        => 'António Machava',
                'email'       => 'antonio.machava@gmail.com',
                'telefone'    => '+258 84 111 2222',
                'area'        => 'laboral',
                'assunto'     => 'Rescisão de contrato de trabalho',
                'mensagem'    => 'Bom dia, fui despedido sem justa causa e gostaria de saber quais são os meus direitos e como posso reclamar a indemnização devida.',
                'lida'        => 0,
                'respondida'  => 0,
                'ip'          => '192.168.1.1',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nome'        => 'Fátima Nhantumbo',
                'email'       => 'fatima.n@outlook.com',
                'telefone'    => '+258 82 333 4444',
                'area'        => 'familia',
                'assunto'     => 'Processo de divórcio',
                'mensagem'    => 'Necessito de acompanhamento jurídico para iniciar um processo de divórcio por mútuo consentimento. Temos dois filhos menores.',
                'lida'        => 1,
                'respondida'  => 0,
                'ip'          => '192.168.1.2',
                'created_at'  => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at'  => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'nome'        => 'Empresa XYZ Lda',
                'email'       => 'geral@xyz.co.mz',
                'telefone'    => '+258 21 000 0000',
                'area'        => 'empresarial',
                'assunto'     => 'Constituição de sociedade',
                'mensagem'    => 'Somos uma empresa estrangeira e pretendemos constituir uma subsidiária em Moçambique. Gostaríamos de agendar uma reunião para discutir o processo.',
                'lida'        => 1,
                'respondida'  => 1,
                'notas'       => 'Reunião agendada para 15/01/2025. Cliente enviado ao Dr. Carlos Matos.',
                'ip'          => '192.168.1.3',
                'created_at'  => date('Y-m-d H:i:s', strtotime('-5 days')),
                'updated_at'  => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
        ];

        $this->db->table('mensagens')->insertBatch($data);
    }
}