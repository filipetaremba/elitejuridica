<?php
/**
 * Parcial: home/_parallax.php
 * Dados: estáticos — imagem de fundo + frase de impacto
 * Chamada: view('home/_parallax')
 */
?>

<!-- ═══════════════════════════════════════════
     PARALLAX — FRASE DE IMPACTO
═══════════════════════════════════════════ -->
<section id="parallax-section"
         class="relative overflow-hidden"
         style="height: 480px;">

    <!-- Imagem com parallax -->
    <div id="parallax-bg"
         class="absolute inset-0 w-full"
         style="background-image: url('<?= base_url('assets/images/parallax-tribunal.jpg') ?>');
                background-size: cover;
                background-position: center center;
                background-attachment: fixed;
                height: 130%;
                top: -15%;">
    </div>

    <!-- Overlay escuro -->
    <div class="absolute inset-0"
         style="background: rgba(30, 30, 30, 0.72);"></div>

    <!-- Padrão de linhas subtil -->
    <div class="absolute inset-0 opacity-10"
         style="background-image: repeating-linear-gradient(
             0deg,
             transparent,
             transparent 39px,
             rgba(255,255,255,0.15) 39px,
             rgba(255,255,255,0.15) 40px
         );"></div>

    <!-- Conteúdo centrado -->
    <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
        <div class="par-reveal">

            <!-- Aspas decorativas -->
            <div style="font-family:'Antonio',sans-serif; font-weight:700;
                         font-size:5rem; color:rgba(255,255,255,0.12);
                         line-height:1; margin-bottom:-1.5rem; user-select:none;">
                "
            </div>

            <!-- Frase principal -->
            <p style="font-family:'Antonio',sans-serif; font-weight:700;
                       font-size:clamp(1.6rem, 3.5vw, 2.8rem);
                       line-height:1.2; letter-spacing:-0.01em;
                       color:#ffffff; max-width:780px; margin:0 auto;">
                A justiça não é apenas um direito —<br>
                <span style="color:rgba(255,255,255,0.6); font-weight:400;">
                    é a nossa razão de existir.
                </span>
            </p>

            <!-- Linha + autoria -->
            <div style="display:flex; align-items:center; justify-content:center;
                         gap:16px; margin-top:2rem;">
                <div style="width:40px; height:1px; background:rgba(255,255,255,0.3);"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.7rem; letter-spacing:0.25em; text-transform:uppercase;
                           color:rgba(255,255,255,0.45);">
                    Advocacia & Consultoria Jurídica
                </p>
                <div style="width:40px; height:1px; background:rgba(255,255,255,0.3);"></div>
            </div>

        </div>
    </div>

</section>

<style>
    .par-reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .par-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Fallback para mobile — background-attachment:fixed não funciona bem em iOS */
    @media (max-width: 768px) {
        #parallax-bg {
            background-attachment: scroll !important;
            top: 0 !important;
            height: 100% !important;
        }
    }
</style>

<script>
(function () {
    // Reveal ao entrar no viewport
    const reveal = document.querySelector('#parallax-section .par-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.2 });
    if (reveal) obs.observe(reveal);

    // Parallax manual (reforço para browsers que ignoram background-attachment:fixed)
    const bg = document.getElementById('parallax-bg');
    const section = document.getElementById('parallax-section');

    function onScroll() {
        if (window.innerWidth < 769) return; // skip mobile
        const rect   = section.getBoundingClientRect();
        const offset = rect.top * 0.3; // velocidade do parallax
        bg.style.transform = `translateY(${offset}px)`;
    }

    window.addEventListener('scroll', onScroll, { passive: true });
})();
</script>