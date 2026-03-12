<?php
/**
 * View: admin/equipe/form.php
 * Variáveis: $membro (array|null), $errors (array)
 */
$edit        = !empty($membro);
$page_titulo = $edit ? 'Editar Membro' : 'Novo Membro';
$page_icon   = 'ph-user-plus';
$page_desc   = $edit ? esc($membro['nome']) : 'Preencha os dados do novo membro da equipa.';
$back_url    = 'admin/equipe';

$action = $edit
    ? base_url('admin/equipe/actualizar/' . $membro['id'])
    : base_url('admin/equipe/guardar');

// helpers
$val = fn(string $k, $def = '') => old($k, $membro[$k] ?? $def);
$valAreas   = is_array($membro['areas']  ?? null) ? implode(', ', $membro['areas'])   : old('areas_raw',   $membro['areas']   ?? '');
$valIdiomas = is_array($membro['idiomas']?? null) ? implode(', ', $membro['idiomas']) : old('idiomas_raw', $membro['idiomas'] ?? '');
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- ── COLUNA LATERAL: foto + flags ──────────── -->
        <div style="display:flex; flex-direction:column; gap:6px;">

            <!-- Foto -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Fotografia
                </p>

                <!-- Preview -->
                <div id="foto-preview"
                     style="width:100%; aspect-ratio:3/4; background:#F0F0F0; overflow:hidden;
                             border:1px solid #E5E5E5; margin-bottom:1rem; position:relative;">
                    <?php if (!empty($membro['foto'])): ?>
                    <img src="<?= base_url($membro['foto']) ?>" id="foto-img"
                         style="width:100%; height:100%; object-fit:cover;">
                    <?php else: ?>
                    <div id="foto-placeholder"
                         style="width:100%; height:100%; display:flex; flex-direction:column;
                                 align-items:center; justify-content:center; gap:8px;">
                        <i class="ph ph-user" style="font-size:2.5rem; color:#ccc;"></i>
                        <p style="font-size:0.72rem; color:#bbb;">Sem foto</p>
                    </div>
                    <?php endif; ?>
                </div>

                <label style="display:flex; align-items:center; justify-content:center; gap:8px;
                               padding:0.75rem; border:1px dashed #E5E5E5; cursor:pointer;
                               font-size:0.72rem; color:#777; text-transform:uppercase;
                               letter-spacing:0.1em; transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                    <i class="ph ph-upload-simple" style="font-size:1rem;"></i>
                    Escolher Foto
                    <input type="file" name="foto" id="inp-foto" accept="image/*"
                           style="display:none;" onchange="previewFoto(this)">
                </label>
                <p style="font-size:0.68rem; color:#bbb; margin-top:6px; text-align:center;">
                    JPG, PNG. Rácio ideal 3:4
                </p>
            </div>

            <!-- Flags -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Visibilidade
                </p>

                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;
                               margin-bottom:0.85rem;">
                    <input type="checkbox" name="ativo" value="1"
                           <?= $val('ativo', 1) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Membro activo</span>
                </label>

                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="destaque" value="1"
                           <?= $val('destaque', 0) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Mostrar na homepage</span>
                </label>
            </div>

            <!-- Ordem -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <?= view('admin/_field', ['label'=>'Ordem de Apresentação', 'name'=>'ordem', 'type'=>'number', 'value'=>$val('ordem',0)]) ?>
            </div>

        </div>

        <!-- ── COLUNA PRINCIPAL: dados ───────────────── -->
        <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem;" class="lg:col-span-2">

            <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                       text-transform:uppercase; color:#aaa; margin-bottom:1.5rem;">
                Dados Principais
            </p>

            <div class="grid md:grid-cols-2 gap-x-6">
                <?= view('admin/_field', ['label'=>'Nome Completo *',    'name'=>'nome',         'value'=>$val('nome'),         'required'=>true]) ?>
                <?= view('admin/_field', ['label'=>'Cargo *',            'name'=>'cargo',        'value'=>$val('cargo'),        'required'=>true]) ?>
                <?= view('admin/_field', ['label'=>'Especialidade',      'name'=>'especialidade','value'=>$val('especialidade')]) ?>
                <?= view('admin/_field', ['label'=>'Nº OAM/OAB',        'name'=>'oab',          'value'=>$val('oab')]) ?>
                <?= view('admin/_field', ['label'=>'Email Profissional', 'name'=>'email',        'value'=>$val('email'),        'type'=>'email']) ?>
                <?= view('admin/_field', ['label'=>'LinkedIn (URL)',     'name'=>'linkedin',     'value'=>$val('linkedin'),     'type'=>'url']) ?>
            </div>

            <div style="border-top:1px solid #F0F0F0; margin:1.5rem 0; padding-top:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#aaa; margin-bottom:1.25rem;">
                    Formação
                </p>
                <div class="grid md:grid-cols-2 gap-x-6">
                    <?= view('admin/_field', ['label'=>'Licenciatura','name'=>'formacao',     'value'=>$val('formacao')]) ?>
                    <?= view('admin/_field', ['label'=>'Pós-Graduação / Mestrado','name'=>'pos_graduacao','value'=>$val('pos_graduacao')]) ?>
                </div>
            </div>

            <div style="border-top:1px solid #F0F0F0; margin:1.5rem 0; padding-top:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#aaa; margin-bottom:1.25rem;">
                    Perfil
                </p>

                <!-- Bio -->
                <div style="margin-bottom:1.25rem;">
                    <label style="display:block; font-weight:700; font-size:0.65rem;
                                   letter-spacing:0.12em; text-transform:uppercase;
                                   color:#555; margin-bottom:8px;">Biografia</label>
                    <textarea name="bio" rows="5"
                              style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                      font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                      resize:vertical; outline:none; transition:border-color 0.2s;"
                              onfocus="this.style.borderColor='#373737'"
                              onblur="this.style.borderColor='#E5E5E5'"><?= esc($val('bio')) ?></textarea>
                </div>

                <!-- Áreas (tags CSV) -->
                <div style="margin-bottom:1.25rem;">
                    <label style="display:block; font-weight:700; font-size:0.65rem;
                                   letter-spacing:0.12em; text-transform:uppercase;
                                   color:#555; margin-bottom:8px;">
                        Áreas de Actuação
                        <span style="font-weight:400; color:#bbb; margin-left:6px;">separadas por vírgula</span>
                    </label>
                    <input type="text" name="areas_raw"
                           value="<?= esc($valAreas) ?>"
                           placeholder="ex: Direito Civil, Contratos, Arbitragem"
                           style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                   outline:none; transition:border-color 0.2s;"
                           onfocus="this.style.borderColor='#373737'"
                           onblur="this.style.borderColor='#E5E5E5'">
                </div>

                <!-- Idiomas (tags CSV) -->
                <div>
                    <label style="display:block; font-weight:700; font-size:0.65rem;
                                   letter-spacing:0.12em; text-transform:uppercase;
                                   color:#555; margin-bottom:8px;">
                        Idiomas
                        <span style="font-weight:400; color:#bbb; margin-left:6px;">separados por vírgula</span>
                    </label>
                    <input type="text" name="idiomas_raw"
                           value="<?= esc($valIdiomas) ?>"
                           placeholder="ex: Português, Inglês, Francês"
                           style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                   outline:none; transition:border-color 0.2s;"
                           onfocus="this.style.borderColor='#373737'"
                           onblur="this.style.borderColor='#E5E5E5'">
                </div>
            </div>

            <!-- Submit -->
            <div style="border-top:1px solid #F0F0F0; margin-top:2rem; padding-top:1.5rem;
                         display:flex; gap:10px; flex-wrap:wrap;">
                <button type="submit"
                        style="padding:0.9rem 2rem; background:#373737; color:#fff; border:none;
                                cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                                display:inline-flex; align-items:center; gap:8px; transition:background 0.2s;"
                        onmouseover="this.style.background='#111'"
                        onmouseout="this.style.background='#373737'">
                    <i class="ph ph-floppy-disk" style="font-size:1rem;"></i>
                    <?= $edit ? 'Guardar Alterações' : 'Adicionar Membro' ?>
                </button>
                <a href="<?= base_url('admin/equipe') ?>"
                   style="padding:0.9rem 1.5rem; border:1px solid #E5E5E5; color:#777;
                           text-decoration:none; font-weight:400; font-size:0.72rem;
                           letter-spacing:0.15em; text-transform:uppercase; display:inline-flex;
                           align-items:center; gap:8px; transition:all 0.2s;"
                   onmouseover="this.style.borderColor='#373737';this.style.color='#333'"
                   onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                    Cancelar
                </a>
            </div>

        </div>
    </div>
</form>

<script>
function previewFoto(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const preview = document.getElementById('foto-preview');
        preview.innerHTML = '<img src="' + e.target.result + '" style="width:100%;height:100%;object-fit:cover;">';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>