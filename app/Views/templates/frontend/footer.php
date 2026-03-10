<footer class="bg-brand text-white">

    <!-- Corpo principal -->
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 lg:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Coluna 1 — Marca -->
            <div class="lg:col-span-1">
                <!-- Logo -->
                <a href="<?= base_url('/') ?>" class="flex items-center group">
                <img src="<?= base_url('assets/image/logoWhite.png') ?>" 
                        alt="Elite Jurídica"
                        class="h-10 w-auto my-4">
                </a>

                <p class="text-white/60 text-sm font-normal leading-relaxed">
                    Comprometidos com a excelência jurídica e a defesa intransigente dos seus direitos.
                </p>

                <!-- Redes sociais -->
                <div class="flex items-center gap-2 mt-7">
                    <a href="#" class="w-8 h-8 border border-white/20 flex items-center justify-center
                                       text-white/50 hover:bg-white hover:text-brand transition-all">
                        <i class="ph ph-linkedin-logo text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 border border-white/20 flex items-center justify-center
                                       text-white/50 hover:bg-white hover:text-brand transition-all">
                        <i class="ph ph-facebook-logo text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 border border-white/20 flex items-center justify-center
                                       text-white/50 hover:bg-white hover:text-brand transition-all">
                        <i class="ph ph-instagram-logo text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Coluna 2 — Navegação -->
            <div>
                <h4 class="text-[11px] tracking-[0.25em] uppercase text-white/40 mb-6 font-bold">
                    Navegação
                </h4>
                <ul class="space-y-2.5">
                    <?php
                    $links = [
                        ['Início',    '/'],
                        ['Sobre Nós', '/about'],
                        ['Serviços',  '/servicos'],
                        ['Equipa',    '/equipe'],
                        ['Notícias',  '/noticias'],
                        ['Contacto',  '/contact'],
                    ];
                    foreach ($links as [$label, $route]):
                    ?>
                    <li>
                        <a href="<?= base_url($route) ?>"
                           class="text-sm text-white/60 hover:text-white transition-colors font-normal flex items-center gap-2 group">
                            <span class="w-3 h-px bg-white/0 group-hover:bg-white/40 transition-all"></span>
                            <?= $label ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Coluna 3 — Áreas de Atuação -->
            <div>
                <h4 class="text-[11px] tracking-[0.25em] uppercase text-white/40 mb-6 font-bold">
                    Áreas de Atuação
                </h4>
                <ul class="space-y-2.5">
                    <?php
                    $areas = [
                        'Direito Civil',
                        'Direito Penal',
                        'Direito Empresarial',
                        'Direito Laboral',
                        'Direito de Família',
                        'Direito Administrativo',
                    ];
                    foreach ($areas as $area):
                    ?>
                    <li class="text-sm text-white/60 font-normal flex items-center gap-2">
                        <i class="ph ph-caret-right text-white/30 text-xs"></i>
                        <?= $area ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Coluna 4 — Contacto -->
            <div>
                <h4 class="text-[11px] tracking-[0.25em] uppercase text-white/40 mb-6 font-bold">
                    Contacto
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="ph ph-map-pin text-white/60 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-white/60 font-normal">
                            Av. Principal, 123<br>Beira, Moçambique
                        </span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="ph ph-phone text-white/60 flex-shrink-0"></i>
                        <a href="tel:+258840000000"
                           class="text-sm text-white/60 hover:text-white transition-colors font-normal">
                            +258 84 000 0000
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="ph ph-envelope text-white/60 flex-shrink-0"></i>
                        <a href="mailto:geral@advocacia.co.mz"
                           class="text-sm text-white/60 hover:text-white transition-colors font-normal">
                            geral@advocacia.co.mz
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="ph ph-clock text-white/60 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-white/60 font-normal">
                            Seg – Sex: 08h00 – 17h30<br>
                            Sáb: 09h00 – 12h00
                        </span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Rodapé inferior -->
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-5
                    flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-white/30 font-normal">
                &copy; <?= date('Y') ?> Advocacia & Consultoria Jurídica. Todos os direitos reservados.
            </p>
            <div class="flex items-center gap-5">
                <a href="#" class="text-xs text-white/30 hover:text-white/60 transition-colors">
                    Política de Privacidade
                </a>
                <span class="text-white/20">·</span>
                <a href="#" class="text-xs text-white/30 hover:text-white/60 transition-colors">
                    Termos de Uso
                </a>
            </div>
        </div>
    </div>

</footer>