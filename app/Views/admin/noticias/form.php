<?php
$edit        = !empty($noticia);
$page_titulo = $edit ? 'Editar Artigo' : 'Nova Notícia';
$page_icon   = 'ph-pencil-line';
$page_desc   = $edit ? esc($noticia['titulo']) : 'Escreva e publique um novo artigo.';
$back_url    = 'admin/noticias';

$action = $edit
    ? base_url('admin/noticias/actualizar/' . $noticia['id'])
    : base_url('admin/noticias/guardar');

$val = fn(string $k, $def = '') => old($k, $noticia[$k] ?? $def);

$categorias = ['Direito Laboral','Direito Empresarial','Direito Civil','Direito Penal',
               'Direito de Família','Direito Imobiliário','Direito Administrativo','Direito Fiscal'];
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- Lateral -->
        <div style="display:flex; flex-direction:column; gap:6px;">

            <!-- Imagem de capa -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Imagem de Capa
                </p>
                <div id="img-preview"
                     style="width:100%; aspect-ratio:16/9; background:#F0F0F0; overflow:hidden;
                             border:1px solid #E5E5E5; margin-bottom:1rem;">
                    <?php if (!empty($noticia['imagem'])): ?>
                    <img src="<?= base_url($noticia['imagem']) ?>"
                         style="width:100%; height:100%; object-fit:cover;">
                    <?php else: ?>
                    <div style="width:100%; height:100%; display:flex; flex-direction:column;
                                 align-items:center; justify-content:center; gap:8px;">
                        <i class="ph ph-image" style="font-size:2rem; color:#ccc;"></i>
                        <p style="font-size:0.72rem; color:#bbb;">16:9</p>
                    </div>
                    <?php endif; ?>
                </div>
                <label style="display:flex; align-items:center; justify-content:center; gap:8px;
                               padding:0.75rem; border:1px dashed #E5E5E5; cursor:pointer;
                               font-size:0.72rem; color:#777; text-transform:uppercase;
                               letter-spacing:0.1em; transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#777'">
                    <i class="ph ph-upload-simple"></i> Escolher Imagem
                    <input type="file" name="imagem" accept="image/*" style="display:none;"
                           onchange="previewImg(this)">
                </label>
            </div>

            <!-- Meta -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;
                         display:flex; flex-direction:column; gap:1rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555;">
                    Meta
                </p>

                <!-- Categoria -->
                <div>
                    <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                                   text-transform:uppercase; color:#555; margin-bottom:8px;">
                        Categoria
                    </label>
                    <select name="categoria"
                            style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                    font-family:'Antonio',sans-serif; font-size:0.88rem; color:#333;
                                    outline:none; background:#fff; cursor:pointer;"
                            onfocus="this.style.borderColor='#373737'"
                            onblur="this.style.borderColor='#E5E5E5'">
                        <option value="">Sem categoria</option>
                        <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat ?>"
                                <?= $val('categoria') === $cat ? 'selected' : '' ?>>
                            <?= $cat ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?= view('admin/_field', ['label'=>'Autor', 'name'=>'autor', 'value'=>$val('autor', session('user_nome'))]) ?>

                <!-- Data de publicação -->
                <div>
                    <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                                   text-transform:uppercase; color:#555; margin-bottom:8px;">
                        Data de Publicação
                    </label>
                    <input type="datetime-local" name="publicado_em"
                           value="<?= $edit && !empty($noticia['publicado_em'])
                                    ? date('Y-m-d\TH:i', strtotime($noticia['publicado_em']))
                                    : date('Y-m-d\TH:i') ?>"
                           style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                   font-family:'Antonio',sans-serif; font-size:0.88rem; color:#333;
                                   outline:none; transition:border-color 0.2s;"
                           onfocus="this.style.borderColor='#373737'"
                           onblur="this.style.borderColor='#E5E5E5'">
                </div>
            </div>

            <!-- Flags -->
            <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:1rem;">
                    Publicação
                </p>
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer; margin-bottom:0.85rem;">
                    <input type="checkbox" name="publicado" value="1"
                           <?= $val('publicado', 1) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Artigo publicado</span>
                </label>
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="destaque" value="1"
                           <?= $val('destaque', 0) ? 'checked' : '' ?>
                           style="width:16px; height:16px; accent-color:#373737;">
                    <span style="font-size:0.88rem; color:#333;">Mostrar em destaque</span>
                </label>
            </div>

        </div>

        <!-- Conteúdo principal -->
        <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem;" class="lg:col-span-2">

            <?= view('admin/_field', ['label'=>'Título do Artigo *', 'name'=>'titulo', 'value'=>$val('titulo'), 'required'=>true]) ?>

            <div style="margin-bottom:1.25rem;">
                <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                               text-transform:uppercase; color:#555; margin-bottom:8px;">
                    Resumo *
                    <span style="font-weight:400; color:#bbb; margin-left:4px;">aparece nas listagens</span>
                </label>
                <textarea name="resumo" rows="3" required
                          style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                  font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;
                                  resize:vertical; outline:none; transition:border-color 0.2s;"
                          onfocus="this.style.borderColor='#373737'"
                          onblur="this.style.borderColor='#E5E5E5'"><?= esc($val('resumo')) ?></textarea>
            </div>

            <div style="margin-bottom:1.25rem;">
                <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                               text-transform:uppercase; color:#555; margin-bottom:8px;">
                    Conteúdo
                    <span style="font-weight:400; color:#bbb; margin-left:4px;">suporta HTML</span>
                </label>
                <textarea name="conteudo" rows="16"
                          style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                                  font-family:'Antonio',sans-serif; font-size:0.88rem; color:#333;
                                  resize:vertical; outline:none; transition:border-color 0.2s;
                                  font-weight:400; line-height:1.5;"
                          onfocus="this.style.borderColor='#373737'"
                          onblur="this.style.borderColor='#E5E5E5'"><?= esc($val('conteudo')) ?></textarea>
                <p style="font-size:0.68rem; color:#bbb; margin-top:6px;">
                    Utilize tags HTML: &lt;p&gt;, &lt;h3&gt;, &lt;strong&gt;, &lt;ul&gt;&lt;li&gt;, &lt;blockquote&gt;
                </p>
            </div>

            <div style="border-top:1px solid #F0F0F0; padding-top:1.5rem; display:flex; gap:10px; flex-wrap:wrap;">
                <button type="submit"
                        style="padding:0.9rem 2rem; background:#373737; color:#fff; border:none;
                                cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                                display:inline-flex; align-items:center; gap:8px; transition:background 0.2s;"
                        onmouseover="this.style.background='#111'"
                        onmouseout="this.style.background='#373737'">
                    <i class="ph ph-floppy-disk"></i>
                    <?= $edit ? 'Guardar Alterações' : 'Publicar Artigo' ?>
                </button>
                <a href="<?= base_url('admin/noticias') ?>"
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
function previewImg(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('img-preview').innerHTML =
            '<img src="' + e.target.result + '" style="width:100%;height:100%;object-fit:cover;">';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>