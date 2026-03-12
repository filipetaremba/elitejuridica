<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model
{
    protected $table            = 'noticias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'slug', 'categoria', 'titulo', 'resumo', 'conteudo',
        'imagem', 'autor', 'user_id',
        'destaque', 'publicado', 'publicado_em',
    ];

    // ── Helpers ─────────────────────────────────────────

    /** Notícias publicadas, mais recentes primeiro */
    public function getPublicadas(int $limit = 10, int $offset = 0): array
    {
        return $this->where('publicado', 1)
                    ->orderBy('publicado_em', 'DESC')
                    ->limit($limit, $offset)
                    ->findAll();
    }

    /** Destaques para a home */
    public function getDestaques(int $limit = 3): array
    {
        return $this->where('publicado', 1)
                    ->where('destaque', 1)
                    ->orderBy('publicado_em', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /** Últimas N publicadas (sem destaque obrigatório) */
    public function getUltimas(int $limit = 3): array
    {
        return $this->where('publicado', 1)
                    ->orderBy('publicado_em', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /** Por slug */
    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)
                    ->where('publicado', 1)
                    ->first();
    }

    /** Relacionadas — mesma categoria, excluindo slug actual */
    public function getRelacionadas(string $categoria, string $slugExcluir, int $limit = 3): array
    {
        return $this->where('categoria', $categoria)
                    ->where('slug !=', $slugExcluir)
                    ->where('publicado', 1)
                    ->orderBy('publicado_em', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /** Categorias distintas (para filtros/menu) */
    public function getCategorias(): array
    {
        $rows = $this->select('categoria')
                     ->where('publicado', 1)
                     ->where('categoria IS NOT NULL')
                     ->groupBy('categoria')
                     ->orderBy('categoria', 'ASC')
                     ->findAll();

        return array_column($rows, 'categoria');
    }

    /** Contagem total de publicadas */
    public function totalPublicadas(): int
    {
        return $this->where('publicado', 1)->countAllResults();
    }

    /** Gera slug único */
    public function gerarSlug(string $titulo, ?int $excludeId = null): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo), '-'));
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);

        $base  = $slug;
        $count = 0;

        do {
            $candidate = $count === 0 ? $base : "{$base}-{$count}";
            $query     = $this->where('slug', $candidate);
            if ($excludeId) {
                $query = $query->where('id !=', $excludeId);
            }
            $exists = $query->first();
            $count++;
        } while ($exists);

        return $count === 1 ? $base : "{$base}-" . ($count - 1);
    }
}