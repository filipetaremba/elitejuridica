<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {
        $parceiros = [
            ['nome' => 'Ordem dos Advogados de Moçambique', 'sigla' => 'OAM'],
            ['nome' => 'International Bar Association',     'sigla' => 'IBA'],
            ['nome' => 'African Bar Association',           'sigla' => 'AFBA'],
            ['nome' => 'Câmara de Comércio e Indústria',   'sigla' => 'CCI'],
        ];

        $lideranca = [
            [
                'nome'          => 'Dr. João Silva',
                'cargo'         => 'Sócio Fundador',
                'especialidade' => 'Direito Civil & Empresarial',
                'foto'          => base_url('assets/images/equipe/joao-silva.jpg'),
                'slug'          => 'joao-silva',
                'linkedin'      => '#',
            ],
            [
                'nome'          => 'Dra. Ana Ferreira',
                'cargo'         => 'Sócia',
                'especialidade' => 'Direito Penal',
                'foto'          => base_url('assets/images/equipe/ana-ferreira.jpg'),
                'slug'          => 'ana-ferreira',
                'linkedin'      => '#',
            ],
            [
                'nome'          => 'Dr. Carlos Matos',
                'cargo'         => 'Sócio Sénior',
                'especialidade' => 'Direito Administrativo',
                'foto'          => base_url('assets/images/equipe/carlos-matos.jpg'),
                'slug'          => 'carlos-matos',
                'linkedin'      => '#',
            ],
        ];

        $data = [
            'title'            => 'Sobre Nós — Advocacia & Consultoria Jurídica',
            'meta_description' => 'Conheça a nossa história, missão, valores e a equipa que nos torna referência jurídica em Moçambique.',
            'page_title'       => 'Sobre Nós',
            'page_label'       => 'O Escritório',
            'page_subtitle'    => 'Conheça a nossa história, missão e os valores que nos guiam.',
            'breadcrumbs'      => [['label' => 'Sobre Nós', 'url' => '']],
            'parceiros'        => $parceiros,
            'lideranca'        => $lideranca,
            'image'            => base_url('assets/images/banner1.jpeg'),
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('about/index', $data),
        ]);
    }
}