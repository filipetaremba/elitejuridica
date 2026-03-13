<?php

namespace App\Controllers;

use App\Models\EquipeModel;

class Equipe extends BaseController
{
    protected EquipeModel $equipeModel;

    public function __construct()
    {
        $this->equipeModel = new EquipeModel();
    }

    // ── Normaliza o campo foto para URL absoluto ──────
    private function normalizarFoto(array $membro): array
    {
        if (!empty($membro['foto']) && ! str_starts_with($membro['foto'], 'http')) {
            $membro['foto'] = base_url($membro['foto']);
        }
        return $membro;
    }

    // ── Lista de membros ─────────────────────────────
    public function index(): string
    {
        $membros = array_map(
            fn($m) => $this->normalizarFoto($m),
            $this->equipeModel->getActivos()
        );

        $destaques = array_values(array_filter($membros, fn($m) => !empty($m['destaque'])));
        $restantes = array_values(array_filter($membros, fn($m) => empty($m['destaque'])));

        $data = [
            'title'            => 'A Nossa Equipa — Advocacia & Consultoria Jurídica',
            'meta_description' => 'Conheça os advogados do nosso escritório: profissionais experientes e dedicados à sua causa.',
            'page_title'       => 'A Nossa Equipa',
            'page_label'       => 'Profissionais',
            'page_subtitle'    => 'Advogados experientes e dedicados à defesa dos seus direitos.',
            'breadcrumbs'      => [['label' => 'Equipa', 'url' => '']],
            'destaques'        => $destaques,
            'restantes'        => $restantes,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('equipe/index', $data),
        ]);
    }

    // ── Perfil individual ────────────────────────────
    public function perfil(string $slug): string
    {
        $membro = $this->equipeModel->getBySlug($slug);

        if (!$membro) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Membro não encontrado: $slug");
        }

        $membro = $this->normalizarFoto($membro);

        $outros = array_values(array_filter(
            array_map(
                fn($m) => $this->normalizarFoto($m),
                $this->equipeModel->getDestaques()
            ),
            fn($m) => $m['slug'] !== $slug
        ));

        $data = [
            'title'       => $membro['nome'] . ' — Advocacia & Consultoria Jurídica',
            'page_title'  => $membro['nome'],
            'page_label'  => $membro['cargo'],
            'breadcrumbs' => [
                ['label' => 'Equipa', 'url' => 'equipe'],
                ['label' => $membro['nome'], 'url' => ''],
            ],
            'membro' => $membro,
            'outros' => $outros,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('equipe/perfil', $data),
        ]);
    }
}