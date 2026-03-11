<?php
/**
 * Parcial: home/_noticias.php
 * Dados esperados: $noticias (array — últimas 3, orderBy created_at DESC)
 * Chamada: view('home/_noticias', $noticias_data)
 */

// Fallback enquanto o model não tem registos
$exemplo = [
    [
        'slug'       => 'nova-lei-trabalho-2024',
        'categoria'  => 'Direito Laboral',
        'titulo'     => 'Alterações à Lei do Trabalho: o que muda em 2024',
        'resumo'     => 'As recentes alterações legislativas trazem novas obrigações para empregadores e reforçam os direitos dos trabalhadores em Moçambique.',
        'imagem'     => 'https://media.gettyimages.com/id/104821087/pt/foto/advogado-segurando-o-documento-e-falar-com-j%C3%BAri-em-sala-de-tribunal.jpg?s=612x612&w=0&k=20&c=6ljf3o3N5E3dsiVjq--xwrJTZcHTuGUnEatow9OVh9s=',
        'created_at' => '2024-11-10 09:00:00',
    ],
    [
        'slug'       => 'constituicao-empresas-guia',
        'categoria'  => 'Direito Empresarial',
        'titulo'     => 'Guia prático para constituição de empresas em Moçambique',
        'resumo'     => 'Conheça todos os passos legais, documentação necessária e prazos para registar a sua empresa de forma rápida e segura.',
        'imagem'     => 'https://media.gettyimages.com/id/1502896521/pt/foto/business-meeting-documents-and-people-clients-or-partner-discussion-of-finance-loan-and.jpg?s=612x612&w=0&k=20&c=f0q8vsjHThbVdlDtJxY53rfp_ps-X2aNzywi3-7LUo8=',
        'created_at' => '2024-10-28 14:30:00',
    ],
    [
        'slug'       => 'direitos-consumidor',
        'categoria'  => 'Direito Civil',
        'titulo'     => 'Direitos do consumidor: como reclamar e ser ressarcido',
        'resumo'     => 'Muitos cidadãos desconhecem os seus direitos face a produtos defeituosos ou serviços prestados de forma inadequada.',
        'imagem'     => 'https://media.gettyimages.com/id/1477043851/pt/foto/business-meeting-speaking-and-black-man-with-discussion-planning-and-corporate-proposal-staff.jpg?s=612x612&w=0&k=20&c=to3tnOG6e1aKAzlj33Mi06l8KHTByD5stcZEOGdZ_Wk=',
        'created_at' => '2024-10-15 10:00:00',
    ],[
        'slug'       => 'direitos-consumidor',
        'categoria'  => 'Direito Civil',
        'titulo'     => 'Direitos do consumidor: como reclamar e ser ressarcido',
        'resumo'     => 'Muitos cidadãos desconhecem os seus direitos face a produtos defeituosos ou serviços prestados de forma inadequada.',
        'imagem'     => 'https://media.gettyimages.com/id/1462983023/pt/foto/office-communication-negotiation-proposal-and-business-people-discussion-for-investment-deal.jpg?s=612x612&w=0&k=20&c=4VjfaFQdDiV9DwTll3c7tFfNcy1ABNW5BK45cYsnx6I=',
        'created_at' => '2024-10-15 10:00:00',
    ],
];

$lista = !empty($noticias) ? $noticias : $exemplo;
?>

<!-- ═══════════════════════════════════════════
     NOTÍCIAS
═══════════════════════════════════════════ -->
<section id="noticias" class="py-24 lg:py-36 overflow-hidden" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- ── Cabeçalho ──────────────────────── -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16 nt-reveal">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:28px; height:1px; background:#373737;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.68rem; letter-spacing:0.3em;
                               text-transform:uppercase; color:#999;">
                        Jurídico & Actualidade
                    </p>
                </div>
                <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:clamp(2.2rem,4vw,3.4rem);
                            line-height:1.0; letter-spacing:-0.02em; color:#111;">
                    Últimas Notícias
                </h2>
                <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
            </div>

            <a href="<?= base_url('noticias') ?>"
               class="nt-link"
               style="display:inline-flex; align-items:center; gap:8px;
                       font-family:'Antonio',sans-serif; font-weight:400;
                       font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                       color:#373737; border-bottom:1px solid #373737;
                       padding-bottom:2px; white-space:nowrap; transition:gap 0.2s;">
                Ver Todas as Notícias
                <i class="ph ph-arrow-right" style="font-size:0.95rem;"></i>
            </a>

        </div>

        <!-- ── Grid ───────────────────────────── -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-px bg-border">

            <?php foreach ($lista as $idx => $noticia):
                $data_fmt = date('d M Y', strtotime($noticia['created_at']));
            ?>

            <article class="nt-card bg-white group nt-reveal"
                     style="transition-delay:<?= $idx * 100 ?>ms;
                            display:flex; flex-direction:column;">

                <!-- Imagem -->
                <div style="aspect-ratio:16/9; overflow:hidden;
                             background:#E0E0E0; position:relative; flex-shrink:0;">

                    <?php if (!empty($noticia['imagem'])): ?>
                        <img src="<?= esc($noticia['imagem']) ?>"
                             alt="<?= esc($noticia['titulo']) ?>"
                             class="w-full h-full object-cover nt-img"
                             style="transition:transform 0.55s ease;">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center"
                             style="background:<?= ['#CECECE','#C2C2C2','#D2D2D2'][$idx % 3] ?>;">
                            <i class="ph ph-newspaper"
                               style="font-size:2.5rem; color:rgba(255,255,255,0.4);"></i>
                        </div>
                    <?php endif; ?>

                    <!-- Categoria -->
                    <div style="position:absolute; top:1rem; left:1rem;">
                        <span style="font-family:'Antonio',sans-serif; font-weight:700;
                                      font-size:0.6rem; letter-spacing:0.18em;
                                      text-transform:uppercase; background:#373737;
                                      color:#fff; padding:4px 10px; display:inline-block;">
                            <?= esc($noticia['categoria'] ?? 'Notícia') ?>
                        </span>
                    </div>

                </div>

                <!-- Corpo -->
                <div style="padding:1.5rem; display:flex; flex-direction:column; flex:1;">

                    <!-- Data -->
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.68rem; letter-spacing:0.15em; text-transform:uppercase;
                               color:#bbb; margin-bottom:0.75rem;
                               display:flex; align-items:center; gap:6px;">
                        <i class="ph ph-calendar-blank" style="font-size:0.8rem;"></i>
                        <?= $data_fmt ?>
                    </p>

                    <!-- Título -->
                    <h3 class="nt-titulo"
                        style="font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:1.1rem; color:#111; line-height:1.25;
                                margin-bottom:0.75rem; transition:color 0.2s;">
                        <?= esc($noticia['titulo']) ?>
                    </h3>

                    <!-- Linha que expande no hover -->
                    <div class="nt-linha"
                         style="width:0; height:2px; background:#373737;
                                margin-bottom:0.85rem; transition:width 0.35s ease;">
                    </div>

                    <!-- Resumo -->
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.88rem; color:#777; line-height:1.75; flex:1;">
                        <?= esc(mb_strimwidth($noticia['resumo'] ?? '', 0, 115, '...')) ?>
                    </p>

                    <!-- Ler mais -->
                    <a href="<?= base_url('noticias/' . esc($noticia['slug'])) ?>"
                       class="nt-ler"
                       style="display:inline-flex; align-items:center; gap:6px;
                               margin-top:1.5rem; padding-top:1.25rem;
                               border-top:1px solid #EBEBEB;
                               font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:0.68rem; letter-spacing:0.18em; text-transform:uppercase;
                               color:#373737; transition:gap 0.2s;">
                        Ler Artigo
                        <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>

                </div>

            </article>

            <?php endforeach; ?>

        </div>

    </div>
</section>

<style>
    .nt-link:hover  { gap: 14px !important; }
    .nt-ler:hover   { gap: 12px !important; }

    .nt-card:hover .nt-linha  { width: 40px !important; }
    .nt-card:hover .nt-titulo { color: #373737 !important; }
    .nt-card:hover .nt-img    { transform: scale(1.04) !important; }

    .nt-reveal {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .nt-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const els = document.querySelectorAll('#noticias .nt-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>