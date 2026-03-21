<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Página Não Encontrada | Elite Jurídica</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Favicon -->
    <link rel="icon"             type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon.png') ?>">
    <link rel="icon"             type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180"                href="<?= base_url('assets/img/apple-touch-icon.png') ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload"
          href="https://fonts.googleapis.com/css2?family=Antonio:wght@300;400;600;700&display=swap"
          as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@300;400;600;700&display=swap" rel="stylesheet">
    </noscript>

    <!-- CSS compilado -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web" defer></script>

    <style>
        * { font-family: 'Antonio', sans-serif; box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #fff; min-height: 100vh; overflow-x: hidden; color: #111; }

        .line-decor {
            width: 1px;
            background: #E5E5E5;
            position: fixed;
            top: 0;
            bottom: 0;
            pointer-events: none;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-1 { animation: fadeUp 0.6s ease 0.1s both; }
        .fade-2 { animation: fadeUp 0.6s ease 0.22s both; }
        .fade-3 { animation: fadeUp 0.6s ease 0.34s both; }
        .fade-4 { animation: fadeUp 0.6s ease 0.46s both; }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #fff; }
        ::-webkit-scrollbar-thumb { background: #373737; }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 1rem 2rem; background: #373737; color: #fff;
            text-decoration: none; font-weight: 700; font-size: 0.72rem;
            letter-spacing: 0.2em; text-transform: uppercase; transition: background 0.2s;
        }
        .btn-primary:hover { background: #111; }

        .btn-ghost {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 1rem 2rem; border: 1px solid #E5E5E5; color: #555;
            text-decoration: none; font-weight: 400; font-size: 0.72rem;
            letter-spacing: 0.2em; text-transform: uppercase; transition: all 0.2s;
        }
        .btn-ghost:hover { border-color: #373737; color: #373737; }

        .quick-link {
            display: flex; align-items: center; gap: 8px;
            padding: 0.75rem 0; margin-right: 2rem;
            text-decoration: none; color: #555; font-size: 0.82rem;
            transition: color 0.2s; white-space: nowrap; border-bottom: 1px solid transparent;
        }
        .quick-link:hover { color: #111; border-bottom-color: #373737; }
    </style>
</head>
<body>

<!-- Linhas decorativas -->
<div class="line-decor" style="left: 8%;  opacity: 0.5;"></div>
<div class="line-decor" style="left: 25%; opacity: 0.3;"></div>
<div class="line-decor" style="right:25%; opacity: 0.3;"></div>
<div class="line-decor" style="right: 8%; opacity: 0.5;"></div>

<!-- ── HEADER ──────────────────────────────────── -->
<header style="position:fixed; top:0; left:0; right:0; z-index:50; height:64px;
                background:rgba(255,255,255,0.96); border-bottom:1px solid #E5E5E5;
                backdrop-filter:blur(10px); display:flex; align-items:center;
                padding:0 2.5rem; justify-content:space-between;">

    <!-- Logo -->
    <a href="<?= base_url('/') ?>" style="display:flex; align-items:center;">
        <img src="<?= base_url('assets/images/logo.png') ?>"
             alt="Elite Jurídica"
             style="height:40px; width:auto;">
    </a>

    <!-- Voltar -->
    <a href="<?= base_url('/') ?>"
       style="display:inline-flex; align-items:center; gap:6px; font-size:0.68rem;
               letter-spacing:0.15em; text-transform:uppercase; color:#aaa;
               text-decoration:none; transition:color 0.2s;"
       onmouseover="this.style.color='#373737'"
       onmouseout="this.style.color='#aaa'">
        <i class="ph ph-arrow-left" style="font-size:0.85rem;"></i>
        Página Inicial
    </a>

</header>


<!-- ── CONTEÚDO ────────────────────────────────── -->
<main style="min-height:100vh; display:flex; align-items:center;
              padding: 64px 1.5rem 0; position:relative; z-index:1;">

    <div style="max-width:700px; margin:0 auto; padding:5rem 0; width:100%;">

        <!-- Código -->
        <div class="fade-1"
             style="display:flex; align-items:center; gap:14px; margin-bottom:2rem;">
            <div style="width:40px; height:1px; background:#373737;"></div>
            <p style="font-weight:400; font-size:0.65rem; letter-spacing:0.3em;
                       text-transform:uppercase; color:#999;">
                Erro 404
            </p>
        </div>

        <!-- Número decorativo -->
        <div class="fade-1" style="position:relative; margin-bottom:1.5rem;">
            <span style="font-weight:700; font-size:clamp(6rem, 18vw, 13rem);
                          color:#F2F2F2; display:block; line-height:0.9; user-select:none;">
                404
            </span>
            <div style="position:absolute; left:0; bottom:-0.25rem;
                         width:56px; height:3px; background:#373737;"></div>
        </div>

        <!-- Título -->
        <h1 class="fade-2"
            style="font-weight:700; font-size:clamp(1.6rem, 4vw, 2.6rem);
                    color:#111; line-height:1.15; margin-bottom:1.1rem; margin-top:2rem;">
            Página Não Encontrada
        </h1>

        <!-- Descrição -->
        <p class="fade-3"
           style="font-weight:400; font-size:0.95rem; color:#777;
                   line-height:1.75; margin-bottom:2.5rem; max-width:460px;">
            A página que procura não existe, foi removida ou o endereço foi introduzido
            de forma incorrecta. Verifique o URL ou utilize os links abaixo.
        </p>

        <!-- Botões -->
        <div class="fade-4" style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:3.5rem;">
            <a href="<?= base_url('/') ?>" class="btn-primary">
                <i class="ph ph-house" style="font-size:1rem;"></i>
                Voltar ao Início
            </a>
            <a href="<?= base_url('contact') ?>" class="btn-ghost">
                <i class="ph ph-envelope" style="font-size:1rem;"></i>
                Contactar
            </a>
        </div>

        <!-- Links rápidos -->
        <div class="fade-4" style="border-top:1px solid #EBEBEB; padding-top:2rem;">
            <p style="font-weight:700; font-size:0.62rem; letter-spacing:0.22em;
                       text-transform:uppercase; color:#bbb; margin-bottom:1.1rem;">
                Páginas Úteis
            </p>
            <div style="display:flex; flex-wrap:wrap;">
                <?php
                $links = [
                    ['url'=>'servicos', 'label'=>'Serviços',  'icone'=>'ph-scales'],
                    ['url'=>'equipe',   'label'=>'Equipa',    'icone'=>'ph-users-three'],
                    ['url'=>'noticias', 'label'=>'Notícias',  'icone'=>'ph-newspaper'],
                    ['url'=>'about',    'label'=>'Sobre Nós', 'icone'=>'ph-buildings'],
                    ['url'=>'contact',  'label'=>'Contacto',  'icone'=>'ph-envelope'],
                ];
                foreach ($links as $l): ?>
                <a href="<?= base_url($l['url']) ?>" class="quick-link">
                    <i class="ph <?= $l['icone'] ?>" style="font-size:0.95rem; color:#ccc;"></i>
                    <?= $l['label'] ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</main>


<!-- ── FOOTER MÍNIMO ──────────────────────────── -->
<footer style="border-top:1px solid #F0F0F0; padding:1.25rem 2.5rem;
                display:flex; align-items:center; justify-content:space-between;
                flex-wrap:wrap; gap:1rem; position:relative; z-index:1;">
    <p style="font-size:0.68rem; color:#ccc; font-weight:400; letter-spacing:0.05em;">
        © <?= date('Y') ?> Elite Jurídica — Todos os direitos reservados
    </p>
    <a href="<?= base_url('/') ?>"
       style="font-size:0.65rem; color:#ccc; text-decoration:none; display:inline-flex;
               align-items:center; gap:5px; letter-spacing:0.12em; text-transform:uppercase;
               transition:color 0.2s;"
       onmouseover="this.style.color='#373737'"
       onmouseout="this.style.color='#ccc'">
        <i class="ph ph-arrow-left" style="font-size:0.8rem;"></i>
        Voltar ao site
    </a>
</footer>

</body>
</html>