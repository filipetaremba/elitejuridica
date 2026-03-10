<?php

namespace App\Controllers;

use App\Models\ServicosModel;
use App\Models\EquipeModel;
use App\Models\NoticiasModel;

class Home extends BaseController
{
    public function index(): string
    {
        // ── Banner / Slider ─────────────────────────────
        $banner_data = [
            'slides' => [
                [
                    'image'    => base_url('assets/images/banner1.jpeg'),
                    'label'    => 'Direito Civil & Empresarial',
                    'titulo'   => 'Defendemos os seus Direitos com Rigor e Ética',
                    'subtitulo'=> 'Consultoria jurídica especializada para particulares e empresas.',
                    'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('servicos')],
                ],
                [
                    'image'    => base_url('assets/images/banner2.webp'),
                    'label'    => 'Direito Penal',
                    'titulo'   => 'Protecção Jurídica Quando Mais Precisa',
                    'subtitulo'=> 'Representação sólida e estratégica em todos os tribunais.',
                    'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('servicos')],
                ],
                [
                    'image'    => base_url('assets/images/banner-3.jpg'),
                    'label'    => 'Direito de Família',
                    'titulo'   => 'Soluções Humanas para Questões Complexas',
                    'subtitulo'=> 'Acompanhamento sensível e eficaz em processos familiares.',
                    'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('about')],
                ],
            ],
        ];

        // // ── Serviços (destaques) ─────────────────────────
        // $servicos_data = [
        //     'servicos' => (new ServicosModel())
        //         ->where('destaque', 1)
        //         ->limit(6)
        //         ->findAll(),
        // ];

        // // ── Equipa (destaques) ───────────────────────────
        // $equipe_data = [
        //     'equipe' => (new EquipeModel())
        //         ->where('destaque', 1)
        //         ->limit(4)
        //         ->findAll(),
        // ];

        // // ── Notícias (últimas 3) ─────────────────────────
        // $noticias_data = [
        //     'noticias' => (new NoticiasModel())
        //         ->orderBy('created_at', 'DESC')
        //         ->limit(3)
        //         ->findAll(),
        // ];

        // ── Monta a página ───────────────────────────────
        $data = [
            'title'            => 'Advocacia & Consultoria Jurídica',
            'meta_description' => 'Escritório de advocacia comprometido com a excelência e defesa dos seus direitos.',
            'banner_data'      => $banner_data,
            // 'servicos_data'    => $servicos_data,
            // 'equipe_data'      => $equipe_data,
            // 'noticias_data'    => $noticias_data,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('home/index', $data),
        ]);
    }
}