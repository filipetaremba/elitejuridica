<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        // Estatísticas mockadas (substituir por queries reais quando os models estiverem prontos)
        $stats = [
            ['icone' => 'ph-users-three',   'label' => 'Membros da Equipa', 'valor' => 6,  'cor' => '#373737'],
            ['icone' => 'ph-scales',        'label' => 'Serviços Activos',  'valor' => 9,  'cor' => '#555'],
            ['icone' => 'ph-newspaper',     'label' => 'Artigos Publicados','valor' => 6,  'cor' => '#777'],
            ['icone' => 'ph-envelope-open', 'label' => 'Mensagens Novas',   'valor' => 3,  'cor' => '#999'],
        ];

        // Actividade recente mockada
        $actividade = [
            ['tipo'=>'noticia',  'icone'=>'ph-newspaper',   'msg'=>'Novo artigo publicado: "Alterações à Lei do Trabalho"', 'quando'=>'Há 2 horas'],
            ['tipo'=>'equipe',   'icone'=>'ph-user-plus',   'msg'=>'Membro adicionado: Dr. Pedro Nhambe',                  'quando'=>'Há 1 dia'],
            ['tipo'=>'mensagem', 'icone'=>'ph-envelope',    'msg'=>'Nova mensagem de contacto recebida',                   'quando'=>'Há 2 dias'],
            ['tipo'=>'servico',  'icone'=>'ph-briefcase',   'msg'=>'Serviço actualizado: Direito Administrativo',          'quando'=>'Há 3 dias'],
            ['tipo'=>'login',    'icone'=>'ph-sign-in',     'msg'=>'Login efectuado: editor@advocacia.co.mz',              'quando'=>'Há 4 dias'],
        ];

        $data = [
            'title'      => 'Dashboard — Área Administrativa',
            'stats'      => $stats,
            'actividade' => $actividade,
            'success'    => session()->getFlashdata('success'),
        ];

        return view('templates/admin/main', $data + [
            'content' => view('admin/dashboard/index', $data),
        ]);
    }

    public function perfil(): string
    {
        $data = [
            'title'  => 'Meu Perfil',
            'errors' => session()->getFlashdata('errors') ?? [],
            'success'=> session()->getFlashdata('success'),
        ];

        return view('templates/admin/main', $data + [
            'content' => view('admin/dashboard/perfil', $data),
        ]);
    }

    public function updatePerfil(): \CodeIgniter\HTTP\RedirectResponse
    {
        $userId = session()->get('user_id');

        $rules = [
            'nome'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
        ];

        if (!empty($this->request->getPost('password'))) {
            $rules['password']         = 'min_length[6]';
            $rules['password_confirm'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $dados = [
            'nome'  => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $dados['password'] = $this->request->getPost('password');
        }

        $model->update($userId, $dados);

        // Actualiza sessão
        session()->set('user_nome',  $dados['nome']);
        session()->set('user_email', $dados['email']);

        return redirect()->to('/admin/perfil')->with('success', 'Perfil actualizado com sucesso.');
    }
}