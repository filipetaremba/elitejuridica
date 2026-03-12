<?php
/**
 * View: admin/dashboard/perfil.php
 * Dados: $errors[]
 */
$page_titulo = 'Meu Perfil';
$page_icon   = 'ph-user-circle';
$page_desc   = 'Actualize os seus dados de acesso.';
$back_url    = 'admin';
?>

<?= view('admin/_page_header') ?>
<?= view('admin/_alerts') ?>

<div class="grid lg:grid-cols-3 gap-6">

    <!-- ── Lateral: avatar + info ──────────────────── -->
    <div style="display:flex; flex-direction:column; gap:6px;">

        <!-- Card do utilizador -->
        <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem; text-align:center;">
            <div style="width:72px; height:72px; background:#373737;
                         display:flex; align-items:center; justify-content:center;
                         margin:0 auto 1rem;">
                <i class="ph ph-user" style="font-size:1.8rem; color:#fff;"></i>
            </div>
            <p style="font-weight:700; font-size:1rem; color:#111; line-height:1.2;">
                <?= esc(session('user_nome')) ?>
            </p>
            <p style="font-weight:400; font-size:0.68rem; letter-spacing:0.15em;
                       text-transform:uppercase; color:#aaa; margin-top:5px;">
                <?= esc(session('user_role')) ?>
            </p>
            <p style="font-weight:400; font-size:0.82rem; color:#bbb; margin-top:6px;
                       word-break:break-all;">
                <?= esc(session('user_email')) ?>
            </p>
        </div>

        <!-- Nota informativa -->
        <div style="background:#F7F7F7; border:1px solid #E5E5E5; padding:1rem;
                     display:flex; gap:10px; align-items:flex-start;">
            <i class="ph ph-info" style="font-size:1rem; color:#bbb; flex-shrink:0; margin-top:1px;"></i>
            <p style="font-weight:400; font-size:0.78rem; color:#aaa; line-height:1.6;">
                A password só é alterada se preencher os campos correspondentes.
                Deixe em branco para manter a actual.
            </p>
        </div>

        <!-- Link para o site -->
        <a href="<?= base_url('/') ?>" target="_blank"
           style="display:flex; align-items:center; justify-content:center; gap:8px;
                   padding:0.85rem; border:1px solid #E5E5E5; background:#fff; color:#777;
                   text-decoration:none; font-size:0.7rem; font-weight:400; letter-spacing:0.12em;
                   text-transform:uppercase; transition:all 0.2s;"
           onmouseover="this.style.borderColor='#373737'; this.style.color='#373737'"
           onmouseout="this.style.borderColor='#E5E5E5'; this.style.color='#777'">
            <i class="ph ph-globe" style="font-size:0.95rem;"></i>
            Ver Site
            <i class="ph ph-arrow-square-out" style="font-size:0.8rem;"></i>
        </a>

    </div>

    <!-- ── Formulário ─────────────────────────────── -->
    <div style="background:#fff; border:1px solid #E5E5E5; padding:2rem;" class="lg:col-span-2">

        <form action="<?= base_url('admin/perfil') ?>" method="POST">
            <?= csrf_field() ?>

            <!-- Dados básicos -->
            <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.15em;
                       text-transform:uppercase; color:#aaa; margin-bottom:1.25rem;">
                Dados Pessoais
            </p>

            <div class="grid md:grid-cols-2 gap-x-6">
                <?= view('admin/_field', [
                    'label'    => 'Nome Completo *',
                    'name'     => 'nome',
                    'value'    => old('nome', session('user_nome')),
                    'required' => true,
                ]) ?>
                <?= view('admin/_field', [
                    'label'    => 'Email *',
                    'name'     => 'email',
                    'type'     => 'email',
                    'value'    => old('email', session('user_email')),
                    'required' => true,
                ]) ?>
            </div>

            <!-- Alterar password -->
            <div style="border-top:1px solid #F0F0F0; margin:1.5rem 0; padding-top:1.5rem;">
                <p style="font-weight:700; font-size:0.65rem; letter-spacing:0.15em;
                           text-transform:uppercase; color:#aaa; margin-bottom:1.25rem;">
                    Alterar Password
                    <span style="font-weight:400; color:#ccc; margin-left:6px;">opcional</span>
                </p>

                <div class="grid md:grid-cols-2 gap-x-6">
                    <!-- Nova password -->
                    <div style="margin-bottom:1.25rem;">
                        <label style="display:block; font-weight:700; font-size:0.65rem;
                                       letter-spacing:0.12em; text-transform:uppercase;
                                       color:#555; margin-bottom:8px;">
                            Nova Password
                        </label>
                        <div style="position:relative;">
                            <input type="password" name="password" id="inp-pw1"
                                   placeholder="Mínimo 6 caracteres"
                                   style="width:100%; padding:0.85rem 2.5rem 0.85rem 1rem;
                                           border:1px solid #E5E5E5; font-family:'Antonio',sans-serif;
                                           font-size:0.9rem; color:#333; outline:none;
                                           transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#373737'"
                                   onblur="this.style.borderColor='#E5E5E5'">
                            <button type="button" onclick="togglePw('inp-pw1','ico-pw1')"
                                    style="position:absolute; right:10px; top:50%; transform:translateY(-50%);
                                            background:none; border:none; cursor:pointer; padding:0;">
                                <i class="ph ph-eye" id="ico-pw1" style="font-size:1rem; color:#bbb;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirmar password -->
                    <div style="margin-bottom:1.25rem;">
                        <label style="display:block; font-weight:700; font-size:0.65rem;
                                       letter-spacing:0.12em; text-transform:uppercase;
                                       color:#555; margin-bottom:8px;">
                            Confirmar Nova Password
                        </label>
                        <div style="position:relative;">
                            <input type="password" name="password_confirm" id="inp-pw2"
                                   placeholder="Repita a password"
                                   style="width:100%; padding:0.85rem 2.5rem 0.85rem 1rem;
                                           border:1px solid #E5E5E5; font-family:'Antonio',sans-serif;
                                           font-size:0.9rem; color:#333; outline:none;
                                           transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#373737'"
                                   onblur="this.style.borderColor='#E5E5E5'">
                            <button type="button" onclick="togglePw('inp-pw2','ico-pw2')"
                                    style="position:absolute; right:10px; top:50%; transform:translateY(-50%);
                                            background:none; border:none; cursor:pointer; padding:0;">
                                <i class="ph ph-eye" id="ico-pw2" style="font-size:1rem; color:#bbb;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acções -->
            <div style="border-top:1px solid #F0F0F0; padding-top:1.5rem;
                         display:flex; gap:10px; flex-wrap:wrap;">
                <button type="submit"
                        style="padding:0.9rem 2rem; background:#373737; color:#fff; border:none;
                                cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                                display:inline-flex; align-items:center; gap:8px; transition:background 0.2s;"
                        onmouseover="this.style.background='#111'"
                        onmouseout="this.style.background='#373737'">
                    <i class="ph ph-floppy-disk" style="font-size:1rem;"></i>
                    Guardar Alterações
                </button>
                <a href="<?= base_url('admin') ?>"
                   style="padding:0.9rem 1.5rem; border:1px solid #E5E5E5; color:#777;
                           text-decoration:none; font-weight:400; font-size:0.72rem;
                           letter-spacing:0.15em; text-transform:uppercase; display:inline-flex;
                           align-items:center; gap:8px; transition:all 0.2s;"
                   onmouseover="this.style.borderColor='#373737'; this.style.color='#333'"
                   onmouseout="this.style.borderColor='#E5E5E5'; this.style.color='#777'">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</div>

<script>
function togglePw(inputId, iconId) {
    const inp = document.getElementById(inputId);
    const ico = document.getElementById(iconId);
    const isPass = inp.type === 'password';
    inp.type = isPass ? 'text' : 'password';
    ico.className = isPass ? 'ph ph-eye-slash' : 'ph ph-eye';
    ico.style.fontSize = '1rem';
    ico.style.color = '#bbb';
}
</script>