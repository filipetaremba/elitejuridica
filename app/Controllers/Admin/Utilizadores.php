<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

class Utilizadores extends BaseAdminController
{
    protected string $module = 'utilizadores';
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    // Só admins podem aceder
    private function checkAdmin(): ?\CodeIgniter\HTTP\RedirectResponse
    {
        if (!$this->isAdmin()) {
            return $this->backError('admin', 'Não tem permissão para aceder a esta área.');
        }
        return null;
    }

    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        $utilizadores = $this->model->orderBy('created_at', 'DESC')->findAll();

        return $this->render('admin/utilizadores/index', array_merge(
            $this->baseData('Utilizadores'),
            ['utilizadores' => $utilizadores]
        ));
    }

    public function criar(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        return $this->render('admin/utilizadores/form', array_merge(
            $this->baseData('Novo Utilizador'),
            ['utilizador' => null, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function guardar(): \CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        $dados = $this->request->getPost();

        $rules = [
            'nome'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'in_list[admin,editor]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->skipValidation(true)->insert([
            'nome'     => $dados['nome'],
            'email'    => $dados['email'],
            'password' => $dados['password'], // model faz hash
            'role'     => $dados['role'] ?? 'editor',
            'ativo'    => isset($dados['ativo']) ? 1 : 0,
        ]);

        return $this->back('admin/utilizadores', 'Utilizador criado com sucesso.');
    }

    public function editar(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        $utilizador = $this->model->find($id);
        if (!$utilizador) return $this->backError('admin/utilizadores', 'Utilizador não encontrado.');

        return $this->render('admin/utilizadores/form', array_merge(
            $this->baseData('Editar Utilizador'),
            ['utilizador' => $utilizador, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function actualizar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        $utilizador = $this->model->find($id);
        if (!$utilizador) return $this->backError('admin/utilizadores', 'Utilizador não encontrado.');

        $dados = $this->request->getPost();

        $rules = [
            'nome'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role'  => 'in_list[admin,editor]',
        ];
        if (!empty($dados['password'])) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $update = [
            'nome'  => $dados['nome'],
            'email' => $dados['email'],
            'role'  => $dados['role'] ?? 'editor',
            'ativo' => isset($dados['ativo']) ? 1 : 0,
        ];
        if (!empty($dados['password'])) {
            $update['password'] = $dados['password'];
        }

        $this->model->skipValidation(true)->update($id, $update);

        return $this->back('admin/utilizadores', 'Utilizador actualizado com sucesso.');
    }

    public function apagar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if ($r = $this->checkAdmin()) return $r;

        // Não pode apagar o próprio utilizador
        if ($id === (int) session('user_id')) {
            return $this->backError('admin/utilizadores', 'Não pode apagar a sua própria conta.');
        }

        if (!$this->model->find($id)) return $this->backError('admin/utilizadores', 'Utilizador não encontrado.');

        $this->model->delete($id);
        return $this->back('admin/utilizadores', 'Utilizador removido com sucesso.');
    }
}