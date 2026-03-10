<?php
/**
 * View: home/index.php
 * Extende: templates/frontend/main.php via $content
 * Secção: Banner / Hero Slider
 */

$slides = [
    [
        'image'    => base_url('assets/images/banner1.jpeg'),
        'label'    => 'Direito Civil & Empresarial',
        'titulo'   => 'Defendemos os seus Direitos com Rigor e Ética',
        'subtitulo'=> 'Consultoria jurídica especializada para particulares e empresas.',
        'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('servicos')],
    ],
    [
        'image'    => base_url('assets/images/banner2.webp'),
        'label'    => 'Direito Penal',
        'titulo'   => 'Protecção Jurídica Quando Mais Precisa',
        'subtitulo'=> 'Representação sólida e estratégica em todos os tribunais.',
        'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('servicos')],
    ],
    [
        'image'    => base_url('assets/images/banner-3.jpg'),
        'label'    => 'Direito de Família',
        'titulo'   => 'Soluções Humanas para Questões Complexas',
        'subtitulo'=> 'Acompanhamento sensível e eficaz em processos familiares.',
        'cta'      => ['texto' => 'Saber Mais', 'url' => base_url('about')],
    ],
];
?>

<!-- ═══════════════════════════════════════════════
     BANNER / HERO SLIDER
═══════════════════════════════════════════════ -->
<section id="hero-slider"
         class="relative w-full overflow-hidden"
         style="height: calc(100vh - 64px); min-height: 560px;">

    <!-- ── Slides ────────────────────────────── -->
    <?php foreach ($slides as $i => $slide): ?>
    <div class="slide absolute inset-0 transition-opacity duration-700"
         style="opacity: <?= $i === 0 ? '1' : '0' ?>; z-index: <?= $i === 0 ? '2' : '1' ?>;"
         data-index="<?= $i ?>">

        <!-- Imagem de fundo -->
        <div class="absolute inset-0">
            <img src="<?= $slide['image'] ?>"
                 alt="<?= esc($slide['titulo']) ?>"
                 class="w-full h-full object-cover"
                 onerror="this.style.display='none'">
            <!-- Overlay escuro gradiente -->
            <div class="absolute inset-0"
                 style="background: linear-gradient(
                     to right,
                     rgba(0,0,0,0.75) 0%,
                     rgba(0,0,0,0.45) 55%,
                     rgba(0,0,0,0.15) 100%
                 );"></div>
        </div>

        <!-- Conteúdo do slide -->
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">
                <div class="max-w-2xl">

                    <!-- Label / área -->
                    <div class="flex items-center gap-3 mb-6 slide-content"
                         style="animation-delay: 0.1s;">
                        <div style="width: 32px; height: 1px; background: #fff;"></div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.68rem; letter-spacing:0.3em;
                                   text-transform:uppercase; color:rgba(255,255,255,0.75);">
                            <?= esc($slide['label']) ?>
                        </p>
                    </div>

                    <!-- Título principal -->
                    <h1 class="slide-content"
                        style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size: clamp(2.4rem, 5.5vw, 4.5rem);
                               line-height: 1.0; letter-spacing:-0.02em;
                               color:#ffffff; animation-delay: 0.2s;">
                        <?= esc($slide['titulo']) ?>
                    </h1>

                    <!-- Linha decorativa -->
                    <div class="slide-content"
                         style="width:48px; height:2px; background:#fff;
                                margin: 1.5rem 0; animation-delay: 0.3s;"></div>

                    <!-- Subtítulo -->
                    <p class="slide-content"
                       style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:1.05rem; color:rgba(255,255,255,0.7);
                               line-height:1.7; max-width:480px; animation-delay: 0.35s;">
                        <?= esc($slide['subtitulo']) ?>
                    </p>

                    <!-- CTA -->
                    <div class="slide-content" style="margin-top: 2.5rem; animation-delay: 0.45s;">
                        <a href="<?= $slide['cta']['url'] ?>"
                           style="display:inline-flex; align-items:center; gap:12px;
                                   font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:0.72rem; letter-spacing:0.2em; text-transform:uppercase;
                                   background:#ffffff; color:#373737;
                                   padding:1rem 2rem; transition:all 0.2s;"
                           onmouseover="this.style.background='#373737'; this.style.color='#fff';"
                           onmouseout="this.style.background='#ffffff'; this.style.color='#373737';">
                            <?= esc($slide['cta']['texto']) ?>
                            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php endforeach; ?>


    <!-- ── Navegação quadrada (canto inferior direito) ── -->
    <div class="absolute bottom-10 right-6 lg:right-10 z-20 flex items-center gap-2">

        <!-- Botão anterior -->
        <button id="btn-prev"
                aria-label="Slide anterior"
                style="width:42px; height:42px; border:1px solid rgba(255,255,255,0.4);
                       background:transparent; color:#fff; display:flex; align-items:center;
                       justify-content:center; cursor:pointer; transition:all 0.2s; flex-shrink:0;"
                onmouseover="this.style.background='rgba(255,255,255,0.15)'"
                onmouseout="this.style.background='transparent'">
            <i class="ph ph-arrow-left" style="font-size:1rem;"></i>
        </button>

        <!-- Indicadores quadrados -->
        <div id="slide-indicators" class="flex items-center gap-1.5">
            <?php foreach ($slides as $i => $slide): ?>
            <button class="indicator"
                    data-goto="<?= $i ?>"
                    aria-label="Ir para slide <?= $i + 1 ?>"
                    style="width:<?= $i === 0 ? '28px' : '10px' ?>; height:10px;
                           background:<?= $i === 0 ? '#ffffff' : 'rgba(255,255,255,0.35)' ?>;
                           border:none; cursor:pointer;
                           transition:all 0.3s ease; padding:0; flex-shrink:0;">
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Botão próximo -->
        <button id="btn-next"
                aria-label="Próximo slide"
                style="width:42px; height:42px; border:1px solid rgba(255,255,255,0.4);
                       background:transparent; color:#fff; display:flex; align-items:center;
                       justify-content:center; cursor:pointer; transition:all 0.2s; flex-shrink:0;"
                onmouseover="this.style.background='rgba(255,255,255,0.15)'"
                onmouseout="this.style.background='transparent'">
            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
        </button>

    </div>

    <!-- Contador  (ex: 01 / 03) canto inferior esquerdo -->
    <div class="absolute bottom-10 left-6 lg:left-10 z-20 flex items-center gap-3">
        <span id="count-current"
              style="font-family:'Antonio',sans-serif; font-weight:700;
                     font-size:1.4rem; color:#fff; line-height:1; min-width:28px;">
            01
        </span>
        <div style="width:40px; height:1px; background:rgba(255,255,255,0.35);"></div>
        <span style="font-family:'Antonio',sans-serif; font-weight:400;
                     font-size:0.85rem; color:rgba(255,255,255,0.45);">
            <?= str_pad(count($slides), 2, '0', STR_PAD_LEFT) ?>
        </span>
    </div>

    <!-- Barra de progresso no topo do slide -->
    <div class="absolute top-0 left-0 right-0 z-20" style="height:2px; background:rgba(255,255,255,0.1);">
        <div id="progress-bar"
             style="height:100%; background:#fff; width:0%; transition:width linear;"></div>
    </div>

</section>


<!-- ── JavaScript do Slider ───────────────── -->
<script>
(function () {
    const slides      = document.querySelectorAll('.slide');
    const indicators  = document.querySelectorAll('.indicator');
    const btnPrev     = document.getElementById('btn-prev');
    const btnNext     = document.getElementById('btn-next');
    const countEl     = document.getElementById('count-current');
    const progressBar = document.getElementById('progress-bar');

    const TOTAL    = slides.length;
    const DURATION = 6000; // ms por slide

    let current  = 0;
    let timer    = null;
    let progTimer= null;

    // ── Ir para slide ──────────────────────
    function goTo(index) {
        // Esconde actual
        slides[current].style.opacity = '0';
        slides[current].style.zIndex  = '1';

        // Mostra novo
        current = (index + TOTAL) % TOTAL;
        slides[current].style.opacity = '1';
        slides[current].style.zIndex  = '2';

        // Atualiza indicadores
        indicators.forEach((ind, i) => {
            ind.style.width      = i === current ? '28px' : '10px';
            ind.style.background = i === current
                ? '#ffffff'
                : 'rgba(255,255,255,0.35)';
        });

        // Atualiza contador
        countEl.textContent = String(current + 1).padStart(2, '0');

        // Reinicia progresso
        resetProgress();
    }

    // ── Barra de progresso ─────────────────
    function resetProgress() {
        clearInterval(progTimer);
        progressBar.style.transition = 'none';
        progressBar.style.width = '0%';

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                progressBar.style.transition = `width ${DURATION}ms linear`;
                progressBar.style.width = '100%';
            });
        });
    }

    // ── Auto-play ──────────────────────────
    function startAuto() {
        clearInterval(timer);
        timer = setInterval(() => goTo(current + 1), DURATION);
    }

    function restart() {
        startAuto();
        resetProgress();
    }

    // ── Eventos ────────────────────────────
    btnNext.addEventListener('click', () => { goTo(current + 1); restart(); });
    btnPrev.addEventListener('click', () => { goTo(current - 1); restart(); });

    indicators.forEach(ind => {
        ind.addEventListener('click', () => {
            goTo(parseInt(ind.dataset.goto));
            restart();
        });
    });

    // Pausa no hover
    const hero = document.getElementById('hero-slider');
    hero.addEventListener('mouseenter', () => clearInterval(timer));
    hero.addEventListener('mouseleave', () => startAuto());

    // ── Init ───────────────────────────────
    goTo(0);
    startAuto();
})();
</script>

<style>
    /* Animação de entrada do conteúdo ao trocar slide */
    .slide-content {
        animation: slideIn 0.6s ease both;
    }
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0) translateX(-50%); }
        50%       { transform: translateY(8px) translateX(-50%); }
    }
</style>