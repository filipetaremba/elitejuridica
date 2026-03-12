<?php
$edit        = !empty($servico);
$page_titulo = $edit ? 'Editar Serviço' : 'Novo Serviço';
$page_icon   = 'ph-scales';
$page_desc   = $edit ? esc($servico['titulo']) : 'Preencha os dados do serviço.';
$back_url    = 'admin/servicos';

$action = $edit
    ? base_url('admin/servicos/actualizar/' . $servico['id'])
    : base_url('admin/servicos/guardar');

$val = fn(string $k, $def = '') => old($k, $servico[$k] ?? $def);

$icones = [
    'ph-scales','ph-handcuffs','ph-buildings','ph-users-three','ph-house',
    'ph-bank','ph-globe','ph-file-text','ph-chart-line-up','ph-briefcase',
    'ph-gavel','ph-shield-check','ph-scroll','ph-coins','ph-factory',
];
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<form action="<?= $action ?>" method="POST">
    <?= csrf_field() ?>

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- Lateral -->
        <div style="display:flex; flex-direction:column; gap:6px;">

            <!-- Ícone selector -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Ícone
                </p>
                <input type="hidden" name="icone" id="icone-val" value="<?= esc($val('icone', 'ph-scales')) ?>">

                <!-- Preview do ícone seleccionado -->
                <div style="width:60px; height:60px; background:#373737; display:flex;
                             align-items:center; justify-content:center; margin-bottom:1rem;">
                    <i class="ph <?= esc($val('icone', 'ph-scales')) ?> icone-preview"
                       style="font-size:1.8rem; color:#fff;"></i>
                </div>

                <!-- Grelha de ícones -->
                <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:6px;">
                    <?php foreach ($icones as $ico): ?>
                    <button type="button"
                            onclick="selectIcone('<?= $ico ?>')"
                            data-ico="<?= $ico ?>"
                            style="width:100%; aspect-ratio:1; display:flex; align-items:center;
                                    justify-content:center; border:1px solid #E5E5E5;
                                    background:<?= $val('icone','ph-scales') === $ico ? '#373737' : 'transparent' ?>;
                                    cursor:pointer; transition:all 0.2s; padding:0;"
                            class="ico-btn">
                        <i class="ph <?= $ico ?>"
                           style="font-size:1.1rem;
                                   color:<?= $val('icone','ph-scales') === $ico ? '#fff' : '#555' ?>;"></i>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Flags -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Visibilidade
                </p>
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer; margin-bottom:0.85rem;">
                    <input type="checkbox" name="ativo" value="1"
                           <?= $val('ativo', 1) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Serviço activo</span>
                </label>
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="destaque" value="1"
                           <?= $val('destaque', 0) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Mostrar em destaque</span>
                </label>
            </div>

            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <?= view('admin/_field', ['label'=>'Ordem', 'name'=>'ordem', 'type'=>'number', 'value'=>$val('ordem', 0)]) ?>
            </div>
        </div>

        <!-- Principal -->
        <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem;" class="lg:col-span-2">

            <?= view('admin/_field', ['label'=>'Título do Serviço *', 'name'=>'titulo', 'value'=>$val('titulo'), 'required'=>true]) ?>

            <div style="margin-bottom:1.25rem;">
                <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                               text-transform:uppercase; color:#555; margin-bottom:8px;">
                    Descrição Curta
                </label>
                <textarea name="descricao" rows="4"
                          style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                  font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                  resize:vertical; outline:none; transition:border-color 0.2s;"
                          onfocus="this.style.borderColor='#373737'"
                          onblur="this.style.borderColor='#E5E5E5'"><?= esc($val('descricao')) ?></textarea>
            </div>

            <div style="margin-bottom:1.25rem;">
                <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                               text-transform:uppercase; color:#555; margin-bottom:8px;">
                    Conteúdo Detalhado
                    <span style="font-weight:400; color:#bbb; margin-left:6px;">suporta HTML</span>
                </label>
                <textarea name="conteudo" rows="10"
                          style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                  font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                  resize:vertical; outline:none; transition:border-color 0.2s;"
                          onfocus="this.style.borderColor='#373737'"
                          onblur="this.style.borderColor='#E5E5E5'"><?= esc($val('conteudo')) ?></textarea>
            </div>

            <div style="border-top:1px solid #F0F0F0; padding-top:1.5rem; display:flex; gap:10px;">
                <button type="submit"
                        style="padding:0.9rem 2rem; background:#373737; color:#fff; border:none;
                                cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                                display:inline-flex; align-items:center; gap:8px; transition:background 0.2s;"
                        onmouseover="this.style.background='#111'"
                        onmouseout="this.style.background='#373737'">
                    <i class="ph ph-floppy-disk"></i>
                    <?= $edit ? 'Guardar Alterações' : 'Criar Serviço' ?>
                </button>
                <a href="<?= base_url('admin/servicos') ?>"
                   style="padding:0.9rem 1.5rem; border:1px solid #E5E5E5; color:#777;
                           text-decoration:none; font-size:0.72rem; letter-spacing:0.15em;
                           text-transform:uppercase; display:inline-flex; align-items:center;
                           gap:8px; transition:all 0.2s;"
                   onmouseover="this.style.borderColor='#373737';this.style.color='#333'"
                   onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                    Cancelar
                </a>
            </div>

        </div>
    </div>
</form>

<script>
function selectIcone(ico) {
    document.getElementById('icone-val').value = ico;
    document.querySelectorAll('.icone-preview').forEach(el => {
        el.className = 'ph ' + ico + ' icone-preview';
    });
    document.querySelectorAll('.ico-btn').forEach(btn => {
        const active = btn.dataset.ico === ico;
        btn.style.background = active ? '#373737' : 'transparent';
        btn.querySelector('i').style.color = active ? '#fff' : '#555';
    });
}
</script>