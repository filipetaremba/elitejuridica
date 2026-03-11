<?php

namespace App\Controllers;

class Servicos extends BaseController
{
    public function index(): string
    {
        $servicos = [
            // ── Destaques (destaque = 1) ─────────────────────────────────
            [
                'id'        => 1,
                'icone'     => 'ph-scales',
                'titulo'    => 'Direito Civil',
                'descricao' => 'Contratos, responsabilidade civil, propriedade, sucessões e relações entre particulares. Actuamos em negociação e litígio com igual eficácia e rigor.',
                'destaque'  => 1,
                'ordem'     => 1,
            ],
            [
                'id'        => 2,
                'icone'     => 'ph-handcuffs',
                'titulo'    => 'Direito Penal',
                'descricao' => 'Defesa e representação em processos criminais. Rigor na análise dos factos e estratégia na sala de audiências, com total confidencialidade.',
                'destaque'  => 1,
                'ordem'     => 2,
            ],
            [
                'id'        => 3,
                'icone'     => 'ph-buildings',
                'titulo'    => 'Direito Empresarial',
                'descricao' => 'Constituição de empresas, due diligence, fusões e aquisições, contratos comerciais e resolução de litígios societários de forma estratégica.',
                'destaque'  => 1,
                'ordem'     => 3,
            ],
            [
                'id'        => 4,
                'icone'     => 'ph-users-three',
                'titulo'    => 'Direito Laboral',
                'descricao' => 'Relações de trabalho, rescisões, negociação colectiva, defesa em processos disciplinares e plena assessoria aos direitos do trabalhador.',
                'destaque'  => 1,
                'ordem'     => 4,
            ],
            [
                'id'        => 5,
                'icone'     => 'ph-house',
                'titulo'    => 'Direito de Família',
                'descricao' => 'Divórcio, regulação do poder paternal, guarda de menores, alimentos, partilhas e adopção. Acompanhamento sensível, humano e discreto.',
                'destaque'  => 1,
                'ordem'     => 5,
            ],
            [
                'id'        => 6,
                'icone'     => 'ph-bank',
                'titulo'    => 'Direito Administrativo',
                'descricao' => 'Relações com entidades públicas, licenciamentos, concursos públicos, impugnação de actos administrativos e contencioso fiscal.',
                'destaque'  => 1,
                'ordem'     => 6,
            ],

            // ── Outras áreas (destaque = 0) ──────────────────────────────
            [
                'id'        => 7,
                'icone'     => 'ph-globe',
                'titulo'    => 'Direito Internacional',
                'descricao' => 'Contratos internacionais, arbitragem, reconhecimento de sentenças estrangeiras e assessoria a investidores estrangeiros em Moçambique.',
                'destaque'  => 0,
                'ordem'     => 7,
            ],
            [
                'id'        => 8,
                'icone'     => 'ph-file-text',
                'titulo'    => 'Direito Imobiliário',
                'descricao' => 'Compra e venda de imóveis, DUAT, arrendamento, licenciamento urbanístico e resolução de conflitos fundiários.',
                'destaque'  => 0,
                'ordem'     => 8,
            ],
            [
                'id'        => 9,
                'icone'     => 'ph-chart-line-up',
                'titulo'    => 'Direito Fiscal',
                'descricao' => 'Planeamento fiscal, regularização tributária, impugnações fiscais e assessoria em matéria de impostos para empresas e particulares.',
                'destaque'  => 0,
                'ordem'     => 9,
            ],
        ];

        $data = [
            'title'            => 'Serviços Jurídicos — Advocacia & Consultoria',
            'meta_description' => 'Conheça as nossas áreas de atuação: Direito Civil, Penal, Empresarial, Laboral, Família e Administrativo.',
            'page_title'       => 'Serviços',
            'page_label'       => 'Áreas de Atuação',
            'page_subtitle'    => 'Soluções jurídicas especializadas para cada necessidade.',
            'breadcrumbs'      => [['label' => 'Serviços', 'url' => '']],
            'servicos'         => $servicos,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('servicos/index', $data),
        ]);
    }
}