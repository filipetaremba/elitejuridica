<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title'  => 'Registo — Área Administrativa',
            'errors' => session()->getFlashdata('errors') ?? [],
        ];

        return view('auth/register', $data);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'nome'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        $messages = [
            'email'            => ['is_unique'  => 'Este email já está registado.'],
            'password_confirm' => ['matches'    => 'As passwords não coincidem.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        // Desactiva validação interna do model (já validámos acima)
        $model->skipValidation(true)->insert([
            'nome'     => $this->request->getPost('nome'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'), // o model faz hash
            'role'     => 'editor', // novos registos são sempre editores
            'ativo'    => 1,
        ]);

        return redirect()->to('/login')
            ->with('success', 'Conta criada com sucesso! Faça login para continuar.');
    }
}