<?php
/**
 * Partial: admin/_field.php
 * Variáveis:
 *   $label    — label do campo
 *   $name     — name do input
 *   $value    — valor actual
 *   $type     — tipo (default 'text')
 *   $required — bool
 *   $placeholder — string
 */
$type        = 'text';
$required    = $required    ?? false;
$placeholder = $placeholder ?? '';
$value       = $value       ?? '';
?>
<div style="margin-bottom:1.25rem;">
    <label style="display:block; font-weight:700; font-size:0.65rem;
                   letter-spacing:0.12em; text-transform:uppercase;
                   color:#555; margin-bottom:8px;">
        <?= esc($label) ?>
        <?php if ($required): ?><span style="color:#EF4444;"> *</span><?php endif; ?>
    </label>
    <input type="<?= $type ?>"
           name="<?= esc($name) ?>"
           value="<?= esc($value) ?>"
           placeholder="<?= esc($placeholder) ?>"
           <?= $required ? 'required' : '' ?>
           style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                   outline:none; transition:border-color 0.2s;"
           onfocus="this.style.borderColor='#373737'"
           onblur="this.style.borderColor='#E5E5E5'">
</div>