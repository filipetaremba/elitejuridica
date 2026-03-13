<?php

namespace App\Controllers;

use App\Models\ServicosModel;
use App\Models\EquipeModel;
use App\Models\NoticiasModel;
use App\Models\BannerModel; // ✅ Adicionei o modelo do banner

class Home extends BaseController
{
    public function index(): string
    {
        // ── Banner / Slider (dados do banco) ────────────
        $bannerModel = new BannerModel();
        $banners = $bannerModel->findAll();

        // Transformar os banners no formato que a view espera
        $banner_data = ['slides' => []];
        foreach ($banners as $banner) {
            $banner_data['slides'][] = [
                'image'    => base_url($banner['image']),
                'label'    => $banner['label'],
                'titulo'   => $banner['titulo'],
                'subtitulo'=> $banner['subtitulo'],
                'cta'      => [
                    'texto' => $banner['cta_texto'],
                    'url'   => $banner['cta_url']
                ],
            ];
        }

        // ── Serviços (destaques) ─────────────────────────
        // $servicos_data = [
        //     'servicos' => (new ServicosModel())
        //         ->where('destaque', 1)
        //         ->limit(6)
        //         ->findAll(),
        // ];

        // ── Equipa (destaques) ───────────────────────────
        // $equipe_data = [
        //     'equipe' => (new EquipeModel())
        //         ->where('destaque', 1)
        //         ->limit(4)
        //         ->findAll(),
        // ];

        // ── Notícias (últimas 3) ─────────────────────────
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