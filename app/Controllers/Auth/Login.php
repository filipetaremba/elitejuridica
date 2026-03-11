<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UserModel;


class Login extends BaseController
{
    public function index()
    {
        // Se já está logado, redireciona para admin
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Login — Área Administrativa',
            'error' => session()->getFlashdata('error'),
        ];

        return view('auth/login', $data);
    }

    public function attempt(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Preencha todos os campos correctamente.');
        }

        $model = new UserModel();
        $user  = $model->authenticate(
            $this->request->getPost('email'),
            $this->request->getPost('password')
        );

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email ou password incorrectos.');
        }

        // Inicia sessão
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'user_nome'  => $user['nome'],
            'user_email' => $user['email'],
            'user_role'  => $user['role'],
        ]);

        return redirect()->to('/admin')->with('success', 'Bem-vindo, ' . $user['nome'] . '!');
    }
}