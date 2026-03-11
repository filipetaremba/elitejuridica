<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'nome',
        'email',
        'password',
        'role',
        'ativo',
        'ultimo_login',
    ];

    // Validação
    protected $validationRules = [
        'nome'     => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|max_length[150]|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[6]',
        'role'     => 'in_list[admin,editor]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Este email já está registado.',
        ],
    ];

    // Hash automático da password antes de inserir/actualizar
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPasswordOnUpdate'];

    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash(
                $data['data']['password'],
                PASSWORD_DEFAULT
            );
        }
        return $data;
    }

    protected function hashPasswordOnUpdate(array $data): array
    {
        if (isset($data['data']['password']) && !empty($data['data']['password'])) {
            $data['data']['password'] = password_hash(
                $data['data']['password'],
                PASSWORD_DEFAULT
            );
        } else {
            // Se password vazia no update, não alterar
            unset($data['data']['password']);
        }
        return $data;
    }

    /**
     * Autentica um utilizador pelo email + password
     */
    public function authenticate(string $email, string $password): array|false
    {
        $user = $this->where('email', $email)
                     ->where('ativo', 1)
                     ->first();

        if (!$user) return false;
        if (!password_verify($password, $user['password'])) return false;

        // Actualiza último login
        $this->update($user['id'], ['ultimo_login' => date('Y-m-d H:i:s')]);

        return $user;
    }
}