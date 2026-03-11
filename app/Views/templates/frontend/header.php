<!-- Banner de página interior -->
<section 
    class="relative border-b border-border py-20 lg:py-28 bg-cover bg-center"
    style="background-image:url('<?= esc($image ?? base_url('assets/images/default-banner.jpg')) ?>');"
>

    <!-- Overlay escuro -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-10 text-white">

        <!-- Breadcrumb -->
        <?php if (!empty($breadcrumbs)): ?>
        <nav class="flex items-center gap-2 mb-5" aria-label="breadcrumb">
            <a href="<?= base_url('/') ?>"
               class="text-[11px] tracking-[0.2em] uppercase text-gray-300 hover:text-white transition-colors">
                Início
            </a>

            <?php foreach ($breadcrumbs as $bc): ?>
                <i class="ph ph-caret-right text-gray-400 text-[10px]"></i>

                <?php if (!empty($bc['url'])): ?>
                    <a href="<?= base_url($bc['url']) ?>"
                       class="text-[11px] tracking-[0.2em] uppercase text-gray-300 hover:text-white transition-colors">
                        <?= esc($bc['label']) ?>
                    </a>
                <?php else: ?>
                    <span class="text-[11px] tracking-[0.2em] uppercase text-white font-semibold">
                        <?= esc($bc['label']) ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>

        <!-- Conteúdo -->
        <div class="max-w-3xl">

            <?php if (!empty($page_label)): ?>
                <p class="text-[11px] tracking-[0.3em] uppercase text-gray-300 mb-3">
                    <?= esc($page_label) ?>
                </p>
            <?php endif; ?>

            <h1 class="text-4xl lg:text-6xl font-bold leading-none">
                <?= esc($page_title ?? '') ?>
            </h1>

            <div class="w-10 h-0.5 bg-white mt-5 mb-5"></div>

            <?php if (!empty($page_subtitle)): ?>
                <p class="text-gray-200 text-lg leading-relaxed max-w-xl">
                    <?= esc($page_subtitle) ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>