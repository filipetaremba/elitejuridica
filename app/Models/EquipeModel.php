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

    protected $beforeInsert = ['serializeArrays'];
    protected $beforeUpdate = ['serializeArrays'];
    protected $afterFind    = ['unserializeArrays'];

    // ── Callbacks ────────────────────────────────────────

    /**
     * Antes de inserir/actualizar: converte arrays PHP em JSON string
     */
    protected function serializeArrays(array $data): array
    {
        foreach (['areas', 'idiomas'] as $field) {
            if (isset($data['data'][$field]) && is_array($data['data'][$field])) {
                $data['data'][$field] = json_encode(
                    array_values(array_filter(array_map('trim', $data['data'][$field])))
                );
            }
        }
        return $data;
    }

    /**
     * Depois de ler da BD: converte JSON string de volta para array PHP.
     *
     * O CI4 usa $data['singleton']:
     *   true  → find($id) / first()  → $data['data'] é array associativo
     *   false → findAll()            → $data['data'] é array numérica de rows
     */
    protected function unserializeArrays(array $data): array
    {
        if (empty($data['data'])) {
            return $data;
        }

        if ($data['singleton'] === true) {
            $data['data'] = $this->decodeJsonFields($data['data']);
        } else {
            foreach ($data['data'] as &$row) {
                $row = $this->decodeJsonFields($row);
            }
            unset($row);
        }

        return $data;
    }

    /**
     * Deserializa campos JSON num registo individual
     */
    private function decodeJsonFields(array $row): array
    {
        foreach (['areas', 'idiomas'] as $field) {
            if (empty($row[$field])) {
                $row[$field] = [];
                continue;
            }
            if (is_string($row[$field])) {
                $decoded = json_decode($row[$field], true);
                $row[$field] = is_array($decoded)
                    ? $decoded
                    : array_map('trim', explode(',', $row[$field]));
            }
        }
        return $row;
    }

    // ── Helpers ─────────────────────────────────────────

    public function getActivos(): array
    {
        return $this->where('ativo', 1)
                    ->orderBy('ordem', 'ASC')
                    ->findAll();
    }

    public function getDestaques(int $limit = 4): array
    {
        return $this->where('ativo', 1)
                    ->where('destaque', 1)
                    ->orderBy('ordem', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)
                    ->where('ativo', 1)
                    ->first();
    }

    /**
     * Gera slug único — trata caracteres portugueses sem depender de iconv
     */
    public function gerarSlug(string $nome, ?int $excludeId = null): string
    {
        $map = [
            'á'=>'a','à'=>'a','â'=>'a','ã'=>'a','ä'=>'a',
            'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
            'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
            'ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o',
            'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
            'ç'=>'c','ñ'=>'n',
            'Á'=>'a','À'=>'a','Â'=>'a','Ã'=>'a','Ä'=>'a',
            'É'=>'e','È'=>'e','Ê'=>'e','Ë'=>'e',
            'Í'=>'i','Ì'=>'i','Î'=>'i','Ï'=>'i',
            'Ó'=>'o','Ò'=>'o','Ô'=>'o','Õ'=>'o','Ö'=>'o',
            'Ú'=>'u','Ù'=>'u','Û'=>'u','Ü'=>'u',
            'Ç'=>'c','Ñ'=>'n',
        ];

        $base = strtr(strtolower(trim($nome)), $map);
        $base = preg_replace('/[^a-z0-9]+/', '-', $base);
        $base = trim($base, '-');

        $count = 0;
        do {
            $candidate = $count === 0 ? $base : "{$base}-{$count}";
            $query = $this->where('slug', $candidate);
            if ($excludeId) {
                $query = $query->where('id !=', $excludeId);
            }
            $exists = $query->first();
            $count++;
        } while ($exists);

        return $count === 1 ? $base : "{$base}-" . ($count - 1);
    }
}