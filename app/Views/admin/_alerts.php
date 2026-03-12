<?php
/**
 * Partial: admin/_alerts.php
 * Variáveis: $errors (array), $error (string), $success (string)
 */
$errors  = $errors  ?? [];
$error   = $error   ?? session()->getFlashdata('error');
$success = $success ?? session()->getFlashdata('success');
?>

<?php if ($success): ?>
<div style="background:#F0FFF4; border-left:3px solid #22C55E; padding:0.85rem 1rem;
             margin-bottom:1.5rem; display:flex; align-items:center; gap:10px;">
    <i class="ph ph-check-circle" style="color:#22C55E; font-size:1rem; flex-shrink:0;"></i>
    <p style="font-size:0.88rem; color:#166534; flex:1;"><?= esc($success) ?></p>
</div>
<?php endif; ?>

<?php if ($error): ?>
<div style="background:#FEF2F2; border-left:3px solid #EF4444; padding:0.85rem 1rem;
             margin-bottom:1.5rem; display:flex; align-items:center; gap:10px;">
    <i class="ph ph-warning-circle" style="color:#EF4444; font-size:1rem; flex-shrink:0;"></i>
    <p style="font-size:0.88rem; color:#B91C1C; flex:1;"><?= esc($error) ?></p>
</div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
<div style="background:#FEF2F2; border-left:3px solid #EF4444;
             padding:0.9rem 1rem; margin-bottom:1.5rem;">
    <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
               text-transform:uppercase; color:#EF4444; margin-bottom:6px;">
        Corrija os seguintes erros:
    </p>
    <ul style="margin:0; padding-left:1.25rem;">
        <?php foreach ($errors as $e): ?>
        <li style="font-size:0.85rem; color:#666; line-height:1.6;"><?= esc($e) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>