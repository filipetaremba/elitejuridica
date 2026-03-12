<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'slug'         => 'nova-lei-trabalho-2024',
                'categoria'    => 'Direito Laboral',
                'titulo'       => 'Alterações à Lei do Trabalho: o que muda em 2024',
                'resumo'       => 'As recentes alterações legislativas trazem novas obrigações para empregadores e reforçam os direitos dos trabalhadores em Moçambique.',
                'conteudo'     => '<p>O Governo de Moçambique aprovou em 2024 um conjunto de alterações significativas à Lei do Trabalho (Lei n.º 23/2007), com impacto directo nas relações laborais em todo o país.</p><h3>Principais alterações</h3><p>Entre as modificações mais relevantes, destaca-se o alargamento do período de licença de maternidade de 60 para 90 dias, bem como a introdução de uma licença de paternidade remunerada de 10 dias úteis.</p><h3>Impacto para as empresas</h3><p>Para as empresas, as alterações implicam uma revisão dos processos internos de gestão de recursos humanos e actualização dos contratos de trabalho em vigor.</p>',
                'imagem'       => 'assets/images/noticias/noticia-1.jpg',
                'autor'        => 'Dr. Pedro Nhambe',
                'destaque'     => 1,
                'publicado'    => 1,
                'publicado_em' => '2024-11-10 09:00:00',
                'created_at'   => '2024-11-10 09:00:00',
                'updated_at'   => '2024-11-10 09:00:00',
            ],
            [
                'slug'         => 'constituicao-empresas-guia',
                'categoria'    => 'Direito Empresarial',
                'titulo'       => 'Guia prático para constituição de empresas em Moçambique',
                'resumo'       => 'Conheça todos os passos legais, documentação necessária e prazos para registar a sua empresa de forma rápida e segura.',
                'conteudo'     => '<p>Constituir uma empresa em Moçambique tornou-se um processo mais simplificado nos últimos anos, graças às reformas do ambiente de negócios.</p><h3>Escolha do tipo societário</h3><p>O primeiro passo é definir o tipo de sociedade mais adequado. As formas mais comuns são a Sociedade por Quotas (Lda.) e a Sociedade Anónima (S.A.).</p><h3>Documentação necessária</h3><p>Para a constituição de uma Lda. são necessários: escritura pública, bilhetes de identidade dos sócios, NUIT, comprovativo de sede e capital mínimo de 20.000 MT.</p>',
                'imagem'       => 'assets/images/noticias/noticia-2.jpg',
                'autor'        => 'Dr. Carlos Matos',
                'destaque'     => 1,
                'publicado'    => 1,
                'publicado_em' => '2024-10-28 14:30:00',
                'created_at'   => '2024-10-28 14:30:00',
                'updated_at'   => '2024-10-28 14:30:00',
            ],
            [
                'slug'         => 'direitos-consumidor',
                'categoria'    => 'Direito Civil',
                'titulo'       => 'Direitos do consumidor: como reclamar e ser ressarcido',
                'resumo'       => 'Muitos cidadãos desconhecem os seus direitos face a produtos defeituosos ou serviços prestados de forma inadequada.',
                'conteudo'     => '<p>A Lei de Defesa do Consumidor de Moçambique garante um conjunto de direitos fundamentais a todos os cidadãos enquanto consumidores de bens e serviços.</p><h3>Direitos fundamentais</h3><p>Entre os principais direitos destacam-se: o direito à informação clara, à qualidade e segurança dos bens adquiridos, e ao ressarcimento por danos causados.</p>',
                'imagem'       => 'assets/images/noticias/noticia-3.jpg',
                'autor'        => 'Dra. Ana Ferreira',
                'destaque'     => 0,
                'publicado'    => 1,
                'publicado_em' => '2024-10-15 10:00:00',
                'created_at'   => '2024-10-15 10:00:00',
                'updated_at'   => '2024-10-15 10:00:00',
            ],
            [
                'slug'         => 'duat-tudo-que-precisa-saber',
                'categoria'    => 'Direito Imobiliário',
                'titulo'       => 'DUAT: tudo o que precisa de saber sobre o direito de uso da terra',
                'resumo'       => 'O DUAT é o título que formaliza o direito de usar e explorar um terreno em Moçambique. Saiba como obtê-lo.',
                'conteudo'     => '<p>Em Moçambique, a terra pertence ao Estado e não pode ser vendida ou comprada. O que pode ser adquirido é o Direito de Uso e Aproveitamento da Terra (DUAT).</p><h3>Tipos de DUAT</h3><p>Existem dois tipos principais: o DUAT por ocupação, reconhecido por quem ocupa terra há pelo menos 10 anos, e o DUAT por pedido, concedido pelo Estado mediante solicitação formal.</p>',
                'imagem'       => 'assets/images/noticias/noticia-4.jpg',
                'autor'        => 'Dr. João Silva',
                'destaque'     => 0,
                'publicado'    => 1,
                'publicado_em' => '2024-09-30 08:00:00',
                'created_at'   => '2024-09-30 08:00:00',
                'updated_at'   => '2024-09-30 08:00:00',
            ],
            [
                'slug'         => 'divorcio-processo-e-direitos',
                'categoria'    => 'Direito de Família',
                'titulo'       => 'Divórcio em Moçambique: processo, direitos e partilha de bens',
                'resumo'       => 'Conheça os tipos de divórcio reconhecidos pela lei moçambicana e como funciona a partilha de bens.',
                'conteudo'     => '<p>O processo de divórcio em Moçambique está regulado pelo Código Civil e pela Lei da Família. Existem duas modalidades: divórcio por mútuo consentimento e divórcio litigioso.</p>',
                'imagem'       => 'assets/images/noticias/noticia-5.jpg',
                'autor'        => 'Dra. Maria Sousa',
                'destaque'     => 0,
                'publicado'    => 1,
                'publicado_em' => '2024-09-12 11:00:00',
                'created_at'   => '2024-09-12 11:00:00',
                'updated_at'   => '2024-09-12 11:00:00',
            ],
            [
                'slug'         => 'arbitragem-resolucao-alternativa-litigios',
                'categoria'    => 'Direito Empresarial',
                'titulo'       => 'Arbitragem: a resolução alternativa de litígios que as empresas precisam conhecer',
                'resumo'       => 'A arbitragem oferece uma alternativa mais rápida e confidencial aos tribunais para resolver disputas comerciais.',
                'conteudo'     => '<p>A arbitragem é um mecanismo de resolução alternativa de litígios em que as partes escolhem árbitros para decidir o seu conflito, regulada pela Lei n.º 11/99, de 8 de Julho.</p>',
                'imagem'       => 'assets/images/noticias/noticia-6.jpg',
                'autor'        => 'Dr. Carlos Matos',
                'destaque'     => 0,
                'publicado'    => 1,
                'publicado_em' => '2024-08-20 09:30:00',
                'created_at'   => '2024-08-20 09:30:00',
                'updated_at'   => '2024-08-20 09:30:00',
            ],
        ];

        $this->db->table('noticias')->insertBatch($data);
    }
}