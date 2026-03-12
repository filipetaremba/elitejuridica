<?php
$page_titulo  = 'Notícias';
$page_icon    = 'ph-newspaper';
$page_desc    = count($noticias) . ' artigos registados';
$action_url   = 'admin/noticias/criar';
$action_label = 'Nova Notícia';
$action_icon  = 'ph-pencil-line';
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<?php if (empty($noticias)): ?>
<div style="background:#fff; border:1px solid #E5E5E5; padding:4rem; text-align:center;">
    <i class="ph ph-newspaper" style="font-size:3rem; color:#ddd; display:block; margin-bottom:1rem;"></i>
    <p style="color:#aaa;">Ainda não há artigos publicados.</p>
    <a href="<?= base_url('admin/noticias/criar') ?>"
       style="display:inline-flex;align-items:center;gap:8px;margin-top:1rem;padding:0.75rem 1.5rem;
               background:#373737;color:#fff;text-decoration:none;font-size:0.72rem;font-weight:700;
               letter-spacing:0.15em;text-transform:uppercase;">
        <i class="ph ph-pencil-line"></i> Escrever Artigo
    </a>
</div>
<?php else: ?>
<div style="background:#fff; border:1px solid #E5E5E5;">
    <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
        <tr style="border-bottom:2px solid #E5E5E5; background:#FAFAFA;">
            <th style="padding:0.9rem 1.25rem; text-align:left; font-size:0.65rem;
                        font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Artigo
            </th>
            <th style="padding:0.9rem 1rem; text-align:left; font-size:0.65rem;
                        font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#999;"
                class="hidden md:table-cell">
                Categoria / Autor
            </th>
            <th style="padding:0.9rem 1rem; text-align:left; font-size:0.65rem;
                        font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#999;"
                class="hidden lg:table-cell">
                Data
            </th>
            <th style="padding:0.9rem 1rem; text-align:center; font-size:0.65rem;
                        font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Estado
            </th>
            <th style="padding:0.9rem 1rem; text-align:center; font-size:0.65rem;
                        font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#999;">
                Acções
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($noticias as $n): ?>
        <tr style="border-bottom:1px solid #F0F0F0; transition:background 0.15s;"
            onmouseover="this.style.background='#FAFAFA'"
            onmouseout="this.style.background='transparent'">

            <!-- Título + imagem -->
            <td style="padding:1rem 1.25rem;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:48px; height:48px; background:#F0F0F0; flex-shrink:0;
                                 overflow:hidden; border:1px solid #E5E5E5;">
                        <?php if (!empty($n['imagem'])): ?>
                        <img src="<?= base_url($n['imagem']) ?>" alt=""
                             style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                            <i class="ph ph-image" style="font-size:1.1rem; color:#bbb;"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div style="min-width:0;">
                        <p style="font-weight:700; font-size:0.88rem; color:#111;
                                   overflow:hidden; white-space:nowrap; text-overflow:ellipsis; max-width:260px;">
                            <?= esc($n['titulo']) ?>
                        </p>
                        <?php if ($n['destaque']): ?>
                        <span style="display:inline-block; padding:0.15rem 0.5rem; background:#373737;
                                      color:#fff; font-size:0.6rem; font-weight:700; letter-spacing:0.1em;
                                      text-transform:uppercase; margin-top:3px;">
                            Destaque
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </td>

            <!-- Categoria / autor -->
            <td style="padding:1rem;" class="hidden md:table-cell">
                <?php if (!empty($n['categoria'])): ?>
                <span style="display:inline-block; padding:0.2rem 0.6rem; background:#F0F0F0;
                              color:#555; font-size:0.65rem; letter-spacing:0.08em; text-transform:uppercase;
                              margin-bottom:4px;">
                    <?= esc($n['categoria']) ?>
                </span><br>
                <?php endif; ?>
                <p style="font-size:0.78rem; color:#aaa;"><?= esc($n['autor'] ?? '') ?></p>
            </td>

            <!-- Data -->
            <td style="padding:1rem;" class="hidden lg:table-cell">
                <p style="font-size:0.82rem; color:#555;">
                    <?= !empty($n['publicado_em']) ? date('d/m/Y', strtotime($n['publicado_em'])) : '—' ?>
                </p>
            </td>

            <!-- Estado -->
            <td style="padding:1rem; text-align:center;">
                <span style="display:inline-block; padding:0.25rem 0.75rem;
                              background:<?= $n['publicado'] ? '#F0FFF4' : '#FFFBEB' ?>;
                              color:<?= $n['publicado'] ? '#166534' : '#92400E' ?>;
                              font-size:0.65rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">
                    <?= $n['publicado'] ? 'Publicado' : 'Rascunho' ?>
                </span>
            </td>

            <!-- Acções -->
            <td style="padding:1rem; text-align:center;">
                <div style="display:flex; align-items:center; justify-content:center; gap:6px;">
                    <?php if (!empty($n['slug'])): ?>
                    <a href="<?= base_url('noticias/' . $n['slug']) ?>" target="_blank"
                       style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                               align-items:center; justify-content:center; text-decoration:none; color:#777;
                               transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-arrow-square-out" style="font-size:0.9rem;"></i>
                    </a>
                    <?php endif; ?>
                    <a href="<?= base_url('admin/noticias/editar/' . $n['id']) ?>"
                       style="width:32px; height:32px; border:1px solid #E5E5E5; display:flex;
                               align-items:center; justify-content:center; text-decoration:none; color:#777;
                               transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                        <i class="ph ph-pencil-simple" style="font-size:0.9rem;"></i>
                    </a>
                    <button onclick="confirmarApagar('<?= base_url('admin/noticias/apagar/' . $n['id']) ?>', '<?= esc($n['titulo']) ?>')"
                            style="width:32px; height:32px; border:1px solid #E5E5E5; background:transparent;
                                    display:flex; align-items:center; justify-content:center; cursor:pointer; color:#777;
                                    transition:all 0.2s;"
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