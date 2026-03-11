<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Registo') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        * { font-family: 'Antonio', sans-serif; }
        .auth-input:focus { outline:none; border-color:#373737 !important; box-shadow:0 0 0 3px rgba(55,55,55,0.07); }
        .auth-input::placeholder { color:#C8C8C8; }
    </style>
</head>
<body style="background:#F7F7F7; min-height:100vh; display:flex; align-items:center;
              justify-content:center; padding:2rem 1rem;">

<div style="width:100%; max-width:460px;">

    <!-- Logo -->
    <div style="text-align:center; margin-bottom:2rem;">
        <a href="<?= base_url('/') ?>"
           style="display:inline-flex; align-items:center; gap:10px; text-decoration:none;">
            <div style="width:40px; height:40px; background:#373737; display:flex;
                         align-items:center; justify-content:center;">
                <i class="ph ph-scales-fill" style="font-size:1.2rem; color:#fff;"></i>
            </div>
            <div style="text-align:left;">
                <p style="font-weight:700; font-size:1rem; color:#111;
                           text-transform:uppercase; letter-spacing:0.05em; line-height:1;">
                    Advocacia
                </p>
                <p style="font-weight:400; font-size:0.58rem; color:#aaa;
                           letter-spacing:0.2em; text-transform:uppercase; margin-top:2px;">
                    Área Administrativa
                </p>
            </div>
        </a>
    </div>

    <!-- Card -->
    <div style="background:#fff; border:1px solid #E5E5E5; padding:2.5rem;">

        <h2 style="font-weight:700; font-size:1.5rem; color:#111; margin-bottom:0.4rem;">
            Criar Conta
        </h2>
        <p style="font-weight:400; font-size:0.85rem; color:#999; margin-bottom:1.75rem;">
            Preencha os dados para criar o seu acesso.
        </p>

        <!-- Erros -->
        <?php if (!empty($errors)): ?>
        <div style="background:#FEF2F2; border-left:3px solid #DC2626;
                     padding:0.9rem 1rem; margin-bottom:1.25rem;">
            <p style="font-weight:700; font-size:0.68rem; letter-spacing:0.1em;
                       text-transform:uppercase; color:#DC2626; margin-bottom:6px;">
                Corrija os seguintes erros:
            </p>
            <ul style="padding-left:1rem; margin:0;">
                <?php foreach ($errors as $e): ?>
                <li style="font-size:0.85rem; color:#666;"><?= esc($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="POST" id="form-register">
            <?= csrf_field() ?>

            <!-- Nome -->
            <div style="margin-bottom:1rem;">
                <label style="display:block; font-weight:700; font-size:0.68rem;
                               letter-spacing:0.15em; text-transform:uppercase;
                               color:#555; margin-bottom:8px;">
                    Nome Completo <span style="color:#DC2626;">*</span>
                </label>
                <div style="position:relative;">
                    <i class="ph ph-user" style="position:absolute; left:12px; top:50%;
                        transform:translateY(-50%); font-size:1rem; color:#aaa;"></i>
                    <input type="text" name="nome" required
                           value="<?= esc(old('nome')) ?>"
                           placeholder="O seu nome completo"
                           class="auth-input"
                           style="width:100%; padding:0.85rem 1rem 0.85rem 2.5rem;
                                   border:1px solid <?= !empty($errors['nome'])?'#DC2626':'#E5E5E5' ?>;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;">
                </div>
            </div>

            <!-- Email -->
            <div style="margin-bottom:1rem;">
                <label style="display:block; font-weight:700; font-size:0.68rem;
                               letter-spacing:0.15em; text-transform:uppercase;
                               color:#555; margin-bottom:8px;">
                    Email <span style="color:#DC2626;">*</span>
                </label>
                <div style="position:relative;">
                    <i class="ph ph-envelope" style="position:absolute; left:12px; top:50%;
                        transform:translateY(-50%); font-size:1rem; color:#aaa;"></i>
                    <input type="email" name="email" required
                           value="<?= esc(old('email')) ?>"
                           placeholder="email@exemplo.com"
                           class="auth-input"
                           style="width:100%; padding:0.85rem 1rem 0.85rem 2.5rem;
                                   border:1px solid <?= !empty($errors['email'])?'#DC2626':'#E5E5E5' ?>;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;">
                </div>
            </div>

            <!-- Password -->
            <div style="margin-bottom:1rem;">
                <label style="display:block; font-weight:700; font-size:0.68rem;
                               letter-spacing:0.15em; text-transform:uppercase;
                               color:#555; margin-bottom:8px;">
                    Password <span style="color:#DC2626;">*</span>
                </label>
                <div style="position:relative;">
                    <i class="ph ph-lock" style="position:absolute; left:12px; top:50%;
                        transform:translateY(-50%); font-size:1rem; color:#aaa;"></i>
                    <input type="password" name="password" id="inp-pass1" required
                           placeholder="Mínimo 6 caracteres"
                           class="auth-input"
                           style="width:100%; padding:0.85rem 2.5rem 0.85rem 2.5rem;
                                   border:1px solid <?= !empty($errors['password'])?'#DC2626':'#E5E5E5' ?>;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;">
                    <button type="button" onclick="togglePass('inp-pass1','ico-p1')"
                            style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                                    background:none; border:none; cursor:pointer; padding:0;">
                        <i class="ph ph-eye" id="ico-p1" style="font-size:1rem; color:#aaa;"></i>
                    </button>
                </div>
            </div>

            <!-- Confirmar Password -->
            <div style="margin-bottom:1.75rem;">
                <label style="display:block; font-weight:700; font-size:0.68rem;
                               letter-spacing:0.15em; text-transform:uppercase;
                               color:#555; margin-bottom:8px;">
                    Confirmar Password <span style="color:#DC2626;">*</span>
                </label>
                <div style="position:relative;">
                    <i class="ph ph-lock-key" style="position:absolute; left:12px; top:50%;
                        transform:translateY(-50%); font-size:1rem; color:#aaa;"></i>
                    <input type="password" name="password_confirm" id="inp-pass2" required
                           placeholder="Repita a password"
                           class="auth-input"
                           style="width:100%; padding:0.85rem 2.5rem 0.85rem 2.5rem;
                                   border:1px solid <?= !empty($errors['password_confirm'])?'#DC2626':'#E5E5E5' ?>;
                                   font-family:'Antonio',sans-serif; font-size:0.9rem; color:#333;">
                    <button type="button" onclick="togglePass('inp-pass2','ico-p2')"
                            style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                                    background:none; border:none; cursor:pointer; padding:0;">
                        <i class="ph ph-eye" id="ico-p2" style="font-size:1rem; color:#aaa;"></i>
                    </button>
                </div>
                <?php if (!empty($errors['password_confirm'])): ?>
                <p style="font-size:0.75rem; color:#DC2626; margin-top:4px;">
                    <?= esc($errors['password_confirm']) ?>
                </p>
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <button type="submit" id="btn-submit"
                    style="width:100%; padding:1rem; background:#373737; color:#fff; border:none;
                            cursor:pointer; font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:0.78rem; letter-spacing:0.2em; text-transform:uppercase;
                            display:flex; align-items:center; justify-content:center; gap:10px;
                            transition:background 0.2s;"
                    onmouseover="this.style.background='#111'"
                    onmouseout="this.style.background='#373737'">
                <i class="ph ph-user-plus" style="font-size:1rem;"></i>
                Criar Conta
            </button>

        </form>

    </div>

    <!-- Link login -->
    <p style="text-align:center; margin-top:1.25rem; font-size:0.82rem; color:#aaa;">
        Já tem conta?
        <a href="<?= base_url('login') ?>"
           style="color:#373737; font-weight:700; text-decoration:none;
                   border-bottom:1px solid #373737; padding-bottom:1px;">
            Entrar
        </a>
    </p>

    <p style="text-align:center; margin-top:0.75rem;">
        <a href="<?= base_url('/') ?>"
           style="font-size:0.72rem; color:#bbb; text-decoration:none;
                   display:inline-flex; align-items:center; gap:5px; transition:color 0.2s;"
           onmouseover="this.style.color='#373737'"
           onmouseout="this.style.color='#bbb'">
            <i class="ph ph-arrow-left" style="font-size:0.8rem;"></i>
            Voltar ao site
        </a>
    </p>

</div>

<script>
function togglePass(inputId, iconId) {
    const inp = document.getElementById(inputId);
    const ico = document.getElementById(iconId);
    if (inp.type === 'password') {
        inp.type = 'text';
        ico.className = 'ph ph-eye-slash';
    } else {
        inp.type = 'password';
        ico.className = 'ph ph-eye';
    }
    ico.style.fontSize = '1rem';
    ico.style.color = '#aaa';
}

document.getElementById('form-register').addEventListener('submit', function() {
    const btn = document.getElementById('btn-submit');
    btn.disabled = true;
    btn.style.background = '#777';
    btn.innerHTML = '<i class="ph ph-circle-notch ph-spin" style="font-size:1rem;"></i> A criar...';
});
</script>
</body>
</html>