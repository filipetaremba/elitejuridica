<?php
$edit        = !empty($utilizador);
$page_titulo = $edit ? 'Editar Utilizador' : 'Novo Utilizador';
$page_icon   = 'ph-user-gear';
$page_desc   = $edit ? esc($utilizador['nome']) : 'Crie um novo acesso à área administrativa.';
$back_url    = 'admin/utilizadores';

$action = $edit
    ? base_url('admin/utilizadores/actualizar/' . $utilizador['id'])
    : base_url('admin/utilizadores/guardar');

$val = fn(string $k, $def = '') => old($k, $utilizador[$k] ?? $def);
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<div style="max-width:600px;">
<form action="<?= $action ?>" method="POST">
    <?= csrf_field() ?>

    <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem;
                 display:flex; flex-direction:column; gap:1.25rem;">

        <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                   text-transform:uppercase; color:#aaa;">
            Dados de Acesso
        </p>

        <?= view('admin/_field', ['label'=>'Nome Completo *', 'name'=>'nome', 'value'=>$val('nome'), 'required'=>true]) ?>
        <?= view('admin/_field', ['label'=>'Email *', 'name'=>'email', 'value'=>$val('email'), 'type'=>'email', 'required'=>true]) ?>

        <!-- Role -->
        <div>
            <label style="display:block; font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                           text-transform:uppercase; color:#555; margin-bottom:8px;">
                Papel / Permissão *
            </label>
            <select name="role"
                    style="width:100%; padding:0.85rem 1rem; border:1px solid #E5E5E5;
                            font-family:'Antonio',sans-serif; font-size:0.88rem; color:#333;
                            outline:none; background:#fff; cursor:pointer;"
                    onfocus="this.style.borderColor='#373737'"
                    onblur="this.style.borderColor='#E5E5E5'">
                <option value="editor" <?= $val('role','editor') === 'editor' ? 'selected' : '' ?>>
                    Editor — pode criar e editar conteúdo
                </option>
                <option value="admin" <?= $val('role') === 'admin' ? 'selected' : '' ?>>
                    Admin — acesso total incluindo utilizadores
                </option>
            </select>
        </div>

        <!-- Separador password -->
        <div style="border-top:1px solid #F0F0F0; padding-top:1.25rem;">
            <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.12em;
                       text-transform:uppercase; color:#aaa; margin-bottom:1rem;">
                <?= $edit ? 'Alterar Password (opcional)' : 'Password *' ?>
            </p>

            <?= view('admin/_field', [
                'label'       => $edit ? 'Nova Password' : 'Password *',
                'name'        => 'password',
                'type'        => 'password',
                'placeholder' => $edit ? 'Deixe vazio para não alterar' : 'Mínimo 6 caracteres',
                'required'    => !$edit,
            ]) ?>
        </div>

        <!-- Estado -->
        <div>
            <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                <input type="checkbox" name="ativo" value="1"
                       <?= $val('ativo', 1) ? 'checked' : '' ?>
                       style="width:16px; height:16px; accent-color:#373737;">
                <span style="font-size:0.88rem; color:#333;">Conta activa</span>
            </label>
        </div>

        <!-- Submit -->
        <div style="border-top:1px solid #F0F0F0; padding-top:1.25rem; display:flex; gap:10px;">
            <button type="submit"
                    style="padding:0.9rem 2rem; background:#373737; color:#fff; border:none;
                            cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                            display:inline-flex; align-items:center; gap:8px; transition:background 0.2s;"
                    onmouseover="this.style.background='#111'"
                    onmouseout="this.style.background='#373737'">
                <i class="ph ph-floppy-disk"></i>
                <?= $edit ? 'Guardar Alterações' : 'Criar Utilizador' ?>
            </button>
            <a href="<?= base_url('admin/utilizadores') ?>"
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
</form>
</div>