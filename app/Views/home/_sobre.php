<?php
/**
 * Parcial: home/_sobre.php
 * Dados: estáticos (sem model — conteúdo institucional)
 * Chamada: view('home/_sobre')
 *
 * Layout: duas colunas assimétricas
 *   Esq → bloco escuro com número grande + imagem sobreposta
 *   Dir → texto, valores, CTA
 */
?>

<!-- ═══════════════════════════════════════════
     SOBRE NÓS
═══════════════════════════════════════════ -->
<section id="sobre" class="relative bg-white overflow-hidden py-24 lg:py-36">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-0 items-stretch">


            <!-- ── COLUNA ESQUERDA — visual ─────────── -->
            <div class="relative flex flex-col lg:pr-16">

                <!-- Bloco de fundo escuro deslocado -->
                <div class="absolute top-0 left-0 w-4/5 h-full bg-brand hidden lg:block"
                     style="z-index:0;"></div>

                <!-- Número decorativo grande -->
                <div class="absolute top-6 left-6 z-10 hidden lg:block"
                     style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:9rem; line-height:1; color:rgba(255,255,255,0.06);
                            user-select:none; pointer-events:none;">
                    15
                </div>

                <!-- Imagem principal -->
                <div class="relative z-10 lg:mt-10 lg:ml-10 lg:mb-10"
                     style="aspect-ratio: 4/5; overflow:hidden; background:#555;">
                    <img src="<?= base_url('assets/images/sobre.avif') ?>"
                         alt="Escritório de advocacia"
                         class="w-full h-full object-cover"
                         onerror="this.style.display='none'">
                    <!-- Overlay sutil no fundo da imagem -->
                    <div class="absolute inset-0"
                         style="background:linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 50%);"></div>
                </div>

                <!-- Card flutuante — anos de experiência -->
                <div class="absolute bottom-0 right-4 lg:right-0 z-20 bg-white p-6 shadow-xl"
                     style="min-width:160px;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:3rem; color:#373737; line-height:1;">
                        15<span style="font-size:1.5rem; color:#aaa;">+</span>
                    </p>
                    <div style="width:28px; height:2px; background:#373737; margin:10px 0 8px;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.65rem; letter-spacing:0.2em;
                               text-transform:uppercase; color:#999;">
                        Anos de<br>Experiência
                    </p>
                </div>

            </div>


            <!-- ── COLUNA DIREITA — conteúdo ────────── -->
            <div class="flex flex-col justify-center pt-12 lg:pt-0 lg:pl-16">

                <!-- Etiqueta -->
                <div class="flex items-center gap-3 mb-5 sobre-reveal">
                    <div style="width:28px; height:1px; background:#373737;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.68rem; letter-spacing:0.3em;
                               text-transform:uppercase; color:#999;">
                        Sobre Nós
                    </p>
                </div>

                <!-- Título -->
                <h2 class="sobre-reveal"
                    style="font-family:'Antonio',sans-serif; font-weight:700;
                           font-size:clamp(2.2rem, 4vw, 3.4rem);
                           line-height:1.0; letter-spacing:-0.02em; color:#111;">
                    Experiência ao<br>serviço da Justiça
                </h2>

                <!-- Linha decorativa -->
                <div class="sobre-reveal"
                     style="width:40px; height:2px; background:#373737;
                            margin:1.5rem 0;"></div>

                <!-- Parágrafos -->
                <p class="sobre-reveal"
                   style="font-family:'Antonio',sans-serif; font-weight:400;
                          font-size:1rem; color:#666; line-height:1.8; margin-bottom:1rem;">
                    Fundado em 2009, o nosso escritório construiu uma reputação sólida
                    assente na confiança, competência técnica e dedicação absoluta a cada
                    cliente que nos procura.
                </p>
                <p class="sobre-reveal"
                   style="font-family:'Antonio',sans-serif; font-weight:400;
                          font-size:1rem; color:#666; line-height:1.8;">
                    A nossa equipa multidisciplinar actua nas mais diversas áreas do direito,
                    garantindo sempre uma abordagem personalizada, estratégica e eficaz
                    para cada caso.
                </p>

                <!-- Valores / pilares -->
                <div class="grid grid-cols-2 gap-x-6 gap-y-4 mt-10 mb-10 sobre-reveal">
                    <?php
                    $valores = [
                        ['ph-shield-check',     'Ética Profissional'],
                        ['ph-handshake',        'Confiança'],
                        ['ph-magnifying-glass', 'Rigor Técnico'],
                        ['ph-clock',            'Disponibilidade'],
                    ];
                    foreach ($valores as [$icon, $label]):
                    ?>
                    <div style="display:flex; align-items:center; gap:10px;
                                 padding:10px 0; border-bottom:1px solid #F0F0F0;">
                        <div style="width:32px; height:32px; background:#F7F7F7;
                                     display:flex; align-items:center; justify-content:center;
                                     flex-shrink:0;">
                            <i class="ph <?= $icon ?>"
                               style="font-size:1rem; color:#373737;"></i>
                        </div>
                        <span style="font-family:'Antonio',sans-serif; font-weight:400;
                                      font-size:0.88rem; color:#444;">
                            <?= $label ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Stats em linha -->
                <div class="flex items-center gap-8 pt-8 mb-10 sobre-reveal"
                     style="border-top:1px solid #EBEBEB;">
                    <?php
                    $stats = [
                        ['800+', 'Casos Resolvidos'],
                        ['98%',  'Satisfação'],
                        ['12',   'Advogados'],
                    ];
                    foreach ($stats as [$num, $label]):
                    ?>
                    <div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:1.9rem; color:#111; line-height:1;">
                            <?= $num ?>
                        </p>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.65rem; letter-spacing:0.15em;
                                   text-transform:uppercase; color:#aaa; margin-top:4px;">
                            <?= $label ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- CTA -->
                <div class="flex items-center gap-5 sobre-reveal">
                    <a href="<?= base_url('about') ?>"
                       class="sobre-cta-solid"
                       style="display:inline-flex; align-items:center; gap:10px;
                               font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                               background:#373737; color:#fff; padding:1rem 2rem;
                               transition:background 0.2s;">
                        Conhecer o Escritório
                        <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
                    </a>

                    <a href="<?= base_url('equipe') ?>"
                       class="sobre-cta-link"
                       style="display:inline-flex; align-items:center; gap:8px;
                               font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                               color:#373737; border-bottom:1px solid #373737;
                               padding-bottom:2px; transition:gap 0.2s;">
                        Ver Equipa
                        <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>
                </div>

            </div>
            <!-- fim coluna direita -->

        </div>
    </div>

</section>


<!-- ── Estilos e animações ───────────────────── -->
<style>
    .sobre-cta-solid:hover { background: #111 !important; }
    .sobre-cta-link:hover  { gap: 14px !important; }

    /* Reveal ao fazer scroll */
    .sobre-reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .sobre-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const items = document.querySelectorAll('#sobre .sobre-reveal');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                // Atraso em cascata para cada elemento
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, idx * 80);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    items.forEach(el => observer.observe(el));
})();
</script>