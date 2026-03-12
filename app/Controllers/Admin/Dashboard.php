<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\EquipeModel;
use App\Models\ServicosModel;
use App\Models\NoticiasModel;
use App\Models\MensagensModel;

class Dashboard extends BaseAdminController
{
    public function index(): string
    {
        $equipeModel    = new EquipeModel();
        $servicosModel  = new ServicosModel();
        $noticiasModel  = new NoticiasModel();
        $mensagensModel = new MensagensModel();

        $stats = [
            [
                'icone' => 'ph-users-three',
                'label' => 'Membros da Equipa',
                'valor' => $equipeModel->where('ativo', 1)->countAllResults(),
                'url'   => 'admin/equipe',
            ],
            [
                'icone' => 'ph-scales',
                'label' => 'Serviços Activos',
                'valor' => $servicosModel->where('ativo', 1)->countAllResults(),
                'url'   => 'admin/servicos',
            ],
            [
                'icone' => 'ph-newspaper',
                'label' => 'Artigos Publicados',
                'valor' => $noticiasModel->where('publicado', 1)->countAllResults(),
                'url'   => 'admin/noticias',
            ],
            [
                'icone' => 'ph-envelope',
                'label' => 'Mensagens Novas',
                'valor' => $mensagensModel->where('lida', 0)->countAllResults(),
                'url'   => 'admin/mensagens',
            ],
        ];

        $ultimasNoticias = $noticiasModel
            ->select('id, titulo, categoria, publicado_em, publicado, imagem')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $mensagensRecentes = $mensagensModel
            ->select('id, nome, email, assunto, area, created_at, lida')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $ultimosMembros = $equipeModel
            ->select('id, nome, cargo, foto, created_at')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->findAll();

        $data = array_merge($this->baseData('Dashboard'), [
            'stats'             => $stats,
            'ultimasNoticias'   => $ultimasNoticias,
            'mensagensRecentes' => $mensagensRecentes,
            'ultimosMembros'    => $ultimosMembros,
        ]);

        return $this->render('admin/dashboard/index', $data);
    }

    public function perfil(): string
    {
        $data = array_merge($this->baseData('Meu Perfil'), [
            'errors' => session()->getFlashdata('errors') ?? [],
        ]);

        return $this->render('admin/dashboard/perfil', $data);
    }

    public function updatePerfil(): \CodeIgniter\HTTP\RedirectResponse
    {
        $userId = (int) session()->get('user_id');

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

        $model->skipValidation(true)->update($userId, $dados);

        session()->set('user_nome',  $dados['nome']);
        session()->set('user_email', $dados['email']);

        return redirect()->to(base_url('admin/perfil'))
            ->with('success', 'Perfil actualizado com sucesso.');
    }
}