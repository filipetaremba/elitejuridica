<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicosSeeder extends Seeder
{
    public function run(): void
    {
        $now  = date('Y-m-d H:i:s');

        $data = [
            ['icone'=>'ph-scales',        'titulo'=>'Direito Civil',          'descricao'=>'Contratos, responsabilidade civil, propriedade, sucessões e relações entre particulares.', 'destaque'=>1, 'ordem'=>1],
            ['icone'=>'ph-handcuffs',     'titulo'=>'Direito Penal',          'descricao'=>'Defesa e representação em processos criminais com rigor e total confidencialidade.',         'destaque'=>1, 'ordem'=>2],
            ['icone'=>'ph-buildings',     'titulo'=>'Direito Empresarial',    'descricao'=>'Constituição de empresas, due diligence, fusões e aquisições, contratos comerciais.',        'destaque'=>1, 'ordem'=>3],
            ['icone'=>'ph-users-three',   'titulo'=>'Direito Laboral',        'descricao'=>'Relações de trabalho, rescisões, negociação colectiva e defesa em processos disciplinares.', 'destaque'=>1, 'ordem'=>4],
            ['icone'=>'ph-house',         'titulo'=>'Direito de Família',     'descricao'=>'Divórcio, guarda de menores, alimentos, partilhas e adopção com acompanhamento humano.',     'destaque'=>1, 'ordem'=>5],
            ['icone'=>'ph-bank',          'titulo'=>'Direito Administrativo', 'descricao'=>'Licenciamentos, concursos públicos, impugnação de actos e contencioso fiscal.',              'destaque'=>1, 'ordem'=>6],
            ['icone'=>'ph-globe',         'titulo'=>'Direito Internacional',  'descricao'=>'Contratos internacionais, arbitragem e assessoria a investidores estrangeiros em Moçambique.','destaque'=>0, 'ordem'=>7],
            ['icone'=>'ph-file-text',     'titulo'=>'Direito Imobiliário',    'descricao'=>'DUAT, compra e venda, arrendamento, licenciamento urbanístico e conflitos fundiários.',      'destaque'=>0, 'ordem'=>8],
            ['icone'=>'ph-chart-line-up', 'titulo'=>'Direito Fiscal',         'descricao'=>'Planeamento fiscal, regularização tributária e assessoria em matéria de impostos.',          'destaque'=>0, 'ordem'=>9],
        ];

        foreach ($data as &$row) {
            $row['ativo']      = 1;
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        $this->db->table('servicos')->insertBatch($data);
    }
}