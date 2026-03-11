<?php

namespace App\Controllers;

class Noticias extends BaseController
{
    private function getNoticias(): array
    {
        return [
            [
                'id'         => 1,
                'slug'       => 'nova-lei-trabalho-2024',
                'categoria'  => 'Direito Laboral',
                'titulo'     => 'Alterações à Lei do Trabalho: o que muda em 2024',
                'resumo'     => 'As recentes alterações legislativas trazem novas obrigações para empregadores e reforçam os direitos dos trabalhadores em Moçambique.',
                'conteudo'   => '<p>O Governo de Moçambique aprovou em 2024 um conjunto de alterações significativas à Lei do Trabalho (Lei n.º 23/2007), com impacto directo nas relações laborais em todo o país. As mudanças abrangem matérias como a duração dos contratos a termo, as condições de rescisão, o regime de horas extraordinárias e os direitos à licença de maternidade e paternidade.</p><h3>Principais alterações</h3><p>Entre as modificações mais relevantes, destaca-se o alargamento do período de licença de maternidade de 60 para 90 dias, bem como a introdução de uma licença de paternidade remunerada de 10 dias úteis. Estas medidas visam promover a igualdade de género no mercado de trabalho e incentivar a partilha das responsabilidades familiares.</p><p>No que respeita aos contratos a termo certo, o número máximo de renovações foi reduzido de três para duas, obrigando os empregadores a converterem o vínculo em contrato sem termo após o segundo término, salvo razões objectivas devidamente documentadas.</p><h3>Impacto para as empresas</h3><p>Para as empresas, as alterações implicam uma revisão dos processos internos de gestão de recursos humanos, actualização dos contratos de trabalho em vigor e adequação das políticas de rescisão. O incumprimento das novas disposições pode resultar em coimas significativas e em litígios laborais custosos.</p><p>Recomendamos que todas as empresas procedam a uma auditoria jurídica dos seus contratos e regulamentos internos antes do final do primeiro trimestre de 2025.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-1.jpg'),
                'autor'      => 'Dr. Pedro Nhambe',
                'created_at' => '2024-11-10 09:00:00',
                'destaque'   => 1,
            ],
            [
                'id'         => 2,
                'slug'       => 'constituicao-empresas-guia',
                'categoria'  => 'Direito Empresarial',
                'titulo'     => 'Guia prático para constituição de empresas em Moçambique',
                'resumo'     => 'Conheça todos os passos legais, documentação necessária e prazos para registar a sua empresa de forma rápida e segura.',
                'conteudo'   => '<p>Constituir uma empresa em Moçambique tornou-se um processo mais simplificado nos últimos anos, graças às reformas do ambiente de negócios introduzidas pelo Governo. No entanto, é fundamental conhecer os requisitos legais e seguir os procedimentos correctos para evitar contratempos.</p><h3>Escolha do tipo societário</h3><p>O primeiro passo é definir o tipo de sociedade mais adequado ao seu projecto. As formas mais comuns são a Sociedade por Quotas (Lda.) e a Sociedade Anónima (S.A.). A Lda. é a opção preferida pelas PME pela sua simplicidade de gestão e menor capital mínimo exigido. A S.A. é recomendada para projectos de maior dimensão que prevejam abertura de capital ou cotação em bolsa.</p><h3>Documentação necessária</h3><p>Para a constituição de uma Lda. são necessários: escritura pública de constituição, bilhetes de identidade dos sócios, NUIT dos sócios, comprovativo de sede social, e capital mínimo de 20.000 MT. O registo é feito no Conservatória do Registo de Entidades Legais (CREL) e pode ser concluído em 5 a 10 dias úteis.</p><h3>Passos após o registo</h3><p>Após o registo, a empresa deve obter o NUIT institucional na Autoridade Tributária, licença de actividade no município competente, e inscrição no INSS para os trabalhadores. Dependendo da actividade, podem ser necessárias licenças sectoriais adicionais.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-2.jpg'),
                'autor'      => 'Dr. Carlos Matos',
                'created_at' => '2024-10-28 14:30:00',
                'destaque'   => 1,
            ],
            [
                'id'         => 3,
                'slug'       => 'direitos-consumidor',
                'categoria'  => 'Direito Civil',
                'titulo'     => 'Direitos do consumidor: como reclamar e ser ressarcido',
                'resumo'     => 'Muitos cidadãos desconhecem os seus direitos face a produtos defeituosos ou serviços prestados de forma inadequada.',
                'conteudo'   => '<p>A Lei de Defesa do Consumidor de Moçambique garante um conjunto de direitos fundamentais a todos os cidadãos enquanto consumidores de bens e serviços. Contudo, a maioria das pessoas desconhece estes direitos e como exercê-los de forma efectiva.</p><h3>Direitos fundamentais do consumidor</h3><p>Entre os principais direitos consagrados na lei, destacam-se: o direito à informação clara e transparente sobre os produtos e serviços, o direito à qualidade e segurança dos bens adquiridos, o direito à reparação ou substituição de produtos defeituosos, e o direito ao ressarcimento por danos causados.</p><h3>Como reclamar</h3><p>Quando os seus direitos são violados, deve em primeiro lugar contactar o fornecedor por escrito, descrevendo o problema e indicando a solução pretendida. Se não obtiver resposta satisfatória em 15 dias, pode apresentar queixa na Direcção de Inspecção de Actividades Económicas (DINAE) ou recorrer ao tribunal.</p><h3>Prazos de garantia</h3><p>Os produtos têm garantia legal mínima de 12 meses para bens móveis e 5 anos para imóveis. Durante este período, o consumidor tem direito à reparação gratuita ou substituição do bem defeituoso, sem prejuízo de outros direitos legalmente previstos.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-3.jpg'),
                'autor'      => 'Dra. Ana Ferreira',
                'created_at' => '2024-10-15 10:00:00',
                'destaque'   => 0,
            ],
            [
                'id'         => 4,
                'slug'       => 'duat-tudo-que-precisa-saber',
                'categoria'  => 'Direito Imobiliário',
                'titulo'     => 'DUAT: tudo o que precisa de saber sobre o direito de uso e aproveitamento da terra',
                'resumo'     => 'O DUAT é o título que formaliza o direito de usar e explorar um terreno em Moçambique. Saiba como obtê-lo e quais os seus direitos.',
                'conteudo'   => '<p>Em Moçambique, a terra pertence ao Estado e não pode ser vendida ou comprada. O que pode ser adquirido é o Direito de Uso e Aproveitamento da Terra (DUAT), que confere ao seu titular o direito de usar e explorar um determinado terreno por um período determinado.</p><h3>Tipos de DUAT</h3><p>Existem dois tipos principais: o DUAT por ocupação, reconhecido por quem ocupa terra há pelo menos 10 anos em boa fé, e o DUAT por pedido, concedido pelo Estado mediante solicitação formal. O primeiro tem carácter permanente; o segundo tem prazo de 50 anos renovável.</p><h3>Como requerer o DUAT</h3><p>O pedido é submetido ao Serviço Distrital de Actividades Económicas e Sociais (SDAES) da área onde se localiza o terreno. É necessário apresentar o formulário de pedido, bilhete de identidade, planta do terreno e, em alguns casos, um plano de uso do terreno.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-4.jpg'),
                'autor'      => 'Dr. João Silva',
                'created_at' => '2024-09-30 08:00:00',
                'destaque'   => 0,
            ],
            [
                'id'         => 5,
                'slug'       => 'divorcio-processo-e-direitos',
                'categoria'  => 'Direito de Família',
                'titulo'     => 'Divórcio em Moçambique: processo, direitos e partilha de bens',
                'resumo'     => 'Conheça os tipos de divórcio reconhecidos pela lei moçambicana, os seus direitos durante o processo e como funciona a partilha de bens.',
                'conteudo'   => '<p>O processo de divórcio em Moçambique está regulado pelo Código Civil e pela Lei da Família. Existem duas modalidades principais: o divórcio por mútuo consentimento e o divórcio litigioso. A escolha entre ambos depende da vontade das partes e das circunstâncias do caso.</p><h3>Divórcio por mútuo consentimento</h3><p>Quando ambos os cônjuges concordam com a dissolução do casamento e chegam a acordo sobre os termos — guarda dos filhos, alimentos e partilha de bens — o processo é mais simples e pode ser concluído no registo civil. É a opção mais rápida e menos onerosa.</p><h3>Divórcio litigioso</h3><p>Quando não há acordo, qualquer um dos cônjuges pode apresentar acção de divórcio no tribunal. O processo pode ser moroso, especialmente se houver conflito sobre a guarda dos filhos ou partilha de bens de valor significativo.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-5.jpg'),
                'autor'      => 'Dra. Maria Sousa',
                'created_at' => '2024-09-12 11:00:00',
                'destaque'   => 0,
            ],
            [
                'id'         => 6,
                'slug'       => 'arbitragem-resolucao-alternativa-litigios',
                'categoria'  => 'Direito Empresarial',
                'titulo'     => 'Arbitragem: a resolução alternativa de litígios que as empresas precisam conhecer',
                'resumo'     => 'A arbitragem oferece uma alternativa mais rápida e confidencial aos tribunais para resolver disputas comerciais. Saiba como funciona.',
                'conteudo'   => '<p>A arbitragem é um mecanismo de resolução alternativa de litígios em que as partes escolhem um árbitro ou painel de árbitros para decidir o seu conflito, em vez de recorrer aos tribunais estaduais. Em Moçambique, a arbitragem é regulada pela Lei n.º 11/99, de 8 de Julho.</p><h3>Vantagens da arbitragem</h3><p>As principais vantagens incluem: confidencialidade do processo, maior rapidez na resolução (tipicamente 6 a 18 meses face a anos nos tribunais), possibilidade de escolher árbitros especialistas na matéria em disputa, e carácter vinculativo da decisão.</p><h3>Quando usar a arbitragem</h3><p>A arbitragem é especialmente adequada para disputas comerciais de valor significativo, contratos internacionais, e situações em que a confidencialidade é fundamental. A cláusula arbitral deve ser inserida nos contratos no momento da sua celebração.</p>',
                'imagem'     => base_url('assets/images/noticias/noticia-6.jpg'),
                'autor'      => 'Dr. Carlos Matos',
                'created_at' => '2024-08-20 09:30:00',
                'destaque'   => 0,
            ],
        ];
    }

    // ── Lista de notícias ────────────────────────────────
    public function index(): string
    {
        $todas     = $this->getNoticias();
        $destaques = array_values(array_filter($todas, fn($n) => !empty($n['destaque'])));
        $restantes = array_values(array_filter($todas, fn($n) => empty($n['destaque'])));

        $data = [
            'title'            => 'Notícias — Advocacia & Consultoria Jurídica',
            'meta_description' => 'Fique a par das últimas novidades jurídicas e actualizações legislativas de Moçambique.',
            'page_title'       => 'Notícias',
            'page_label'       => 'Jurídico & Actualidade',
            'page_subtitle'    => 'Informação jurídica actualizada para cidadãos e empresas.',
            'breadcrumbs'      => [['label' => 'Notícias', 'url' => '']],
            'destaques'        => $destaques,
            'restantes'        => $restantes,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('noticias/index', $data),
        ]);
    }

    // ── Notícia individual ───────────────────────────────
    public function show(string $slug): string
    {
        $todas   = $this->getNoticias();
        $noticia = null;

        foreach ($todas as $n) {
            if ($n['slug'] === $slug) { $noticia = $n; break; }
        }

        if (!$noticia) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Notícia não encontrada: $slug");
        }

        // Relacionadas — mesma categoria, excluindo a actual
        $relacionadas = array_values(array_filter($todas, fn($n) =>
            $n['categoria'] === $noticia['categoria'] && $n['slug'] !== $slug
        ));
        $relacionadas = array_slice($relacionadas, 0, 3);

        // Recentes para sidebar
        $recentes = array_values(array_filter($todas, fn($n) => $n['slug'] !== $slug));
        $recentes = array_slice($recentes, 0, 4);

        $data = [
            'title'       => $noticia['titulo'] . ' — Advocacia',
            'breadcrumbs' => [
                ['label' => 'Notícias',       'url' => 'noticias'],
                ['label' => $noticia['titulo'], 'url' => ''],
            ],
            'noticia'     => $noticia,
            'relacionadas'=> $relacionadas,
            'recentes'    => $recentes,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('noticias/noticia', $data),
        ]);
    }
}