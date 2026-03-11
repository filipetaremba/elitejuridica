<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'            => 'Contacto — Advocacia & Consultoria Jurídica',
            'meta_description' => 'Entre em contacto connosco. Responderemos com brevidade.',
            'page_title'       => 'Fale Connosco',
            'page_label'       => 'Contacto',
            'page_subtitle'    => 'Estamos disponíveis para o ajudar. A primeira consulta é gratuita.',
            'breadcrumbs'      => [['label' => 'Contacto', 'url' => '']],
            'success'          => session()->getFlashdata('success'),
            'errors'           => session()->getFlashdata('errors') ?? [],
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('contact/index', $data),
        ]);
    }

    public function send(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'nome'     => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'assunto'  => 'required|min_length[3]',
            'mensagem' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // TODO: enviar email com Email library do CI4
        // $email = \Config\Services::email();
        // $email->setTo('geral@advocacia.co.mz');
        // ...

        return redirect()->to('contact')
            ->with('success', 'Mensagem enviada com sucesso! Entraremos em contacto brevemente.');
    }
}