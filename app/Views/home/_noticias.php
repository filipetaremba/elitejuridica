<?php
/**
 * Parcial: home/_noticias.php
 * Dados esperados: $noticias (array — últimas 3 notícias publicadas)
 * Chamada: view('home/_noticias', ['noticias' => $noticias])
 */

// Helper — formata data para pt-PT
function fmt_data(string $data): string {
    $meses = [
        '01'=>'Jan','02'=>'Fev','03'=>'Mar','04'=>'Abr',
        '05'=>'Mai','06'=>'Jun','07'=>'Jul','08'=>'Ago',
        '09'=>'Set','10'=>'Out','11'=>'Nov','12'=>'Dez',
    ];
    $ts = strtotime($data);
    if (!$ts) return $data;
    return date('d', $ts) . ' ' . ($meses[date('m', $ts)] ?? '') . ' ' . date('Y', $ts);
}
?>

<!-- ═══════════════════════════════════════════
     NOTÍCIAS
═══════════════════════════════════════════ -->
<section id="noticias" class="bg-[#F7F7F5] py-24 lg:py-36 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- ── Cabeçalho ─────────────────────── -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16 nt-reveal">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:28px; height:1px; background:#373737;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.68rem; letter-spacing:0.3em;
                               text-transform:uppercase; color:#999;">
                        Actualidade
                    </p>
                </div>
                <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:clamp(2.2rem,4vw,3.4rem);
                            line-height:1.0; letter-spacing:-0.02em; color:#111;">
                    Notícias & Artigos
                </h2>
                <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
            </div>

            <a href="<?= base_url('noticias') ?>"
               class="nt-cta-link"
               style="display:inline-flex; align-items:center; gap:8px;
                       font-family:'Antonio',sans-serif; font-weight:400;
                       font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                       color:#373737; border-bottom:1px solid #373737;
                       padding-bottom:2px; white-space:nowrap; transition:gap 0.2s;">
                Ver Todas as Notícias
                <i class="ph ph-arrow-right" style="font-size:0.95rem;"></i>
            </a>

        </div>

        <!-- ── Grid de notícias ──────────────── -->
        <?php if (!empty($noticias)): ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($noticias as $idx => $noticia): ?>

            <article class="nt-card nt-reveal bg-white"
                     style="transition-delay: <?= $idx * 100 ?>ms;">

                <!-- Imagem -->
                <?php if (!empty($noticia['imagem'])): ?>
                <a href="<?= base_url('noticias/' . esc($noticia['slug'])) ?>"
                   style="display:block; aspect-ratio:16/9; overflow:hidden; background:#E8E8E8;">
                    <img src="<?= esc($noticia['imagem']) ?>"
                         alt="<?= esc($noticia['titulo']) ?>"
                         class="w-full h-full object-cover"
                         style="transition:transform 0.6s ease;">
                </a>
                <?php else: ?>
                <a href="<?= base_url('noticias/' . esc($noticia['slug'])) ?>"
                   style="display:flex; align-items:center; justify-content:center;
                           aspect-ratio:16/9; background:#E8E8E8;">
                    <i class="ph ph-newspaper" style="font-size:2.5rem; color:#ccc;"></i>
                </a>
                <?php endif; ?>

                <!-- Corpo -->
                <div style="padding:1.5rem 1.5rem 1.75rem;">

                    <!-- Categoria + Data -->
                    <div style="display:flex; align-items:center; justify-content:space-between;
                                 gap:8px; margin-bottom:0.75rem;">
                        <?php if (!empty($noticia['categoria'])): ?>
                        <span style="font-family:'Antonio',sans-serif; font-weight:400;
                                      font-size:0.62rem; letter-spacing:0.22em;
                                      text-transform:uppercase; color:#fff;
                                      background:#373737; padding:3px 10px;">
                            <?= esc($noticia['categoria']) ?>
                        </span>
                        <?php else: ?>
                        <span></span>
                        <?php endif; ?>

                        <time style="font-family:'Antonio',sans-serif; font-size:0.72rem; color:#bbb;">
                            <?= esc(fmt_data($noticia['publicado_em'] ?? $noticia['created_at'] ?? '')) ?>
                        </time>
                    </div>

                    <!-- Título -->
                    <h3 style="font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:1.1rem; line-height:1.25;
                                color:#111; margin-bottom:0.6rem;">
                        <a href="<?= base_url('noticias/' . esc($noticia['slug'])) ?>"
                           class="nt-titulo-link"
                           style="color:inherit; text-decoration:none; transition:color 0.2s;">
                            <?= esc($noticia['titulo']) ?>
                        </a>
                    </h3>

                    <!-- Resumo -->
                    <?php if (!empty($noticia['resumo'])): ?>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.88rem; color:#777; line-height:1.65;
                               margin-bottom:1.1rem;
                               display:-webkit-box; -webkit-line-clamp:3;
                               -webkit-box-orient:vertical; overflow:hidden;">
                        <?= esc($noticia['resumo']) ?>
                    </p>
                    <?php endif; ?>

                    <!-- Ler mais -->
                    <a href="<?= base_url('noticias/' . esc($noticia['slug'])) ?>"
                       class="nt-ler-mais"
                       style="display:inline-flex; align-items:center; gap:6px;
                               font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.7rem; letter-spacing:0.18em; text-transform:uppercase;
                               color:#373737; border-bottom:1px solid #373737;
                               padding-bottom:1px; transition:gap 0.2s;">
                        Ler Artigo
                        <i class="ph ph-arrow-right" style="font-size:0.85rem;"></i>
                    </a>

                </div>
            </article>

            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <!-- Fallback — sem notícias publicadas -->
        <div style="text-align:center; padding:4rem 0;">
            <i class="ph ph-newspaper" style="font-size:3rem; color:#ccc; display:block; margin-bottom:1rem;"></i>
            <p style="font-family:'Antonio',sans-serif; font-size:1rem; color:#999;">
                Ainda não existem notícias publicadas.
            </p>
        </div>
        <?php endif; ?>

    </div>
</section>

<style>
    .nt-cta-link:hover,
    .nt-ler-mais:hover { gap: 14px !important; }

    .nt-card { transition: box-shadow 0.3s ease; }
    .nt-card:hover { box-shadow: 0 8px 32px rgba(0,0,0,0.08); }
    .nt-card:hover img { transform: scale(1.04); }
    .nt-titulo-link:hover { color: #555 !important; }

    .nt-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .nt-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function(){
    const els = document.querySelectorAll('#noticias .nt-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    els.forEach(el => obs.observe(el));
})();
</script>