<?php

namespace App\Controllers;

class Equipe extends BaseController
{
    private function getMembros(): array
    {
        return [
            [
                'id'            => 1,
                'slug'          => 'joao-silva',
                'nome'          => 'Dr. João Silva',
                'cargo'         => 'Sócio Fundador',
                'especialidade' => 'Direito Civil & Empresarial',
                'foto'          => base_url('assets/images/equipe/joao-silva.jpg'),
                'linkedin'      => '#',
                'email'         => 'joao.silva@advocacia.co.mz',
                'destaque'      => 1,
                'ordem'         => 1,
                'oab'           => 'OAM/BEI 0012',
                'formacao'      => 'Licenciatura em Direito — Universidade Eduardo Mondlane, 2003',
                'pos_graduacao' => 'Pós-Graduação em Direito Empresarial — ISCED, 2006',
                'bio'           => 'Com mais de 20 anos de experiência jurídica, o Dr. João Silva fundou o escritório em 2009 com a missão de oferecer serviços jurídicos de excelência à comunidade da Beira e de Moçambique. Especializado em Direito Civil e Empresarial, tem representado com sucesso clientes em processos complexos de alta relevância. É reconhecido pela sua abordagem estratégica, rigor técnico e comprometimento com cada caso que patrocina.',
                'areas'         => ['Direito Civil', 'Direito Empresarial', 'Contratos', 'Arbitragem'],
                'idiomas'       => ['Português', 'Inglês', 'Francês'],
            ],
            [
                'id'            => 2,
                'slug'          => 'ana-ferreira',
                'nome'          => 'Dra. Ana Ferreira',
                'cargo'         => 'Sócia',
                'especialidade' => 'Direito Penal',
                'foto'          => base_url('assets/images/equipe/ana-ferreira.jpg'),
                'linkedin'      => '#',
                'email'         => 'ana.ferreira@advocacia.co.mz',
                'destaque'      => 1,
                'ordem'         => 2,
                'oab'           => 'OAM/BEI 0034',
                'formacao'      => 'Licenciatura em Direito — Universidade Católica de Moçambique, 2005',
                'pos_graduacao' => 'Mestrado em Direito Penal — Universidade de Coimbra, 2009',
                'bio'           => 'A Dra. Ana Ferreira é uma das mais respeitadas advogadas penalistas de Moçambique. Com mestrado em Direito Penal pela Universidade de Coimbra, traz uma visão técnica apurada e uma capacidade ímpar de construir defesas sólidas. Ao longo da sua carreira, defendeu com êxito clientes em casos de elevada complexidade, sempre pautando a sua atuação pela ética e pela busca incansável da verdade.',
                'areas'         => ['Direito Penal', 'Crimes Económicos', 'Direito Processual Penal'],
                'idiomas'       => ['Português', 'Inglês'],
            ],
            [
                'id'            => 3,
                'slug'          => 'carlos-matos',
                'nome'          => 'Dr. Carlos Matos',
                'cargo'         => 'Advogado Sénior',
                'especialidade' => 'Direito Empresarial',
                'foto'          => base_url('assets/images/equipe/carlos-matos.jpg'),
                'linkedin'      => '#',
                'email'         => 'carlos.matos@advocacia.co.mz',
                'destaque'      => 1,
                'ordem'         => 3,
                'oab'           => 'OAM/BEI 0078',
                'formacao'      => 'Licenciatura em Direito — Universidade Pedagógica, 2008',
                'pos_graduacao' => 'MBA em Gestão e Direito Empresarial — ISBE, 2012',
                'bio'           => 'O Dr. Carlos Matos é especialista em Direito Empresarial, com vasta experiência em assessoria a PMEs e grandes empresas nacionais e internacionais. Participou em operações de fusão e aquisição de referência no mercado moçambicano e é o principal responsável pela área de constituição e reestruturação de sociedades no escritório.',
                'areas'         => ['Direito Empresarial', 'Fusões & Aquisições', 'Due Diligence', 'DUAT'],
                'idiomas'       => ['Português', 'Inglês', 'Espanhol'],
            ],
            [
                'id'            => 4,
                'slug'          => 'maria-sousa',
                'nome'          => 'Dra. Maria Sousa',
                'cargo'         => 'Advogada',
                'especialidade' => 'Direito de Família',
                'foto'          => base_url('assets/images/equipe/maria-sousa.jpg'),
                'linkedin'      => '#',
                'email'         => 'maria.sousa@advocacia.co.mz',
                'destaque'      => 1,
                'ordem'         => 4,
                'oab'           => 'OAM/BEI 0105',
                'formacao'      => 'Licenciatura em Direito — Universidade Eduardo Mondlane, 2012',
                'pos_graduacao' => 'Especialização em Direito de Família e Menores — UCM, 2015',
                'bio'           => 'A Dra. Maria Sousa dedica a sua prática ao Direito de Família, acompanhando com sensibilidade e profissionalismo processos de divórcio, regulação do poder paternal, adoção e partilhas. O seu compromisso com o bem-estar das crianças e famílias que representa é o pilar da sua atuação jurídica.',
                'areas'         => ['Direito de Família', 'Direito de Menores', 'Partilhas', 'Adoção'],
                'idiomas'       => ['Português', 'Inglês'],
            ],
            [
                'id'            => 5,
                'slug'          => 'pedro-nhambe',
                'nome'          => 'Dr. Pedro Nhambe',
                'cargo'         => 'Advogado',
                'especialidade' => 'Direito Laboral',
                'foto'          => base_url('assets/images/equipe/pedro-nhambe.jpg'),
                'linkedin'      => '#',
                'email'         => 'pedro.nhambe@advocacia.co.mz',
                'destaque'      => 0,
                'ordem'         => 5,
                'oab'           => 'OAM/BEI 0132',
                'formacao'      => 'Licenciatura em Direito — Universidade Zambeze, 2015',
                'pos_graduacao' => null,
                'bio'           => 'O Dr. Pedro Nhambe é advogado especializado em Direito Laboral, prestando assessoria jurídica a empresas e trabalhadores em matérias de relações individuais e colectivas de trabalho, rescisões e processos disciplinares.',
                'areas'         => ['Direito Laboral', 'Relações Colectivas', 'Processos Disciplinares'],
                'idiomas'       => ['Português', 'Inglês', 'Sena'],
            ],
            [
                'id'            => 6,
                'slug'          => 'lucia-chongo',
                'nome'          => 'Dra. Lúcia Chongo',
                'cargo'         => 'Advogada',
                'especialidade' => 'Direito Administrativo',
                'foto'          => base_url('assets/images/equipe/lucia-chongo.jpg'),
                'linkedin'      => '#',
                'email'         => 'lucia.chongo@advocacia.co.mz',
                'destaque'      => 0,
                'ordem'         => 6,
                'oab'           => 'OAM/BEI 0149',
                'formacao'      => 'Licenciatura em Direito — Universidade Eduardo Mondlane, 2016',
                'pos_graduacao' => null,
                'bio'           => 'A Dra. Lúcia Chongo actua na área do Direito Administrativo, representando clientes em processos de licenciamento, contratação pública, impugnações administrativas e contencioso fiscal junto das entidades públicas.',
                'areas'         => ['Direito Administrativo', 'Contratação Pública', 'Direito Fiscal'],
                'idiomas'       => ['Português', 'Inglês'],
            ],
        ];
    }

    // ── Lista de membros ─────────────────────────────────
    public function index(): string
    {
        $membros   = $this->getMembros();
        $destaques = array_filter($membros, fn($m) => !empty($m['destaque']));
        $restantes = array_filter($membros, fn($m) => empty($m['destaque']));

        $data = [
            'title'            => 'A Nossa Equipa — Advocacia & Consultoria Jurídica',
            'meta_description' => 'Conheça os advogados do nosso escritório: profissionais experientes e dedicados à sua causa.',
            'page_title'       => 'A Nossa Equipa',
            'page_label'       => 'Profissionais',
            'page_subtitle'    => 'Advogados experientes e dedicados à defesa dos seus direitos.',
            'breadcrumbs'      => [['label' => 'Equipa', 'url' => '']],
            'destaques'        => array_values($destaques),
            'restantes'        => array_values($restantes),
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('equipe/index', $data),
        ]);
    }

    // ── Perfil individual ────────────────────────────────
    public function perfil(string $slug): string
    {
        $membros = $this->getMembros();
        $membro  = null;

        foreach ($membros as $m) {
            if ($m['slug'] === $slug) { $membro = $m; break; }
        }

        if (!$membro) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Membro não encontrado: $slug");
        }

        // Outros membros (excluindo o actual)
        $outros = array_values(array_filter($membros, fn($m) => $m['slug'] !== $slug && !empty($m['destaque'])));

        $data = [
            'title'       => $membro['nome'] . ' — Advocacia & Consultoria Jurídica',
            'page_title'  => $membro['nome'],
            'page_label'  => $membro['cargo'],
            'breadcrumbs' => [
                ['label' => 'Equipa', 'url' => 'equipe'],
                ['label' => $membro['nome'], 'url' => ''],
            ],
            'membro' => $membro,
            'outros' => $outros,
        ];

        return view('templates/frontend/main', $data + [
            'content' => view('equipe/perfil', $data),
        ]);
    }
}