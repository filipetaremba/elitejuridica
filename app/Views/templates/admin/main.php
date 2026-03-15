<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Admin') ?> — Advocacia</title>
    <meta name="robots" content="noindex, nofollow"><!-- Admin nunca indexa no Google -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32.png') ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload"
          href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&display=swap"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&display=swap" rel="stylesheet">
    </noscript>

    <!-- CSS compilado (Tailwind build) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <!-- Phosphor Icons (local) -->
    <script src="<?= base_url('assets/js/vendor/phosphor.min.js') ?>" defer></script>

    <style>
        * { font-family: 'Antonio', sans-serif; box-sizing: border-box; }

        ::-webkit-scrollbar       { width: 4px; }
        ::-webkit-scrollbar-track { background: #F7F7F7; }
        ::-webkit-scrollbar-thumb { background: #373737; }

        /* Sidebar */
        #sidebar { transition: transform 0.3s ease; }
        #sidebar-overlay { display: none; }
        @media (max-width: 1023px) {
            #sidebar         { transform: translateX(-100%); }
            #sidebar.open    { transform: translateX(0); }
            #sidebar-overlay.open { display: block; }
            #main-content    { margin-left: 0 !important; }
        }

        /* Fade entrada do conteúdo */
        .admin-fade {
            animation: adminFadeIn 0.35s ease forwards;
        }
        @keyframes adminFadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Hover dos links da sidebar — sem JS inline */
        .nav-link { transition: background 0.2s, color 0.2s; }
        .nav-link:not(.nav-link--active):hover {
            background: rgba(255,255,255,0.08) !important;
            color: #fff !important;
        }
        .nav-link--active {
            background: #fff;
            color: #373737;
            font-weight: 700;
        }

        /* Hover botões do topbar */
        .topbar-btn { transition: border-color 0.2s, color 0.2s; }
        .topbar-btn:hover { border-color: #373737 !important; color: #373737 !important; }

        /* Hover user/logout sidebar */
        .sidebar-user:hover  { background: rgba(255,255,255,0.08); }
        .sidebar-logout:hover { background: rgba(255,255,255,0.15) !important; color: #fff !important; }

        /* Flash */
        .flash { transition: opacity 0.5s; }
    </style>

    <?= $extra_head ?? '' ?>
</head>

<body class="min-h-screen" style="background: #F7F7F7;">

<!-- ═══════════════════════════════════
     SIDEBAR
═══════════════════════════════════ -->
<aside id="sidebar"
       class="fixed top-0 left-0 h-full z-40 flex flex-col"
       style="width: 240px; background: #373737;">

    <!-- Logo -->
    <div style="padding: 1.5rem 1.25rem; border-bottom: 1px solid rgba(255,255,255,0.08);">
        <a href="<?= base_url('admin') ?>"
           style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
            <div style="width: 30px; height: 30px; background: #fff;
                         display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <i class="ph ph-scales-fill" style="font-size: 1rem; color: #373737;"></i>
            </div>
            <div>
                <p style="font-weight: 700; font-size: 0.85rem; color: #fff;
                           letter-spacing: 0.05em; line-height: 1; text-transform: uppercase;">
                    Advocacia
                </p>
                <p style="font-weight: 400; font-size: 0.55rem; letter-spacing: 0.15em;
                           color: rgba(255,255,255,0.4); text-transform: uppercase; margin-top: 2px;">
                    Área Administrativa
                </p>
            </div>
        </a>
    </div>

    <!-- Nav -->
    <nav style="flex: 1; padding: 1.5rem 0; overflow-y: auto;">
        <?php
        $currentUri = current_url(true)->getPath();
        $menu = [
            ['url' => 'admin',              'icone' => 'ph-squares-four', 'label' => 'Dashboard'],
            ['url' => 'admin/equipe',       'icone' => 'ph-users-three',  'label' => 'Equipa'],
            ['url' => 'admin/servicos',     'icone' => 'ph-scales',       'label' => 'Serviços'],
            ['url' => 'admin/noticias',     'icone' => 'ph-newspaper',    'label' => 'Notícias'],
            ['url' => 'admin/utilizadores', 'icone' => 'ph-user-gear',    'label' => 'Utilizadores'],
        ];
        foreach ($menu as $item):
            $isExact  = rtrim($currentUri, '/') === '/' . rtrim($item['url'], '/');
            $isChild  = !$isExact && str_starts_with($currentUri, '/' . $item['url'] . '/');
            $active   = $isExact || $isChild;
            $classes  = 'nav-link' . ($active ? ' nav-link--active' : '');
        ?>
        <a href="<?= base_url(esc($item['url'])) ?>"
           class="<?= $classes ?>"
           style="display: flex; align-items: center; gap: 10px;
                   padding: 0.7rem 1.25rem; margin: 0 0.5rem 2px;
                   text-decoration: none; position: relative;
                   color: <?= $active ? '#373737' : 'rgba(255,255,255,0.65)' ?>;">
            <i class="ph <?= esc($item['icone']) ?>"
               style="font-size: 1.05rem; flex-shrink: 0;"></i>
            <span style="font-size: 0.82rem; letter-spacing: 0.05em;">
                <?= esc($item['label']) ?>
            </span>
            <?php if ($active): ?>
            <div style="width: 3px; background: #373737;
                         position: absolute; right: 0; top: 0; bottom: 0;"></div>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>

        <!-- Divisor -->
        <div style="margin: 1rem 1.25rem; border-top: 1px solid rgba(255,255,255,0.08);"></div>

        <!-- Ver site -->
        <a href="<?= base_url('/') ?>" target="_blank" rel="noopener"
           class="nav-link"
           style="display: flex; align-items: center; gap: 10px;
                   padding: 0.7rem 1.25rem; margin: 0 0.5rem 2px;
                   text-decoration: none; color: rgba(255,255,255,0.4);">
            <i class="ph ph-arrow-square-out" style="font-size: 1.05rem;"></i>
            <span style="font-size: 0.82rem;">Ver Site</span>
        </a>
    </nav>

    <!-- Utilizador + Sair -->
    <div style="padding: 1rem; border-top: 1px solid rgba(255,255,255,0.08);">
        <a href="<?= base_url('admin/perfil') ?>"
           class="sidebar-user"
           style="display: flex; align-items: center; gap: 10px; padding: 0.6rem;
                   margin-bottom: 8px; text-decoration: none; transition: background 0.2s;">
            <div style="width: 32px; height: 32px; background: rgba(255,255,255,0.15);
                         display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <i class="ph ph-user" style="font-size: 1rem; color: #fff;"></i>
            </div>
            <div style="overflow: hidden;">
                <p style="font-weight: 700; font-size: 0.78rem; color: #fff;
                           white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= esc(session('user_nome')) ?>
                </p>
                <p style="font-weight: 400; font-size: 0.62rem; color: rgba(255,255,255,0.4);
                           letter-spacing: 0.08em; text-transform: uppercase;">
                    <?= esc(session('user_role')) ?>
                </p>
            </div>
        </a>

        <a href="<?= base_url('logout') ?>"
           class="sidebar-logout"
           style="display: flex; align-items: center; justify-content: center; gap: 8px;
                   padding: 0.65rem; background: rgba(255,255,255,0.07);
                   color: rgba(255,255,255,0.5); text-decoration: none;
                   font-size: 0.72rem; font-weight: 400; letter-spacing: 0.1em;
                   text-transform: uppercase; transition: all 0.2s;">
            <i class="ph ph-sign-out" style="font-size: 1rem;"></i>
            Sair
        </a>
    </div>

</aside>

<!-- Overlay mobile -->
<div id="sidebar-overlay"
     class="fixed inset-0 z-30"
     style="background: rgba(0,0,0,0.5);"
     onclick="closeSidebar()">
</div>


<!-- ═══════════════════════════════════
     CONTEÚDO PRINCIPAL
═══════════════════════════════════ -->
<div id="main-content"
     style="margin-left: 240px; min-height: 100vh; transition: margin-left 0.3s ease;">

    <!-- Topbar -->
    <header style="background: #fff; border-bottom: 1px solid #E5E5E5;
                    padding: 0 1.5rem; height: 60px; display: flex;
                    align-items: center; justify-content: space-between;
                    position: sticky; top: 0; z-index: 20;">

        <!-- Hamburger mobile -->
        <button onclick="toggleSidebar()"
                id="btn-menu"
                class="lg:hidden"
                style="width: 36px; height: 36px; display: flex; align-items: center;
                        justify-content: center; border: 1px solid #E5E5E5;
                        background: transparent; cursor: pointer;">
            <i class="ph ph-list" id="btn-menu-ico" style="font-size: 1.2rem; color: #373737;"></i>
        </button>

        <!-- Título da página -->
        <h1 class="lg:block"
            style="display: none; font-weight: 700; font-size: 1rem;
                    color: #111; letter-spacing: 0.03em;">
            <?= esc($title ?? 'Dashboard') ?>
        </h1>

        <!-- Ações rápidas -->
        <div style="display: flex; align-items: center; gap: 10px; margin-left: auto;">
            <a href="<?= base_url('/') ?>"
               target="_blank"
               rel="noopener"
               class="topbar-btn"
               style="display: flex; align-items: center; gap: 6px; padding: 0.5rem 0.9rem;
                       border: 1px solid #E5E5E5; color: #555; text-decoration: none;
                       font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase;">
                <i class="ph ph-globe" style="font-size: 0.9rem;"></i>
                <span class="hidden sm:inline">Ver Site</span>
            </a>

            <a href="<?= base_url('admin/perfil') ?>"
               style="width: 36px; height: 36px; background: #373737; display: flex;
                       align-items: center; justify-content: center; text-decoration: none;"
               title="<?= esc(session('user_nome')) ?>">
                <i class="ph ph-user" style="font-size: 1rem; color: #fff;"></i>
            </a>
        </div>
    </header>

    <!-- Flash: sucesso -->
    <?php if ($success = session()->getFlashdata('success')): ?>
    <div class="flash"
         id="flash-success"
         style="background: #F0FFF4; border-bottom: 1px solid #BBF7D0;
                 padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 10px;">
        <i class="ph ph-check-circle" style="color: #16A34A; font-size: 1rem; flex-shrink: 0;"></i>
        <p style="font-size: 0.85rem; color: #15803D; flex: 1;"><?= esc($success) ?></p>
        <button onclick="this.closest('#flash-success').remove()"
                style="background: none; border: none; cursor: pointer; color: #16A34A;">
            <i class="ph ph-x" style="font-size: 0.9rem;"></i>
        </button>
    </div>
    <?php endif; ?>

    <!-- Flash: erro -->
    <?php if ($error = session()->getFlashdata('error')): ?>
    <div class="flash"
         id="flash-error"
         style="background: #FFF1F2; border-bottom: 1px solid #FECDD3;
                 padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 10px;">
        <i class="ph ph-warning-circle" style="color: #DC2626; font-size: 1rem; flex-shrink: 0;"></i>
        <p style="font-size: 0.85rem; color: #B91C1C; flex: 1;"><?= esc($error) ?></p>
        <button onclick="this.closest('#flash-error').remove()"
                style="background: none; border: none; cursor: pointer; color: #DC2626;">
            <i class="ph ph-x" style="font-size: 0.9rem;"></i>
        </button>
    </div>
    <?php endif; ?>

    <!-- Conteúdo da página -->
    <main class="admin-fade" style="padding: 2rem;">
        <?= $content ?? '' ?>
    </main>

</div>


<script defer>
function toggleSidebar() {
    const sb  = document.getElementById('sidebar');
    const ov  = document.getElementById('sidebar-overlay');
    const ico = document.getElementById('btn-menu-ico');
    const open = sb.classList.toggle('open');
    ov.classList.toggle('open', open);
    ico.className = open ? 'ph ph-x' : 'ph ph-list';
}

function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebar-overlay').classList.remove('open');
    document.getElementById('btn-menu-ico').className = 'ph ph-list';
}

// Auto-hide flash após 4s
['flash-success', 'flash-error'].forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    setTimeout(() => {
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 500);
    }, 4000);
});
</script>

<?= $extra_scripts ?? '' ?>
</body>
</html>