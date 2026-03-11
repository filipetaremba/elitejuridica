<?php
/**
 * View: noticias/index.php
 * Controller: Noticias::index()
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     1. DESTAQUES — HERO CARDS
═══════════════════════════════════════════ -->
<?php if (!empty($destaques)): ?>
<section class="bg-white py-16 border-b border-border">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-12 nt-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px;height:1px;background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                           letter-spacing:0.3em;text-transform:uppercase;color:#999;">Em Destaque</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem);color:#111;line-height:1.0;">
                Notícias Recentes
            </h2>
            <div style="width:40px;height:2px;background:#373737;margin-top:1.25rem;"></div>
        </div>

        <!-- Card grande + cards pequenos -->
        <div class="grid lg:grid-cols-2 gap-px bg-border">

            <!-- Card principal (primeiro destaque) -->
            <?php $principal = $destaques[0]; ?>
            <div class="bg-white group nt-reveal">
                <a href="<?= base_url('noticias/' . esc($principal['slug'])) ?>"
                   style="display:block;aspect-ratio:16/9;overflow:hidden;background:#DDD;position:relative;">
                    <img src="<?= esc($principal['imagem']) ?>"
                         alt="<?= esc($principal['titulo']) ?>"
                         class="w-full h-full object-cover"
                         style="transition:transform 0.55s ease;"
                         onerror="this.style.display='none'">
                    <div class="absolute inset-0 flex items-end"
                         style="background:linear-gradient(to top,rgba(0,0,0,0.5) 0%,transparent 60%);
                                padding:1.25rem;">
                        <span style="font-family:'Antonio',sans-serif;font-weight:700;
                                      font-size:0.6rem;letter-spacing:0.18em;text-transform:uppercase;
                                      background:#fff;color:#373737;padding:4px 10px;">
                            <?= esc($principal['categoria']) ?>
                        </span>
                    </div>
                </a>
                <div style="padding:1.75rem;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                               letter-spacing:0.15em;text-transform:uppercase;color:#bbb;
                               margin-bottom:0.75rem;display:flex;align-items:center;gap:6px;">
                        <i class="ph ph-calendar-blank" style="font-size:0.8rem;"></i>
                        <?= date('d M Y', strtotime($principal['created_at'])) ?>
                        <span style="color:#E0E0E0;">·</span>
                        <i class="ph ph-user" style="font-size:0.8rem;"></i>
                        <?= esc($principal['autor']) ?>
                    </p>
                    <h3 style="font-family:'Antonio',sans-serif;font-weight:700;
                                font-size:1.4rem;color:#111;line-height:1.2;margin-bottom:0.75rem;">
                        <?= esc($principal['titulo']) ?>
                    </h3>
                    <div style="width:0;height:2px;background:#373737;margin-bottom:0.85rem;
                                 transition:width 0.35s ease;" class="nt-linha"></div>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.92rem;
                               color:#777;line-height:1.75;margin-bottom:1.5rem;">
                        <?= esc($principal['resumo']) ?>
                    </p>
                    <a href="<?= base_url('noticias/' . esc($principal['slug'])) ?>"
                       class="nt-ler"
                       style="display:inline-flex;align-items:center;gap:8px;
                               font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:0.7rem;letter-spacing:0.18em;text-transform:uppercase;
                               color:#373737;border-bottom:1px solid #373737;padding-bottom:2px;
                               transition:gap 0.2s;">
                        Ler Artigo <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>
                </div>
            </div>

            <!-- Cards secundários (restantes destaques) -->
            <div class="flex flex-col gap-px bg-border">
                <?php foreach (array_slice($destaques, 1) as $idx => $n): ?>
                <div class="bg-white group nt-reveal flex"
                     style="transition-delay:<?= ($idx+1)*80 ?>ms;">
                    <a href="<?= base_url('noticias/' . esc($n['slug'])) ?>"
                       style="width:140px;flex-shrink:0;overflow:hidden;background:#DDD;display:block;">
                        <img src="<?= esc($n['imagem']) ?>" alt="<?= esc($n['titulo']) ?>"
                             class="w-full h-full object-cover"
                             style="transition:transform 0.55s ease;"
                             onerror="this.style.display='none'">
                    </a>
                    <div style="padding:1.25rem;flex:1;display:flex;flex-direction:column;justify-content:center;">
                        <span style="font-family:'Antonio',sans-serif;font-weight:700;
                                      font-size:0.58rem;letter-spacing:0.18em;text-transform:uppercase;
                                      background:#373737;color:#fff;padding:3px 8px;
                                      display:inline-block;margin-bottom:0.6rem;">
                            <?= esc($n['categoria']) ?>
                        </span>
                        <h4 style="font-family:'Antonio',sans-serif;font-weight:700;
                                    font-size:0.95rem;color:#111;line-height:1.25;
                                    margin-bottom:0.5rem;"><?= esc($n['titulo']) ?></h4>
                        <p style="font-family:'Antonio',sans-serif;font-weight:400;
                                   font-size:0.78rem;color:#999;">
                            <?= date('d M Y', strtotime($n['created_at'])) ?>
                        </p>
                        <a href="<?= base_url('noticias/' . esc($n['slug'])) ?>"
                           style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.65rem;
                                   letter-spacing:0.15em;text-transform:uppercase;color:#373737;
                                   margin-top:0.75rem;display:inline-flex;align-items:center;
                                   gap:5px;transition:gap 0.2s;"
                           onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='5px'">
                            Ler <i class="ph ph-arrow-right" style="font-size:0.8rem;"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     2. TODAS AS NOTÍCIAS — GRID
═══════════════════════════════════════════ -->
<?php if (!empty($restantes)): ?>
<section class="py-24" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-14 nt-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px;height:1px;background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                           letter-spacing:0.3em;text-transform:uppercase;color:#999;">Arquivo</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:clamp(2rem,3.5vw,2.5rem);color:#111;line-height:1.0;">
                Mais Artigos
            </h2>
            <div style="width:40px;height:2px;background:#373737;margin-top:1.25rem;"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-border">
            <?php foreach ($restantes as $idx => $n): ?>
            <article class="bg-white group nt-reveal"
                     style="display:flex;flex-direction:column;transition-delay:<?= ($idx%3)*80 ?>ms;">

                <a href="<?= base_url('noticias/' . esc($n['slug'])) ?>"
                   style="display:block;aspect-ratio:16/9;overflow:hidden;background:#DDD;position:relative;flex-shrink:0;">
                    <img src="<?= esc($n['imagem']) ?>" alt="<?= esc($n['titulo']) ?>"
                         class="w-full h-full object-cover nt-img"
                         style="transition:transform 0.55s ease;" onerror="this.style.display='none'">
                    <div style="position:absolute;top:1rem;left:1rem;">
                        <span style="font-family:'Antonio',sans-serif;font-weight:700;
                                      font-size:0.58rem;letter-spacing:0.18em;text-transform:uppercase;
                                      background:#373737;color:#fff;padding:4px 10px;">
                            <?= esc($n['categoria']) ?>
                        </span>
                    </div>
                </a>

                <div style="padding:1.5rem;display:flex;flex-direction:column;flex:1;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                               letter-spacing:0.15em;text-transform:uppercase;color:#bbb;
                               margin-bottom:0.75rem;display:flex;align-items:center;gap:6px;">
                        <i class="ph ph-calendar-blank" style="font-size:0.8rem;"></i>
                        <?= date('d M Y', strtotime($n['created_at'])) ?>
                    </p>
                    <h3 style="font-family:'Antonio',sans-serif;font-weight:700;
                                font-size:1.05rem;color:#111;line-height:1.25;
                                margin-bottom:0.75rem;transition:color 0.2s;" class="nt-titulo">
                        <?= esc($n['titulo']) ?>
                    </h3>
                    <div style="width:0;height:2px;background:#373737;margin-bottom:0.85rem;
                                 transition:width 0.35s ease;" class="nt-linha"></div>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.88rem;color:#777;line-height:1.75;flex:1;">
                        <?= esc(mb_strimwidth($n['resumo'], 0, 110, '...')) ?>
                    </p>
                    <a href="<?= base_url('noticias/' . esc($n['slug'])) ?>"
                       class="nt-ler"
                       style="display:inline-flex;align-items:center;gap:6px;
                               margin-top:1.5rem;padding-top:1.25rem;
                               border-top:1px solid #EBEBEB;
                               font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:0.68rem;letter-spacing:0.18em;text-transform:uppercase;
                               color:#373737;transition:gap 0.2s;">
                        Ler Artigo <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>
                </div>

            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>


<style>
    .nt-ler:hover  { gap:12px !important; }
    .nt-card:hover .nt-linha  { width:40px !important; }
    .nt-card:hover .nt-titulo { color:#373737 !important; }
    .nt-card:hover .nt-img    { transform:scale(1.04) !important; }
    article:hover .nt-linha   { width:40px !important; }
    article:hover .nt-titulo  { color:#373737 !important; }
    article:hover .nt-img     { transform:scale(1.04) !important; }
    .group:hover .nt-linha    { width:40px !important; }

    .nt-reveal {
        opacity:0; transform:translateY(20px);
        transition:opacity 0.55s ease, transform 0.55s ease;
    }
    .nt-reveal.visible { opacity:1; transform:translateY(0); }
</style>
<script>
(function(){
    const els = document.querySelectorAll('.nt-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>