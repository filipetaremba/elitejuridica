<?php

namespace App\Controllers\Admin;

use App\Models\EquipeModel;

class Equipe extends BaseAdminController
{
    protected string $module = 'equipe';
    private EquipeModel $model;

    public function __construct()
    {
        $this->model = new EquipeModel();
    }

    // ── Lista ────────────────────────────────────────
    public function index(): string
    {
        $membros = $this->model->orderBy('ordem', 'ASC')->findAll();

        return $this->render('admin/equipe/index', array_merge(
            $this->baseData('Equipa'),
            ['membros' => $membros]
        ));
    }

    // ── Criar ────────────────────────────────────────
    public function criar(): string
    {
        return $this->render('admin/equipe/form', array_merge(
            $this->baseData('Novo Membro'),
            ['membro' => null, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    // ── Guardar ──────────────────────────────────────
    public function guardar(): \CodeIgniter\HTTP\RedirectResponse
    {
        $dados = $this->request->getPost();
        $erros = $this->validar($dados);

        if ($erros) {
            return redirect()->back()->withInput()->with('errors', $erros);
        }

        $dados['slug']   = $this->model->gerarSlug($dados['nome']);
        $dados['areas']  = array_filter(explode(',', $dados['areas_raw'] ?? ''));
        $dados['idiomas']= array_filter(explode(',', $dados['idiomas_raw'] ?? ''));
        $dados['foto']   = $this->uploadFoto();
        $dados['destaque'] = isset($dados['destaque']) ? 1 : 0;
        $dados['ativo']    = isset($dados['ativo'])    ? 1 : 0;

        $this->model->skipValidation(true)->insert($dados);

        return $this->back('admin/equipe', 'Membro adicionado com sucesso.');
    }

    // ── Editar ───────────────────────────────────────
    public function editar(int $id)   {
        $membro = $this->model->find($id);
        if (!$membro) return $this->backError('admin/equipe', 'Membro não encontrado.');

        return $this->render('admin/equipe/form', array_merge(
            $this->baseData('Editar Membro'),
            ['membro' => $membro, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    // ── Actualizar ───────────────────────────────────
    public function actualizar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $membro = $this->model->find($id);
        if (!$membro) return $this->backError('admin/equipe', 'Membro não encontrado.');

        $dados = $this->request->getPost();
        $erros = $this->validar($dados, $id);

        if ($erros) {
            return redirect()->back()->withInput()->with('errors', $erros);
        }

        $dados['slug']    = $this->model->gerarSlug($dados['nome'], $id);
        $dados['areas']   = array_filter(explode(',', $dados['areas_raw'] ?? ''));
        $dados['idiomas'] = array_filter(explode(',', $dados['idiomas_raw'] ?? ''));
        $dados['destaque']= isset($dados['destaque']) ? 1 : 0;
        $dados['ativo']   = isset($dados['ativo'])    ? 1 : 0;

        $novaFoto = $this->uploadFoto();
        if ($novaFoto) {
            $dados['foto'] = $novaFoto;
        } else {
            unset($dados['foto']); // mantém a existente
        }

        $this->model->skipValidation(true)->update($id, $dados);

        return $this->back('admin/equipe', 'Membro actualizado com sucesso.');
    }

    // ── Apagar ───────────────────────────────────────
    public function apagar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $membro = $this->model->find($id);
        if (!$membro) return $this->backError('admin/equipe', 'Membro não encontrado.');

        $this->model->delete($id);
        return $this->back('admin/equipe', 'Membro removido com sucesso.');
    }

    // ── Toggle destaque (AJAX) ───────────────────────
    public function toggleDestaque(int $id): \CodeIgniter\HTTP\Response
    {
        $membro = $this->model->find($id);
        if (!$membro) return $this->response->setStatusCode(404);

        $this->model->update($id, ['destaque' => $membro['destaque'] ? 0 : 1]);
        return $this->response->setJSON(['ok' => true]);
    }

    // ── Helpers privados ─────────────────────────────
    private function validar(array $dados, ?int $id = null): array
    {
        $rules = [
            'nome'  => 'required|min_length[3]',
            'cargo' => 'required|min_length[2]',
            'email' => 'permit_empty|valid_email',
        ];

        $validation = \Config\Services::validation();
        $validation->setRules($rules);

        return $validation->run($dados) ? [] : $validation->getErrors();
    }

    private function uploadFoto()
    {
        $file = $this->request->getFile('foto');
        if (!$file || !$file->isValid() || $file->hasMoved()) return null;

        $nome = $file->getRandomName();
        $file->move(FCPATH . 'assets/images/equipe', $nome);
        return 'assets/images/equipe/' . $nome;
    }
}