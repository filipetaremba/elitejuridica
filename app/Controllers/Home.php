<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'            => 'Advocacia & Consultoria Jurídica',
            'meta_description' => 'Escritório de advocacia comprometido com a excelência e defesa dos seus direitos.',
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('home/index', $data),
        ]);
    }
}
