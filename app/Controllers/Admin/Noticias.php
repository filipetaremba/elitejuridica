<?php

namespace App\Controllers\Admin;

use App\Models\NoticiasModel;

class Noticias extends BaseAdminController
{
    protected string $module = 'noticias';
    private NoticiasModel $model;

    public function __construct()
    {
        $this->model = new NoticiasModel();
    }

    public function index(): string
    {
        $noticias = $this->model->orderBy('publicado_em', 'DESC')->findAll();

        return $this->render('admin/noticias/index', array_merge(
            $this->baseData('Notícias'),
            ['noticias' => $noticias]
        ));
    }

    public function criar(): string
    {
        return $this->render('admin/noticias/form', array_merge(
            $this->baseData('Nova Notícia'),
            ['noticia' => null, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function guardar(): \CodeIgniter\HTTP\RedirectResponse
    {
        $dados = $this->request->getPost();
        $erros = $this->validar($dados);
        if ($erros) return redirect()->back()->withInput()->with('errors', $erros);

        $dados['slug']         = $this->model->gerarSlug($dados['titulo']);
        $dados['destaque']     = isset($dados['destaque'])  ? 1 : 0;
        $dados['publicado']    = isset($dados['publicado']) ? 1 : 0;
        $dados['publicado_em'] = $dados['publicado_em'] ?: date('Y-m-d H:i:s');
        $dados['autor']        = $dados['autor'] ?: session('user_nome');
        $dados['user_id']      = session('user_id');
        $dados['imagem']       = $this->uploadImagem();

        $this->model->skipValidation(true)->insert($dados);

        return $this->back('admin/noticias', 'Artigo publicado com sucesso.');
    }

    public function editar(int $id)    {
        $noticia = $this->model->find($id);
        if (!$noticia) return $this->backError('admin/noticias', 'Artigo não encontrado.');

        return $this->render('admin/noticias/form', array_merge(
            $this->baseData('Editar Artigo'),
            ['noticia' => $noticia, 'errors' => session()->getFlashdata('errors') ?? []]
        ));
    }

    public function actualizar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $noticia = $this->model->find($id);
        if (!$noticia) return $this->backError('admin/noticias', 'Artigo não encontrado.');

        $dados = $this->request->getPost();
        $erros = $this->validar($dados);
        if ($erros) return redirect()->back()->withInput()->with('errors', $erros);

        $dados['slug']      = $this->model->gerarSlug($dados['titulo'], $id);
        $dados['destaque']  = isset($dados['destaque'])  ? 1 : 0;
        $dados['publicado'] = isset($dados['publicado']) ? 1 : 0;

        $novaImagem = $this->uploadImagem();
        if ($novaImagem) {
            $dados['imagem'] = $novaImagem;
        } else {
            unset($dados['imagem']);
        }

        $this->model->skipValidation(true)->update($id, $dados);

        return $this->back('admin/noticias', 'Artigo actualizado com sucesso.');
    }

    public function apagar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if (!$this->model->find($id)) return $this->backError('admin/noticias', 'Artigo não encontrado.');

        $this->model->delete($id);
        return $this->back('admin/noticias', 'Artigo removido com sucesso.');
    }

    private function validar(array $dados): array
    {
        $v = \Config\Services::validation();
        $v->setRules([
            'titulo'  => 'required|min_length[5]',
            'resumo'  => 'required|min_length[10]',
        ]);
        return $v->run($dados) ? [] : $v->getErrors();
    }

    private function uploadImagem(): ?string
    {
        $file = $this->request->getFile('imagem');
        if (!$file || !$file->isValid() || $file->hasMoved()) return null;

        $nome = $file->getRandomName();
        $file->move(FCPATH . 'assets/images/noticias', $nome);
        return 'assets/images/noticias/' . $nome;
    }
}