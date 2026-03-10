<?php
$navLinks = [
    ['label' => 'Início',   'route' => '/'],
    ['label' => 'Sobre',    'route' => '/about'],
    ['label' => 'Serviços', 'route' => '/servicos'],
    ['label' => 'Equipa',   'route' => '/equipe'],
    ['label' => 'Notícias', 'route' => '/noticias'],
    ['label' => 'Contacto', 'route' => '/contact'],
];
?>

<header id="navbar"
        class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-border transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="<?= base_url('/') ?>" class="flex items-center group">
                <img src="<?= base_url('assets/images/logo.png') ?>" 
                    alt="Elite Jurídica"
                    class="h-10 w-auto">
            </a>

            <!-- Links Desktop -->
            <nav class="hidden lg:flex items-center gap-7">
                <?php foreach ($navLinks as $link):
                    $isActive = rtrim(current_url(), '/') === rtrim(base_url($link['route']), '/');
                ?>
                    <a href="<?= base_url($link['route']) ?>"
                       class="text-[12px] tracking-[0.15em] uppercase transition-colors duration-150
                              <?= $isActive
                                    ? 'text-dark font-semibold border-b-2 border-brand pb-0.5'
                                    : 'text-soft hover:text-brand font-normal' ?>">
                        <?= $link['label'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- CTA Direito -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="<?= base_url('contact') ?>"
                   class="text-[11px] tracking-[0.15em] uppercase px-5 py-2.5
                          bg-brand text-white hover:bg-dark transition-colors duration-200 font-semibold">
                    Consulta Gratuita
                </a>
            </div>

            <!-- Botão Mobile -->
            <button id="menu-toggle"
                    class="lg:hidden text-brand focus:outline-none"
                    aria-label="Abrir menu">
                <i class="ph ph-list text-2xl" id="menu-icon"></i>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu"
         class="hidden lg:hidden bg-white border-t border-border">
        <nav class="flex flex-col px-6 py-5 gap-4">
            <?php foreach ($navLinks as $link):
                $isActive = rtrim(current_url(), '/') === rtrim(base_url($link['route']), '/');
            ?>
                <a href="<?= base_url($link['route']) ?>"
                   class="text-[13px] tracking-[0.15em] uppercase
                          <?= $isActive ? 'text-dark font-bold' : 'text-mid font-normal' ?>">
                    <?= $link['label'] ?>
                </a>
            <?php endforeach; ?>
            <a href="<?= base_url('contact') ?>"
               class="mt-1 text-center text-[12px] tracking-[0.15em] uppercase
                      px-5 py-3 bg-brand text-white hover:bg-dark transition-colors font-semibold">
                Consulta Gratuita
            </a>
        </nav>
    </div>
</header>

<!-- Espaço para compensar navbar fixa -->
<div class="h-16"></div>

<script>
    // Sombra leve ao fazer scroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.style.boxShadow = window.scrollY > 20
            ? '0 2px 16px rgba(0,0,0,0.08)'
            : 'none';
    });

    // Toggle mobile
    const toggle      = document.getElementById('menu-toggle');
    const mobileMenu  = document.getElementById('mobile-menu');
    const menuIcon    = document.getElementById('menu-icon');

    toggle.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');
        menuIcon.className = isOpen
            ? 'ph ph-list text-2xl'
            : 'ph ph-x text-2xl';
    });
</script>