<?php

namespace App\Models;

use CodeIgniter\Model;

class MensagensModel extends Model
{
    protected $table            = 'mensagens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'nome', 'email', 'telefone', 'area',
        'assunto', 'mensagem',
        'lida', 'respondida', 'notas', 'ip',
    ];

    // ── Helpers ─────────────────────────────────────────

    /** Todas as mensagens, mais recentes primeiro */
    public function getTodas(int $limit = 20, int $offset = 0): array
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit, $offset)
                    ->findAll();
    }

    /** Mensagens não lidas */
    public function getNaoLidas(): array
    {
        return $this->where('lida', 0)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /** Contagem de não lidas (para badge na sidebar) */
    public function totalNaoLidas(): int
    {
        return $this->where('lida', 0)->countAllResults();
    }

    /** Marca como lida */
    public function marcarLida(int $id): void
    {
        $this->update($id, ['lida' => 1]);
    }

    /** Marca como respondida */
    public function marcarRespondida(int $id): void
    {
        $this->update($id, ['lida' => 1, 'respondida' => 1]);
    }

    /** Guarda notas internas */
    public function guardarNotas(int $id, string $notas): void
    {
        $this->update($id, ['notas' => $notas]);
    }

    /** Cria mensagem vinda do formulário público */
    public function registar(array $dados): int|false
    {
        $dados['ip'] = service('request')->getIPAddress();
        $this->insert($dados);
        return $this->getInsertID() ?: false;
    }
}