<?php
/**
 * View: admin/equipe/index.php
 */
$page_titulo  = 'Equipa';
$page_icon    = 'ph-users-three';
$page_desc    = count($membros) . ' membros registados';
$action_url   = 'admin/equipe/criar';
$action_label = 'Novo Membro';
$action_icon  = 'ph-user-plus';
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<?php if (empty($membros)): ?>
<div style="background:#fff; border:1px solid #E5E5E5; padding:4rem; text-align:center;">
    <i class="ph ph-users-three" style="font-size:3rem; color:#ddd; display:block; margin-bottom:1rem;"></i>
    <p style="color:#aaa; font-size:0.9rem;">Ainda não há membros. Adicione o primeiro.</p>
    <a href="<?= base_url('admin/equipe/criar') ?>"
       style="display:inline-flex; align-items:center; gap:8px; margin-top:1rem;
               padding:0.75rem 1.5rem; background:#373737; color:#fff; text-decoration:none;
               font-size:0.72rem; font-weight:700; letter-spacing:0.15em; text-transform:uppercase;">
        <i class="ph ph-user-plus"></i> Adicionar Membro
    </a>
</div>
<?php else: ?>
<div style="background:#fff; border:1px solid #E5E5E5; overflow:hidden;">

    <!-- Tabela -->
    <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
        <tr style="border-bottom:2px solid #E5E5E5; background:#FAFAFA;">
            <th style="padding:0.9rem 1.25rem; text-align:left; font-weight:700;
                        font-size:0.65rem; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Membro
            </th>
            <th style="padding:0.9rem 1rem; text-align:left; font-weight:700;
                        font-size:0.65rem; letter-spacing:0.12em; text-transform:uppercase; color:#999;"
                class="hidden md:table-cell">
                Cargo / Especialidade
            </th>
            <th style="padding:0.9rem 1rem; text-align:center; font-weight:700;
                        font-size:0.65rem; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Destaque
            </th>
            <th style="padding:0.9rem 1rem; text-align:center; font-weight:700;
                        font-size:0.65rem; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Estado
            </th>
            <th style="padding:0.9rem 1rem; text-align:center; font-weight:700;
                        font-size:0.65rem; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Acções
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($membros as $m): ?>
        <tr style="border-bottom:1px solid #F0F0F0; transition:background 0.15s;"
            onmouseover="this.style.background='#FAFAFA'"
            onmouseout="this.style.background='transparent'">

            <!-- Nome + foto -->
            <td style="padding:1rem 1.25rem;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:40px; height:40px; background:#F0F0F0; flex-shrink:0;
                                 overflow:hidden; border:1px solid #E5E5E5;">
                        <?php if (!empty($m['foto'])): ?>
                        <img src="<?= base_url($m['foto']) ?>" alt=""
                             style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                            <i class="ph ph-user" style="font-size:1.1rem; color:#bbb;"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p style="font-weight:700; font-size:0.88rem; color:#111;">
                            <?= esc($m['nome']) ?>
                        </p>
                        <?php if (!empty($m['email'])): ?>
                        <p style="font-weight:400; font-size:0.72rem; color:#aaa;">
                            <?= esc($m['email']) ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </td>

            <!-- Cargo -->
            <td style="padding:1rem;" class="hidden md:table-cell">
                <p style="font-size:0.85rem; color:#333;"><?= esc($m['cargo']) ?></p>
                <?php if (!empty($m['especialidade'])): ?>
                <p style="font-size:0.72rem; color:#aaa;"><?= esc($m['especialidade']) ?></p>
                <?php endif; ?>
            </td>

            <!-- Destaque toggle -->
            <td style="padding:1rem; text-align:center;">
                <button onclick="toggleDestaque(<?= $m['id'] ?>, this)"
                        style="background:<?= $m['destaque'] ? '#373737' : '#F0F0F0' ?>;
                                color:<?= $m['destaque'] ? '#fff' : '#aaa' ?>;
                                border:none; cursor:pointer; padding:0.35rem 0.75rem;
                                font-family:'Antonio',sans-serif; font-size:0.65rem;
                                font-weight:700; letter-spacing:0.1em; text-transform:uppercase;
                                transition:all 0.2s;"
                        data-state="<?= $m['destaque'] ?>">
                    <?= $m['destaque'] ? 'Sim' : 'Não' ?>
                </button>
            </td>

            <!-- Estado -->
            <td style="padding:1rem; text-align:center;">
                <span style="display:inline-block; padding:0.25rem 0.75rem;
                              background:<?= $m['ativo'] ? '#F0FFF4' : '#FEF2F2' ?>;
                              color:<?= $m['ativo'] ? '#166534' : '#B91C1C' ?>;
                              font-size:0.65rem; font-weight:700; letter-spacing:0.1em;
                              text-transform:uppercase;">
                    <?= $m['ativo'] ? 'Activo' : 'Inactivo' ?>
                </span>
            </td>

            <!-- Acções -->
            <td style="padding:1rem; text-align:center;">
                <div style="display:flex; align-items:center; justify-content:center; gap:6px;">
                    <a href="<?= base_url('equipe/' . $m['slug']) ?>" target="_blank"
                       title="Ver no site"
                       style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                               align-items:center; justify-content:center; text-decoration:none;
                               color:#777; transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-arrow-square-out" style="font-size:0.9rem;"></i>
                    </a>
                    <a href="<?= base_url('admin/equipe/editar/' . $m['id']) ?>"
                       title="Editar"
                       style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                               align-items:center; justify-content:center; text-decoration:none;
                               color:#777; transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-pencil-simple" style="font-size:0.9rem;"></i>
                    </a>
                    <button onclick="confirmarApagar('<?= base_url('admin/equipe/apagar/' . $m['id']) ?>', '<?= esc($m['nome']) ?>')"
                            title="Apagar"
                            style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                                    align-items:center; justify-content:center; background:transparent;
                                    cursor:pointer; color:#777; transition:all 0.2s;"
                            onmouseover="this.style.borderColor='#EF4444';this.style.color='#EF4444'"
                            onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-trash" style="font-size:0.9rem;"></i>
                    </button>
                </div>
            </td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>

</div>
<?php endif; ?>

<!-- Modal confirmação apagar -->
<div id="modal-apagar" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5);
      z-index:100; align-items:center; justify-content:center;">
    <div style="background:#fff; padding:2rem; max-width:400px; width:90%; margin:1rem;">
        <i class="ph ph-warning" style="font-size:2rem; color:#EF4444; display:block; margin-bottom:1rem;"></i>
        <h3 style="font-weight:700; font-size:1.1rem; color:#111; margin-bottom:0.5rem;">
            Confirmar remoção
        </h3>
        <p style="font-size:0.88rem; color:#666; margin-bottom:1.5rem;" id="modal-msg"></p>
        <div style="display:flex; gap:8px;">
            <a id="modal-confirm-link" href="#"
               style="padding:0.75rem 1.5rem; background:#EF4444; color:#fff; text-decoration:none;
                       font-weight:700; font-size:0.72rem; letter-spacing:0.12em; text-transform:uppercase;">
                Confirmar
            </a>
            <button onclick="fecharModal()"
                    style="padding:0.75rem 1.5rem; border:1px solid #E5E5E5; background:transparent;
                            cursor:pointer; font-family:'Antonio',sans-serif; font-weight:400;
                            font-size:0.72rem; color:#777; letter-spacing:0.1em; text-transform:uppercase;">
                Cancelar
            </button>
        </div>
    </div>
</div>

<script>
function confirmarApagar(url, nome) {
    document.getElementById('modal-msg').textContent = 'Tem a certeza que quer remover "' + nome + '"? Esta acção não pode ser desfeita.';
    document.getElementById('modal-confirm-link').href = url;
    document.getElementById('modal-apagar').style.display = 'flex';
}
function fecharModal() {
    document.getElementById('modal-apagar').style.display = 'none';
}
function toggleDestaque(id, btn) {
    fetch('<?= base_url('admin/equipe/toggle-destaque/') ?>' + id, { method:'POST',
        headers:{'X-Requested-With':'XMLHttpRequest','X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''}
    })
    .then(r => r.json()).then(data => {
        if (data.ok) {
            const active = btn.dataset.state === '1' ? false : true;
            btn.dataset.state = active ? '1' : '0';
            btn.style.background = active ? '#373737' : '#F0F0F0';
            btn.style.color = active ? '#fff' : '#aaa';
            btn.textContent = active ? 'Sim' : 'Não';
        }
    }).catch(() => window.location.reload());
}
</script>