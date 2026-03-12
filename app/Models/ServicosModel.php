<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicosModel extends Model
{
    protected $table            = 'servicos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'icone', 'titulo', 'descricao', 'conteudo',
        'destaque', 'ativo', 'ordem',
    ];

    // ── Helpers ─────────────────────────────────────────

    /** Todos os serviços activos ordenados */
    public function getActivos(): array
    {
        return $this->where('ativo', 1)
                    ->orderBy('ordem', 'ASC')
                    ->findAll();
    }

    /** Apenas destaques */
    public function getDestaques(int $limit = 6): array
    {
        return $this->where('ativo', 1)
                    ->where('destaque', 1)
                    ->orderBy('ordem', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    /** Reordena — recebe array de ids na nova ordem */
    public function reordenar(array $ids): void
    {
        foreach ($ids as $ordem => $id) {
            $this->update((int) $id, ['ordem' => $ordem + 1]);
        }
    }
}