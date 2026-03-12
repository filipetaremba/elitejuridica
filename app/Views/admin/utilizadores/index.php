<?php
$page_titulo  = 'Utilizadores';
$page_icon    = 'ph-user-gear';
$page_desc    = count($utilizadores) . ' utilizadores registados';
$action_url   = 'admin/utilizadores/criar';
$action_label = 'Novo Utilizador';
$action_icon  = 'ph-user-plus';
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<div style="background:#fff; border:1px solid #E5E5E5;">
    <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
        <tr style="border-bottom:2px solid #E5E5E5; background:#FAFAFA;">
            <th style="padding:0.9rem 1.25rem; text-align:left; font-size:0.65rem; font-weight:700;
                        letter-spacing:0.12em; text-transform:uppercase; color:#999;">Utilizador</th>
            <th style="padding:0.9rem 1rem; text-align:left; font-size:0.65rem; font-weight:700;
                        letter-spacing:0.12em; text-transform:uppercase; color:#999;"
                class="hidden md:table-cell">Papel</th>
            <th style="padding:0.9rem 1rem; text-align:left; font-size:0.65rem; font-weight:700;
                        letter-spacing:0.12em; text-transform:uppercase; color:#999;"
                class="hidden lg:table-cell">Último Login</th>
            <th style="padding:0.9rem 1rem; text-align:center; font-size:0.65rem; font-weight:700;
                        letter-spacing:0.12em; text-transform:uppercase; color:#999;">Estado</th>
            <th style="padding:0.9rem 1rem; text-align:center; font-size:0.65rem; font-weight:700;
                        letter-spacing:0.12em; text-transform:uppercase; color:#999;">Acções</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($utilizadores as $u): ?>
        <?php $isSelf = (int)$u['id'] === (int)session('user_id'); ?>
        <tr style="border-bottom:1px solid #F0F0F0; transition:background 0.15s;
                    <?= $isSelf ? 'background:#FFFBEB;' : '' ?>"
            onmouseover="this.style.background='<?= $isSelf ? '#FFF7CD' : '#FAFAFA' ?>'"
            onmouseout="this.style.background='<?= $isSelf ? '#FFFBEB' : 'transparent' ?>'">

            <td style="padding:1rem 1.25rem;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:38px; height:38px; background:<?= $u['role'] === 'admin' ? '#373737' : '#F0F0F0' ?>;
                                 flex-shrink:0; display:flex; align-items:center; justify-content:center;">
                        <i class="ph ph-user" style="font-size:1rem;
                            color:<?= $u['role'] === 'admin' ? '#fff' : '#aaa' ?>;"></i>
                    </div>
                    <div>
                        <p style="font-weight:700; font-size:0.88rem; color:#111;">
                            <?= esc($u['nome']) ?>
                            <?php if ($isSelf): ?>
                            <span style="font-size:0.65rem; color:#92400E; background:#FEF3C7;
                                          padding:0.1rem 0.4rem; margin-left:6px;">Você</span>
                            <?php endif; ?>
                        </p>
                        <p style="font-size:0.72rem; color:#aaa;"><?= esc($u['email']) ?></p>
                    </div>
                </div>
            </td>

            <td style="padding:1rem;" class="hidden md:table-cell">
                <span style="display:inline-block; padding:0.25rem 0.75rem;
                              background:<?= $u['role'] === 'admin' ? '#373737' : '#F0F0F0' ?>;
                              color:<?= $u['role'] === 'admin' ? '#fff' : '#555' ?>;
                              font-size:0.65rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">
                    <?= ucfirst($u['role']) ?>
                </span>
            </td>

            <td style="padding:1rem;" class="hidden lg:table-cell">
                <p style="font-size:0.82rem; color:#555;">
                    <?= !empty($u['ultimo_login'])
                        ? date('d/m/Y H:i', strtotime($u['ultimo_login']))
                        : 'Nunca' ?>
                </p>
            </td>

            <td style="padding:1rem; text-align:center;">
                <span style="display:inline-block; padding:0.25rem 0.75rem;
                              background:<?= $u['ativo'] ? '#F0FFF4' : '#FEF2F2' ?>;
                              color:<?= $u['ativo'] ? '#166534' : '#B91C1C' ?>;
                              font-size:0.65rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">
                    <?= $u['ativo'] ? 'Activo' : 'Inactivo' ?>
                </span>
            </td>

            <td style="padding:1rem; text-align:center;">
                <div style="display:flex; align-items:center; justify-content:center; gap:6px;">
                    <a href="<?= base_url('admin/utilizadores/editar/' . $u['id']) ?>"
                       style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                               align-items:center; justify-content:center; text-decoration:none; color:#777;
                               transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-pencil-simple" style="font-size:0.9rem;"></i>
                    </a>
                    <?php if (!$isSelf): ?>
                    <button onclick="confirmarApagar('<?= base_url('admin/utilizadores/apagar/' . $u['id']) ?>', '<?= esc($u['nome']) ?>')"
                            style="width:32px; height:32px; border:1px solid #E5E5E5; background:transparent;
                                    display:flex; align-items:center; justify-content:center; cursor:pointer; color:#777;
                                    transition:all 0.2s;"
                            onmouseover="this.style.borderColor='#EF4444';this.style.color='#EF4444'"
                            onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-trash" style="font-size:0.9rem;"></i>
                    </button>
                    <?php else: ?>
                    <div style="width:32px; height:32px;"></div>
                    <?php endif; ?>
                </div>
            </td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>

<div id="modal-apagar" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5);
      z-index:100; align-items:center; justify-content:center;">
    <div style="background:#fff; padding:2rem; max-width:400px; width:90%;">
        <i class="ph ph-warning" style="font-size:2rem; color:#EF4444; display:block; margin-bottom:1rem;"></i>
        <h3 style="font-weight:700; font-size:1.1rem; color:#111; margin-bottom:0.5rem;">Confirmar remoção</h3>
        <p style="font-size:0.88rem; color:#666; margin-bottom:1.5rem;" id="modal-msg"></p>
        <div style="display:flex; gap:8px;">
            <a id="modal-confirm-link" href="#"
               style="padding:0.75rem 1.5rem; background:#EF4444; color:#fff; text-decoration:none;
                       font-weight:700; font-size:0.72rem; letter-spacing:0.12em; text-transform:uppercase;">
                Confirmar
            </a>
            <button onclick="fecharModal()"
                    style="padding:0.75rem 1.5rem; border:1px solid #E5E5E5; background:transparent;
                            cursor:pointer; font-family:'Antonio',sans-serif; font-size:0.72rem; color:#777;">
                Cancelar
            </button>
        </div>
    </div>
</div>
<script>
function confirmarApagar(url, nome) {
    document.getElementById('modal-msg').textContent = 'Tem a certeza que quer remover "' + nome + '"?';
    document.getElementById('modal-confirm-link').href = url;
    document.getElementById('modal-apagar').style.display = 'flex';
}
function fecharModal() { document.getElementById('modal-apagar').style.display = 'none'; }
</script>