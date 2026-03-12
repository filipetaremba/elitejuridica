<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipeModel extends Model
{
    protected $table            = 'equipe';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'slug', 'nome', 'cargo', 'especialidade', 'oab',
        'bio', 'formacao', 'pos_graduacao',
        'areas', 'idiomas', 'foto', 'email', 'linkedin',
        'destaque', 'ativo', 'ordem',
    ];

    // Serializa/deserializa arrays automaticamente
    protected $beforeInsert = ['serializeArrays'];
    protected $beforeUpdate = ['serializeArrays'];
    protected $afterFind    = ['unserializeArrays'];

    protected function serializeArrays(array $data): array
    {
        foreach (['areas', 'idiomas'] as $field) {
            if (isset($data['data'][$field]) && is_array($data['data'][$field])) {
                $data['data'][$field] = json_encode($data['data'][$field]);
            }
        }
        return $data;
    }

    protected function unserializeArrays(array $data): array
    {
        $rows = isset($data['data']) ? (isset($data['data']['id']) ? [$data['data']] : $data['data']) : [];
        foreach ($rows as &$row) {
            foreach (['areas', 'idiomas'] as $field) {
                if (!empty($row[$field]) && is_string($row[$field])) {
                    $decoded = json_decode($row[$field], true);
                    $row[$field] = is_array($decoded) ? $decoded : explode(',', $row[$field]);
                }
            }
        }
        unset($row);
        if (isset($data['data']['id'])) {
            $data['data'] = $rows[0];
        } else {
            $data['data'] = $rows;
        }
        return $data;
    }

    // ── Helpers ─────────────────────────────────────────

    /** Membros activos ordenados */
    public function getActivos(): array
    {
        return $this->where('ativo', 1)
                    ->orderBy('ordem', 'ASC')
                    ->findAll();
    }

    /** Apenas destaques (home) */
    public function getDestaques(int $limit = 4): array
    {
        return $this->where('ativo', 1)
                    ->where('destaque', 1)
                    ->orderBy('ordem', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    /** Busca por slug */
    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)
                    ->where('ativo', 1)
                    ->first();
    }

    /** Gera slug único a partir do nome */
    public function gerarSlug(string $nome, ?int $excludeId = null): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nome), '-'));
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