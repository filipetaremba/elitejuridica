<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracoesModel extends Model
{
    protected $table            = 'configuracoes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'chave', 'valor', 'grupo', 'tipo', 'label', 'ordem',
    ];

    // Cache em memória para evitar queries repetidas no mesmo request
    private static array $cache = [];

    // ── Helpers ─────────────────────────────────────────

    /**
     * Lê um valor pelo chave
     * Ex: ConfiguracoesModel::get('site_nome')
     */
    public function get(string $chave, string $default = ''): string
    {
        if (isset(self::$cache[$chave])) {
            return self::$cache[$chave];
        }

        $row = $this->where('chave', $chave)->first();
        $val = $row['valor'] ?? $default;

        self::$cache[$chave] = $val;
        return $val;
    }

    /**
     * Define ou actualiza um valor
     * Ex: $model->set('site_nome', 'Advocacia Lda')
     */
    public function setConfig(string $chave, string $valor): void
    {
        $existing = $this->where('chave', $chave)->first();

        if ($existing) {
            $this->update($existing['id'], ['valor' => $valor]);
        } else {
            $this->insert(['chave' => $chave, 'valor' => $valor]);
        }

        self::$cache[$chave] = $valor;
    }

    /**
     * Devolve todas as configs como array chave => valor
     * Ex: ['site_nome' => 'Advocacia', 'site_email' => '...']
     */
    public function getAll(): array
    {
        $rows   = $this->orderBy('grupo')->orderBy('ordem')->findAll();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['chave']] = $row['valor'];
        }
        return $result;
    }

    /**
     * Devolve todas as configs de um grupo
     */
    public function getGrupo(string $grupo): array
    {
        $rows   = $this->where('grupo', $grupo)->orderBy('ordem')->findAll();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['chave']] = $row['valor'];
        }
        return $result;
    }

    /**
     * Salva múltiplos valores de uma vez (formulário de settings)
     */
    public function salvarTodos(array $dados): void
    {
        foreach ($dados as $chave => $valor) {
            $this->set($chave, (string) $valor);
        }
    }

    /** Limpa o cache em memória */
    public function limparCache(): void
    {
        self::$cache = [];
    }
}