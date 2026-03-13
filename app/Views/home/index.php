<?php
/**
 * View: home/index.php
 * Página inicial
 * Define CSS e JS extras usados apenas nesta página
 */
$slides   = $banner_data['slides']   ?? [];
$equipe   = $equipe_data['equipe']   ?? [];
$noticias = $noticias_data['noticias'] ?? [];
/* CSS específico da HOME */
$extra_head = '
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

@media (max-width: 768px) {
    #parallax-bg {
        background-attachment: scroll !important;
        top: 0 !important;
        height: 100% !important;
    }
}
</style>
';


/* JS específico da HOME */
$extra_scripts = '
<script>
(function () {

    const reveal = document.querySelector("#parallax-section .par-reveal");

    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add("visible");
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.2 });

    if (reveal) obs.observe(reveal);

    const bg = document.getElementById("parallax-bg");
    const section = document.getElementById("parallax-section");

    function onScroll() {

        if (window.innerWidth < 769) return;

        const rect = section.getBoundingClientRect();
        const offset = rect.top * 0.3;

        if (bg) {
            bg.style.transform = `translateY(${offset}px)`;
        }

    }

    window.addEventListener("scroll", onScroll, { passive: true });

})();
</script>
';
?>

<?= view('home/_banner', $banner_data) ?>

<?= view('home/_sobre') ?>

<?= view('home/_equipe', $equipe_data) ?>

<?= view('home/_parallax') ?>

<?= view('home/_noticias', $noticias_data) ?>