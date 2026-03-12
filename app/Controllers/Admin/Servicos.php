<?php

namespace App\Controllers\Admin;

use App\Models\ServicosModel;

class Servicos extends BaseAdminController
{
    protected string $module = 'servicos';
    private ServicosModel $model;

    public function __construct()
    {
        $this->model = new ServicosModel();
    }

    public function index(): string
    {
        $servicos = $this->model->orderBy('ordem', 'ASC')->findAll();

        return $this->render('admin/servicos/index', array_merge(
            $this->baseData('Serviços'),
            ['servicos' => $servicos]
        ));
    }

    public function criar(): string
    {
        return $this->render('admin/servicos/form', array_merge(
            $this->baseData('Novo Serviço'),
            ['servico' => null, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function guardar(): \CodeIgniter\HTTP\RedirectResponse
    {
        $dados = $this->request->getPost();
        $erros = $this->validar($dados);
        if ($erros) return redirect()->back()->withInput()->with('errors', $erros);

        $dados['destaque'] = isset($dados['destaque']) ? 1 : 0;
        $dados['ativo']    = isset($dados['ativo'])    ? 1 : 0;
        $dados['ordem']    = $dados['ordem'] ?? ($this->model->countAll() + 1);

        $this->model->skipValidation(true)->insert($dados);

        return $this->back('admin/servicos', 'Serviço criado com sucesso.');
    }

    public function editar(int $id){
        $servico = $this->model->find($id);
        if (!$servico) return $this->backError('admin/servicos', 'Serviço não encontrado.');

        return $this->render('admin/servicos/form', array_merge(
            $this->baseData('Editar Serviço'),
            ['servico' => $servico, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function actualizar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if (!$this->model->find($id)) return $this->backError('admin/servicos', 'Serviço não encontrado.');

        $dados = $this->request->getPost();
        $erros = $this->validar($dados);
        if ($erros) return redirect()->back()->withInput()->with('errors', $erros);

        $dados['destaque'] = isset($dados['destaque']) ? 1 : 0;
        $dados['ativo']    = isset($dados['ativo'])    ? 1 : 0;

        $this->model->skipValidation(true)->update($id, $dados);

        return $this->back('admin/servicos', 'Serviço actualizado com sucesso.');
    }

    public function apagar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if (!$this->model->find($id)) return $this->backError('admin/servicos', 'Serviço não encontrado.');

        $this->model->delete($id);
        return $this->back('admin/servicos', 'Serviço removido com sucesso.');
    }

    private function validar(array $dados): array
    {
        $v = \Config\Services::validation();
        $v->setRules(['titulo' => 'required|min_length[3]']);
        return $v->run($dados) ? [] : $v->getErrors();
    }
}