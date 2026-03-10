<?php
/**
 * Parcial: home/_banner.php
 * Dados esperados: $slides (array)
 * Chamada: view('home/_banner', $banner_data)
 */
?>

<!-- ═══════════════════════════════════════════
     BANNER / HERO SLIDER
═══════════════════════════════════════════ -->
<section id="hero-slider"
         class="relative w-full overflow-hidden"
         style="height: calc(100vh - 64px); min-height: 580px;">

    <!-- ── Slides ─────────────────────────────────── -->
    <?php foreach ($slides as $i => $slide): ?>
    <div class="slide absolute inset-0"
         style="opacity: <?= $i === 0 ? '1' : '0' ?>;
                z-index:  <?= $i === 0 ? '2' : '1' ?>;
                transition: opacity 0.8s ease;"
         data-index="<?= $i ?>">

        <!-- Imagem de fundo -->
        <div class="absolute inset-0">
            <img src="<?= esc($slide['image']) ?>"
                 alt="<?= esc($slide['titulo']) ?>"
                 class="w-full h-full object-cover">

            <!-- Overlay gradiente -->
            <div class="absolute inset-0"
                 style="background: linear-gradient(
                     to right,
                     rgba(0,0,0,0.78) 0%,
                     rgba(0,0,0,0.45) 55%,
                     rgba(0,0,0,0.12) 100%
                 );"></div>
        </div>

        <!-- Conteúdo -->
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">
                <div class="max-w-2xl">

                    <!-- Label -->
                    <div class="flex items-center gap-3 mb-6"
                         style="animation: slideUp 0.55s 0.05s ease both;">
                        <div style="width:28px; height:1px; background:#fff;"></div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.68rem; letter-spacing:0.32em;
                                   text-transform:uppercase; color:rgba(255,255,255,0.7);">
                            <?= esc($slide['label']) ?>
                        </p>
                    </div>

                    <!-- Título -->
                    <h1 style="font-family:'Antonio',sans-serif; font-weight:700;
                                font-size: clamp(2.4rem, 5.5vw, 4.6rem);
                                line-height:1.0; letter-spacing:-0.02em; color:#fff;
                                animation: slideUp 0.55s 0.15s ease both; opacity:0;">
                        <?= esc($slide['titulo']) ?>
                    </h1>

                    <!-- Linha -->
                    <div style="width:44px; height:2px; background:#fff;
                                 margin:1.5rem 0;
                                 animation: slideUp 0.55s 0.25s ease both; opacity:0;">
                    </div>

                    <!-- Subtítulo -->
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:1.05rem; color:rgba(255,255,255,0.68);
                               line-height:1.72; max-width:460px;
                               animation: slideUp 0.55s 0.3s ease both; opacity:0;">
                        <?= esc($slide['subtitulo']) ?>
                    </p>

                    <!-- CTA -->
                    <div style="margin-top:2.5rem;
                                 animation: slideUp 0.55s 0.4s ease both; opacity:0;">
                        <a href="<?= esc($slide['cta']['url']) ?>"
                           class="cta-btn"
                           style="display:inline-flex; align-items:center; gap:12px;
                                   font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:0.72rem; letter-spacing:0.2em;
                                   text-transform:uppercase; background:#fff; color:#373737;
                                   padding:1rem 2rem; transition:background 0.2s, color 0.2s;">
                            <?= esc($slide['cta']['texto']) ?>
                            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php endforeach; ?>


    <!-- ── Barra de progresso (topo) ───────────────── -->
    <div class="absolute top-0 left-0 right-0 z-20"
         style="height:2px; background:rgba(255,255,255,0.12);">
        <div id="progress-bar"
             style="height:100%; width:0%; background:#fff;"></div>
    </div>


    <!-- ── Contador (canto inf. esquerdo) ──────────── -->
    <div class="absolute bottom-10 left-6 lg:left-10 z-20 flex items-center gap-3">
        <span id="count-current"
              style="font-family:'Antonio',sans-serif; font-weight:700;
                     font-size:1.5rem; color:#fff; line-height:1; min-width:30px;">
            01
        </span>
        <div style="width:36px; height:1px; background:rgba(255,255,255,0.3);"></div>
        <span style="font-family:'Antonio',sans-serif; font-weight:400;
                     font-size:0.85rem; color:rgba(255,255,255,0.4);">
            <?= str_pad(count($slides), 2, '0', STR_PAD_LEFT) ?>
        </span>
    </div>


    <!-- ── Navegação quadrada (canto inf. direito) ─── -->
    <div class="absolute bottom-10 right-6 lg:right-10 z-20 flex items-center gap-2">

        <!-- Prev -->
        <button id="btn-prev"
                aria-label="Slide anterior"
                style="width:40px; height:40px; border:1px solid rgba(255,255,255,0.35);
                       background:transparent; color:#fff; display:flex; align-items:center;
                       justify-content:center; cursor:pointer; transition:background 0.2s;"
                onmouseover="this.style.background='rgba(255,255,255,0.12)'"
                onmouseout="this.style.background='transparent'">
            <i class="ph ph-arrow-left" style="font-size:0.95rem;"></i>
        </button>

        <!-- Indicadores rectangulares -->
        <div id="slide-indicators" class="flex items-center gap-1.5">
            <?php foreach ($slides as $i => $_): ?>
            <button class="indicator"
                    data-goto="<?= $i ?>"
                    aria-label="Slide <?= $i + 1 ?>"
                    style="height:3px;
                           width:<?= $i === 0 ? '32px' : '12px' ?>;
                           background:<?= $i === 0 ? '#fff' : 'rgba(255,255,255,0.3)' ?>;
                           border:none; padding:0; cursor:pointer;
                           transition:width 0.35s ease, background 0.35s ease;">
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Next -->
        <button id="btn-next"
                aria-label="Próximo slide"
                style="width:40px; height:40px; border:1px solid rgba(255,255,255,0.35);
                       background:transparent; color:#fff; display:flex; align-items:center;
                       justify-content:center; cursor:pointer; transition:background 0.2s;"
                onmouseover="this.style.background='rgba(255,255,255,0.12)'"
                onmouseout="this.style.background='transparent'">
            <i class="ph ph-arrow-right" style="font-size:0.95rem;"></i>
        </button>

    </div>

</section>


<!-- ── Estilos do banner ─────────────────────────── -->
<style>
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .cta-btn:hover {
        background: #373737 !important;
        color: #fff !important;
    }
</style>


<!-- ── JavaScript do Slider ─────────────────────── -->
<script>
(function () {
    const slides      = document.querySelectorAll('.slide');
    const indicators  = document.querySelectorAll('.indicator');
    const btnPrev     = document.getElementById('btn-prev');
    const btnNext     = document.getElementById('btn-next');
    const countEl     = document.getElementById('count-current');
    const progressBar = document.getElementById('progress-bar');

    const TOTAL    = slides.length;
    const DURATION = 6000;

    let current = 0;
    let autoTimer = null;

    // ── Ir para slide ────────────────────────────
    function goTo(index) {
        // Esconde actual
        slides[current].style.opacity = '0';
        slides[current].style.zIndex  = '1';

        // Calcula próximo
        current = ((index % TOTAL) + TOTAL) % TOTAL;

        // Mostra novo
        slides[current].style.opacity = '1';
        slides[current].style.zIndex  = '2';

        // Atualiza indicadores
        indicators.forEach((ind, i) => {
            ind.style.width      = i === current ? '32px' : '12px';
            ind.style.background = i === current
                ? '#ffffff'
                : 'rgba(255,255,255,0.3)';
        });

        // Atualiza contador
        countEl.textContent = String(current + 1).padStart(2, '0');

        // Reinicia barra de progresso
        resetProgress();
    }

    // ── Barra de progresso ───────────────────────
    function resetProgress() {
        progressBar.style.transition = 'none';
        progressBar.style.width = '0%';

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                progressBar.style.transition = `width ${DURATION}ms linear`;
                progressBar.style.width = '100%';
            });
        });
    }

    // ── Auto-play ────────────────────────────────
    function startAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(() => goTo(current + 1), DURATION);
    }

    function restartAuto() {
        startAuto();
    }

    // ── Eventos ──────────────────────────────────
    btnNext.addEventListener('click', () => { goTo(current + 1); restartAuto(); });
    btnPrev.addEventListener('click', () => { goTo(current - 1); restartAuto(); });

    indicators.forEach(ind => {
        ind.addEventListener('click', () => {
            goTo(parseInt(ind.dataset.goto));
            restartAuto();
        });
    });

    // Pausa no hover
    const hero = document.getElementById('hero-slider');
    hero.addEventListener('mouseenter', () => clearInterval(autoTimer));
    hero.addEventListener('mouseleave', () => startAuto());

    // ── Init ─────────────────────────────────────
    goTo(0);
    startAuto();
})();
</script>