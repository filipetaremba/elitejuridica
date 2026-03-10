<!-- Banner de página interior — inclui em cada view que precisa de título de topo -->
<section class="bg-offwhite border-b border-border py-14 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- Breadcrumb -->
        <?php if (!empty($breadcrumbs)): ?>
        <nav class="flex items-center gap-2 mb-5" aria-label="breadcrumb">
            <a href="<?= base_url('/') ?>"
               class="text-[11px] tracking-[0.2em] uppercase text-soft hover:text-brand transition-colors">
                Início
            </a>
            <?php foreach ($breadcrumbs as $bc): ?>
                <i class="ph ph-caret-right text-soft text-[10px]"></i>
                <?php if (!empty($bc['url'])): ?>
                    <a href="<?= base_url($bc['url']) ?>"
                       class="text-[11px] tracking-[0.2em] uppercase text-soft hover:text-brand transition-colors">
                        <?= esc($bc['label']) ?>
                    </a>
                <?php else: ?>
                    <span class="text-[11px] tracking-[0.2em] uppercase text-brand font-semibold">
                        <?= esc($bc['label']) ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>

        <!-- Etiqueta + Título + Subtítulo -->
        <div class="max-w-3xl">

            <?php if (!empty($page_label)): ?>
                <p class="text-[11px] tracking-[0.3em] uppercase text-soft mb-3">
                    <?= esc($page_label) ?>
                </p>
            <?php endif; ?>

            <h1 class="text-4xl lg:text-6xl text-dark font-bold leading-none">
                <?= $page_title ?? '' ?>
            </h1>

            <!-- Linha decorativa -->
            <div class="w-10 h-0.5 bg-brand mt-5 mb-5"></div>

            <?php if (!empty($page_subtitle)): ?>
                <p class="text-mid text-lg font-normal leading-relaxed max-w-xl">
                    <?= esc($page_subtitle) ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>