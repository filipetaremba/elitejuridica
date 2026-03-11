<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        * { font-family: 'Antonio', sans-serif; }
        .auth-input:focus { outline:none; border-color:#373737 !important; box-shadow:0 0 0 3px rgba(55,55,55,0.07); }
        .auth-input::placeholder { color:#C8C8C8; }
    </style>
</head>
<body style="background:#F7F7F7; min-height:100vh; display:flex; align-items:center; justify-content:center;">

<div style="width:100%; max-width:420px; padding:1rem;">

    <!-- Logo -->
    <div style="text-align:center; margin-bottom:2.5rem;">
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
            Entrar
        </h2>
        <p style="font-weight:400; font-size:0.85rem; color:#999; margin-bottom:1.75rem;">
            Aceda à área de gestão do escritório.
        </p>

        <!-- Flash success (vindo do registo ou logout) -->
        <?php if ($success = session()->getFlashdata('success')): ?>
        <div style="background:#F0FFF4; border-left:3px solid #373737; padding:0.75rem 1rem;
                     margin-bottom:1.25rem; display:flex; align-items:center; gap:8px;">
            <i class="ph ph-check-circle" style="color:#373737; font-size:1rem;"></i>
            <p style="font-size:0.85rem; color:#333;"><?= esc($success) ?></p>
        </div>
        <?php endif; ?>

        <!-- Error -->
        <?php if (!empty($error)): ?>
        <div style="background:#FEF2F2; border-left:3px solid #DC2626; padding:0.75rem 1rem;
                     margin-bottom:1.25rem; display:flex; align-items:center; gap:8px;">
            <i class="ph ph-warning-circle" style="color:#DC2626; font-size:1rem;"></i>
            <p style="font-size:0.85rem; color:#DC2626;"><?= esc($error) ?></p>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST" id="form-login">
            <?= csrf_field() ?>

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
                                   border:1px solid #E5E5E5; font-family:'Antonio',sans-serif;
                                   font-size:0.9rem; color:#333;">
                </div>
            </div>

            <!-- Password -->
            <div style="margin-bottom:1.5rem;">
                <label style="display:block; font-weight:700; font-size:0.68rem;
                               letter-spacing:0.15em; text-transform:uppercase;
                               color:#555; margin-bottom:8px;">
                    Password <span style="color:#DC2626;">*</span>
                </label>
                <div style="position:relative;">
                    <i class="ph ph-lock" style="position:absolute; left:12px; top:50%;
                        transform:translateY(-50%); font-size:1rem; color:#aaa;"></i>
                    <input type="password" name="password" id="inp-password" required
                           placeholder="••••••••"
                           class="auth-input"
                           style="width:100%; padding:0.85rem 2.5rem 0.85rem 2.5rem;
                                   border:1px solid #E5E5E5; font-family:'Antonio',sans-serif;
                                   font-size:0.9rem; color:#333;">
                    <button type="button" onclick="togglePass()"
                            style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                                    background:none; border:none; cursor:pointer; padding:0;">
                        <i class="ph ph-eye" id="ico-pass" style="font-size:1rem; color:#aaa;"></i>
                    </button>
                </div>
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
                <i class="ph ph-sign-in" style="font-size:1rem;"></i>
                Entrar
            </button>

        </form>

    </div>

    <!-- Link registo -->
    <p style="text-align:center; margin-top:1.25rem; font-size:0.82rem; color:#aaa;">
        Não tem conta?
        <a href="<?= base_url('register') ?>"
           style="color:#373737; font-weight:700; text-decoration:none;
                   border-bottom:1px solid #373737; padding-bottom:1px;">
            Criar conta
        </a>
    </p>

    <!-- Voltar ao site -->
    <p style="text-align:center; margin-top:0.75rem;">
        <a href="<?= base_url('/') ?>"
           style="font-size:0.72rem; color:#bbb; text-decoration:none;
                   display:inline-flex; align-items:center; gap:5px;
                   transition:color 0.2s;"
           onmouseover="this.style.color='#373737'"
           onmouseout="this.style.color='#bbb'">
            <i class="ph ph-arrow-left" style="font-size:0.8rem;"></i>
            Voltar ao site
        </a>
    </p>

</div>

<script>
function togglePass() {
    const inp = document.getElementById('inp-password');
    const ico = document.getElementById('ico-pass');
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

document.getElementById('form-login').addEventListener('submit', function() {
    const btn = document.getElementById('btn-submit');
    btn.disabled = true;
    btn.style.background = '#777';
    btn.innerHTML = '<i class="ph ph-circle-notch ph-spin" style="font-size:1rem;"></i> A entrar...';
});
</script>
</body>
</html>