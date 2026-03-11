<?php
/**
 * View: noticias/noticia.php
 * Controller: Noticias::show()
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     CONTEÚDO + SIDEBAR
═══════════════════════════════════════════ -->
<section class="bg-white py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-3 gap-16 items-start">


            <!-- ── ARTIGO ──────────────────────────── -->
            <article class="lg:col-span-2">

                <!-- Imagem de topo -->
                <?php if (!empty($noticia['imagem'])): ?>
                <div style="aspect-ratio:16/9;overflow:hidden;background:#DDD;
                             margin-bottom:2rem;" class="nt-reveal">
                    <img src="<?= esc($noticia['imagem']) ?>"
                         alt="<?= esc($noticia['titulo']) ?>"
                         class="w-full h-full object-cover">
                </div>
                <?php endif; ?>

                <!-- Meta -->
                <div class="flex flex-wrap items-center gap-4 mb-6 nt-reveal"
                     style="transition-delay:0.05s;">
                    <span style="font-family:'Antonio',sans-serif;font-weight:700;
                                  font-size:0.6rem;letter-spacing:0.18em;text-transform:uppercase;
                                  background:#373737;color:#fff;padding:4px 12px;">
                        <?= esc($noticia['categoria']) ?>
                    </span>
                    <span style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.78rem;
                                  color:#bbb;display:flex;align-items:center;gap:5px;">
                        <i class="ph ph-calendar-blank" style="font-size:0.85rem;"></i>
                        <?= date('d \d\e F \d\e Y', strtotime($noticia['created_at'])) ?>
                    </span>
                    <span style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.78rem;
                                  color:#bbb;display:flex;align-items:center;gap:5px;">
                        <i class="ph ph-user" style="font-size:0.85rem;"></i>
                        <?= esc($noticia['autor']) ?>
                    </span>
                </div>

                <!-- Título -->
                <h1 class="nt-reveal" style="transition-delay:0.1s;
                            font-family:'Antonio',sans-serif;font-weight:700;
                            font-size:clamp(1.8rem,4vw,3rem);color:#111;
                            line-height:1.1;margin-bottom:1.5rem;">
                    <?= esc($noticia['titulo']) ?>
                </h1>

                <!-- Linha -->
                <div class="nt-reveal" style="transition-delay:0.15s;
                     width:40px;height:2px;background:#373737;margin-bottom:1.5rem;"></div>

                <!-- Resumo em destaque -->
                <p class="nt-reveal" style="transition-delay:0.18s;
                           font-family:'Antonio',sans-serif;font-weight:400;font-size:1.1rem;
                           color:#555;line-height:1.8;border-left:3px solid #373737;
                           padding-left:1.25rem;margin-bottom:2rem;">
                    <?= esc($noticia['resumo']) ?>
                </p>

                <!-- Conteúdo principal -->
                <div class="nt-conteudo nt-reveal" style="transition-delay:0.2s;">
                    <?= $noticia['conteudo'] ?>
                </div>

                <!-- Partilhar -->
                <div class="nt-reveal" style="transition-delay:0.25s;
                     display:flex;align-items:center;gap:10px;
                     margin-top:2.5rem;padding-top:2rem;border-top:1px solid #EBEBEB;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.68rem;
                               letter-spacing:0.2em;text-transform:uppercase;color:#bbb;">Partilhar:</p>
                    <?php
                    $url  = urlencode(current_url());
                    $text = urlencode($noticia['titulo']);
                    $redes = [
                        ['ph-linkedin-logo', "https://www.linkedin.com/sharing/share-offsite/?url={$url}"],
                        ['ph-facebook-logo', "https://www.facebook.com/sharer/sharer.php?u={$url}"],
                        ['ph-twitter-logo',  "https://twitter.com/intent/tweet?url={$url}&text={$text}"],
                        ['ph-whatsapp-logo', "https://wa.me/?text={$text}%20{$url}"],
                    ];
                    foreach ($redes as [$ico, $link]):
                    ?>
                    <a href="<?= $link ?>" target="_blank"
                       style="width:36px;height:36px;border:1px solid #E5E5E5;display:flex;
                               align-items:center;justify-content:center;color:#777;
                               transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737';this.style.background='#F7F7F7';"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777';this.style.background='#fff';">
                        <i class="ph <?= $ico ?>" style="font-size:1rem;"></i>
                    </a>
                    <?php endforeach; ?>
                </div>

            </article>


            <!-- ── SIDEBAR ─────────────────────────── -->
            <aside class="lg:col-span-1 lg:sticky lg:top-24">

                <!-- Artigos recentes -->
                <?php if (!empty($recentes)): ?>
                <div class="nt-reveal" style="margin-bottom:2rem;">
                    <h4 style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.72rem;
                                letter-spacing:0.2em;text-transform:uppercase;color:#111;
                                margin-bottom:1rem;padding-bottom:0.75rem;
                                border-bottom:2px solid #373737;">
                        Artigos Recentes
                    </h4>
                    <div style="display:flex;flex-direction:column;gap:0;">
                        <?php foreach ($recentes as $r): ?>
                        <a href="<?= base_url('noticias/' . esc($r['slug'])) ?>"
                           style="display:flex;gap:12px;padding:1rem 0;
                                   border-bottom:1px solid #F0F0F0;text-decoration:none;
                                   transition:background 0.2s;"
                           onmouseover="this.style.background='#FAFAFA'"
                           onmouseout="this.style.background='transparent'">
                            <div style="width:70px;height:50px;overflow:hidden;
                                         background:#E0E0E0;flex-shrink:0;">
                                <img src="<?= esc($r['imagem']) ?>" alt="<?= esc($r['titulo']) ?>"
                                     class="w-full h-full object-cover"
                                     onerror="this.style.display='none'">
                            </div>
                            <div>
                                <p style="font-family:'Antonio',sans-serif;font-weight:700;
                                           font-size:0.85rem;color:#111;line-height:1.3;
                                           margin-bottom:4px;"><?= esc(mb_strimwidth($r['titulo'], 0, 55, '...')) ?></p>
                                <p style="font-family:'Antonio',sans-serif;font-weight:400;
                                           font-size:0.68rem;color:#bbb;">
                                    <?= date('d M Y', strtotime($r['created_at'])) ?>
                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- CTA consulta -->
                <div class="nt-reveal" style="background:#373737;padding:2rem;transition-delay:0.1s;">
                    <i class="ph ph-scales" style="font-size:1.5rem;color:rgba(255,255,255,0.4);
                                                    display:block;margin-bottom:1rem;"></i>
                    <h4 style="font-family:'Antonio',sans-serif;font-weight:700;font-size:1.1rem;
                                color:#fff;margin-bottom:0.75rem;line-height:1.2;">
                        Precisa de aconselhamento jurídico?
                    </h4>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.85rem;
                               color:rgba(255,255,255,0.6);line-height:1.6;margin-bottom:1.5rem;">
                        A primeira consulta é gratuita. Fale connosco hoje.
                    </p>
                    <a href="<?= base_url('contact') ?>"
                       style="display:flex;align-items:center;justify-content:center;gap:8px;
                               font-family:'Antonio',sans-serif;font-weight:700;font-size:0.7rem;
                               letter-spacing:0.18em;text-transform:uppercase;
                               background:#fff;color:#373737;padding:0.9rem 1rem;
                               transition:background 0.2s;"
                       onmouseover="this.style.background='#F0F0F0';"
                       onmouseout="this.style.background='#fff';">
                        Consulta Gratuita
                        <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>
                </div>

            </aside>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     ARTIGOS RELACIONADOS
═══════════════════════════════════════════ -->
<?php if (!empty($relacionadas)): ?>
<section class="py-20 border-t border-border" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center justify-between mb-12 nt-reveal">
            <h3 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:1.5rem;color:#111;">Artigos Relacionados</h3>
            <a href="<?= base_url('noticias') ?>"
               style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.7rem;
                       letter-spacing:0.15em;text-transform:uppercase;color:#373737;
                       border-bottom:1px solid #373737;padding-bottom:2px;
                       display:inline-flex;align-items:center;gap:6px;transition:gap 0.2s;"
               onmouseover="this.style.gap='12px'" onmouseout="this.style.gap='6px'">
                Ver Todas <i class="ph ph-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-border">
            <?php foreach ($relacionadas as $idx => $r): ?>
            <article class="bg-white group nt-reveal"
                     style="display:flex;flex-direction:column;transition-delay:<?= $idx*80 ?>ms;">
                <a href="<?= base_url('noticias/' . esc($r['slug'])) ?>"
                   style="display:block;aspect-ratio:16/9;overflow:hidden;background:#DDD;flex-shrink:0;">
                    <img src="<?= esc($r['imagem']) ?>" alt="<?= esc($r['titulo']) ?>"
                         class="w-full h-full object-cover"
                         style="transition:transform 0.55s ease;"
                         onerror="this.style.display='none'">
                </a>
                <div style="padding:1.25rem;flex:1;display:flex;flex-direction:column;">
                    <span style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.58rem;
                                  letter-spacing:0.18em;text-transform:uppercase;background:#373737;
                                  color:#fff;padding:3px 8px;display:inline-block;margin-bottom:0.75rem;">
                        <?= esc($r['categoria']) ?>
                    </span>
                    <h4 style="font-family:'Antonio',sans-serif;font-weight:700;font-size:1rem;
                                color:#111;line-height:1.25;flex:1;margin-bottom:1rem;">
                        <?= esc($r['titulo']) ?>
                    </h4>
                    <a href="<?= base_url('noticias/' . esc($r['slug'])) ?>"
                       style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.65rem;
                               letter-spacing:0.15em;text-transform:uppercase;color:#373737;
                               display:inline-flex;align-items:center;gap:5px;transition:gap 0.2s;"
                       onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='5px'">
                        Ler Artigo <i class="ph ph-arrow-right" style="font-size:0.85rem;"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>


<!-- Estilos do conteúdo editorial -->
<style>
    .nt-conteudo p  {
        font-family:'Antonio',sans-serif;font-weight:400;font-size:1rem;
        color:#555;line-height:1.85;margin-bottom:1.25rem;
    }
    .nt-conteudo h3 {
        font-family:'Antonio',sans-serif;font-weight:700;font-size:1.25rem;
        color:#111;margin:2rem 0 0.75rem;line-height:1.1;
    }
    .nt-conteudo h4 {
        font-family:'Antonio',sans-serif;font-weight:700;font-size:1.05rem;
        color:#111;margin:1.5rem 0 0.6rem;
    }
    .nt-conteudo ul, .nt-conteudo ol {
        padding-left:1.5rem;margin-bottom:1.25rem;
    }
    .nt-conteudo li {
        font-family:'Antonio',sans-serif;font-weight:400;font-size:1rem;
        color:#555;line-height:1.8;margin-bottom:0.4rem;
    }
    .nt-conteudo strong { font-weight:700;color:#333; }

    article:hover img { transform:scale(1.04) !important; }

    .nt-reveal {
        opacity:0;transform:translateY(20px);
        transition:opacity 0.55s ease,transform 0.55s ease;
    }
    .nt-reveal.visible { opacity:1;transform:translateY(0); }
</style>
<script>
(function(){
    const els = document.querySelectorAll('.nt-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach((e,i) => {
            if(e.isIntersecting){
                setTimeout(() => e.target.classList.add('visible'), i * 60);
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.08 });
    els.forEach(el => obs.observe(el));
})();
</script>