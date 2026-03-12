<?php
/**
 * Partial: admin/_page_header.php
 * Variáveis esperadas:
 *   $page_titulo  — título da página
 *   $page_icon    — classe phosphor (ex: 'ph-users-three')
 *   $page_desc    — subtítulo (opcional)
 *   $back_url     — URL do botão voltar (opcional)
 *   $action_url   — URL do botão de acção primária (opcional)
 *   $action_label — label do botão (opcional, default 'Novo')
 *   $action_icon  — ícone do botão (opcional, default 'ph-plus')
 */
?>
<div style="display:flex; align-items:flex-start; justify-content:space-between;
             flex-wrap:wrap; gap:1rem; margin-bottom:2rem;">

    <div style="display:flex; align-items:center; gap:12px;">
        <?php if (!empty($back_url)): ?>
        <a href="<?= base_url($back_url) ?>"
           style="width:36px; height:36px; border:1px solid #E5E5E5; flex-shrink:0;
                   display:flex; align-items:center; justify-content:center;
                   text-decoration:none; color:#777; transition:all 0.2s;"
           onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
           onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
            <i class="ph ph-arrow-left" style="font-size:1rem;"></i>
        </a>
        <?php endif; ?>
        <div>
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:3px;">
                <?php if (!empty($page_icon)): ?>
                <i class="ph <?= $page_icon ?>" style="font-size:1.15rem; color:#373737;"></i>
                <?php endif; ?>
                <h2 style="font-weight:700; font-size:1.4rem; color:#111; line-height:1;">
                    <?= esc($page_titulo ?? '') ?>
                </h2>
            </div>
            <?php if (!empty($page_desc)): ?>
            <p style="font-weight:400; font-size:0.82rem; color:#aaa;">
                <?= esc($page_desc) ?>
            </p>
            <?php endif; ?>
        </div>
    </div>

    <?php if (!empty($action_url)): ?>
    <a href="<?= base_url($action_url) ?>"
       style="display:inline-flex; align-items:center; gap:8px; padding:0.75rem 1.5rem;
               background:#373737; color:#fff; text-decoration:none; font-weight:700;
               font-size:0.72rem; letter-spacing:0.15em; text-transform:uppercase;
               transition:background 0.2s; white-space:nowrap;"
       onmouseover="this.style.background='#111'"
       onmouseout="this.style.background='#373737'">
        <i class="ph <?= $action_icon ?? 'ph-plus' ?>" style="font-size:1rem;"></i>
        <?= esc($action_label ?? 'Novo') ?>
    </a>
    <?php endif; ?>

</div>