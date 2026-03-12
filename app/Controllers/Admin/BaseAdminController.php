<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BaseAdminController extends BaseController
{
    protected string $module = '';

    /**
     * Renderiza uma view dentro do layout admin
     */
    protected function render(string $view, array $data = []): string
    {
        return view('templates/admin/main', array_merge($data, [
            'content' => view($view, $data),
        ]));
    }

    /**
     * Redireciona com flash de sucesso
     */
    protected function back(string $url, string $msg): \CodeIgniter\HTTP\RedirectResponse
    {
        return redirect()->to(base_url($url))->with('success', $msg);
    }

    /**
     * Redireciona com flash de erro
     */
    protected function backError(string $url, string $msg): \CodeIgniter\HTTP\RedirectResponse
    {
        return redirect()->to(base_url($url))->with('error', $msg);
    }

    /**
     * Confirma que o utilizador tem role admin
     */
    protected function isAdmin(): bool
    {
        return session('user_role') === 'admin';
    }

    /**
     * Dados comuns passados a todas as views admin
     */
    protected function baseData(string $title, string $extra = ''): array
    {
        return [
            'title'   => $title . ' — Admin',
            'module'  => $this->module,
            'success' => session()->getFlashdata('success'),
            'error'   => session()->getFlashdata('error'),
        ];
    }
}