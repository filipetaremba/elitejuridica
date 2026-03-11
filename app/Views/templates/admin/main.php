<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin') ?> — Advocacia</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand:   '#373737',
                        dark:    '#111111',
                        mid:     '#555555',
                        soft:    '#999999',
                        border:  '#E5E5E5',
                        offwhite:'#F7F7F7',
                    },
                    fontFamily: {
                        antonio: ['"Antonio"', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Google Fonts: Antonio -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        * { font-family: 'Antonio', sans-serif; box-sizing: border-box; }
        body { background: #F7F7F7; }

        /* Scrollbar */
        ::-webkit-scrollbar       { width: 4px; }
        ::-webkit-scrollbar-track { background: #F7F7F7; }
        ::-webkit-scrollbar-thumb { background: #373737; }

        /* Sidebar */
        #sidebar { transition: transform 0.3s ease; }
        #sidebar-overlay { display: none; }
        @media (max-width: 1023px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #sidebar-overlay.open { display: block; }
        }

        /* Animação fade-in do conteúdo */
        .admin-fade {
            animation: adminFadeIn 0.35s ease forwards;
        }
        @keyframes adminFadeIn {
            from { opacity:0; transform:translateY(8px); }
            to   { opacity:1; transform:translateY(0); }
        }
    </style>

    <?= $extra_head ?? '' ?>
</head>
<body class="min-h-screen">

<!-- ═══════════════════════════════════════════
     SIDEBAR
═══════════════════════════════════════════ -->
<aside id="sidebar"
       class="fixed top-0 left-0 h-full z-40 flex flex-col"
       style="width:240px; background:#373737;">

    <!-- Logo -->
    <div style="padding:1.5rem 1.25rem; border-bottom:1px solid rgba(255,255,255,0.08);">
        <a href="<?= base_url('admin') ?>"
           style="display:flex; align-items:center; gap:10px; text-decoration:none;">
            <div style="width:30px; height:30px; background:#fff; display:flex;
                         align-items:center; justify-content:center; flex-shrink:0;">
                <i class="ph ph-scales-fill" style="font-size:1rem; color:#373737;"></i>
            </div>
            <div>
                <p style="font-weight:700; font-size:0.85rem; color:#fff; letter-spacing:0.05em;
                           line-height:1; text-transform:uppercase;">Advocacia</p>
                <p style="font-weight:400; font-size:0.55rem; letter-spacing:0.15em;
                           color:rgba(255,255,255,0.4); text-transform:uppercase; margin-top:2px;">
                    Área Administrativa
                </p>
            </div>
        </a>
    </div>

    <!-- Nav -->
    <nav style="flex:1; padding:1.5rem 0; overflow-y:auto;">
        <?php
        $currentUri = current_url(true)->getPath();
        $menu = [
            ['url' => 'admin',           'icone' => 'ph-squares-four',  'label' => 'Dashboard'],
            ['url' => 'admin/equipe',    'icone' => 'ph-users-three',   'label' => 'Equipa'],
            ['url' => 'admin/servicos',  'icone' => 'ph-scales',        'label' => 'Serviços'],
            ['url' => 'admin/noticias',  'icone' => 'ph-newspaper',     'label' => 'Notícias'],
            ['url' => 'admin/utilizadores','icone'=>'ph-user-gear',     'label' => 'Utilizadores'],
        ];
        foreach ($menu as $item):
            $href    = base_url($item['url']);
            $isExact = rtrim($currentUri, '/') === '/' . rtrim($item['url'], '/');
            $isChild = !$isExact && str_starts_with($currentUri, '/' . $item['url'] . '/');
            $active  = $isExact || $isChild;
        ?>
        <a href="<?= $href ?>"
           style="display:flex; align-items:center; gap:10px; padding:0.7rem 1.25rem;
                   margin:0 0.5rem 2px; text-decoration:none; transition:all 0.2s;
                   background:<?= $active ? '#fff' : 'transparent' ?>;
                   color:<?= $active ? '#373737' : 'rgba(255,255,255,0.65)' ?>;"
           onmouseover="if(!this.classList.contains('active')){ this.style.background='rgba(255,255,255,0.08)'; this.style.color='#fff'; }"
           onmouseout="if(!this.classList.contains('active')){ this.style.background='<?= $active ? '#fff' : 'transparent' ?>'; this.style.color='<?= $active ? '#373737' : 'rgba(255,255,255,0.65)' ?>'; }"
           <?= $active ? 'class="active"' : '' ?>>
            <i class="ph <?= $item['icone'] ?>"
               style="font-size:1.05rem; flex-shrink:0;"></i>
            <span style="font-weight:<?= $active ? '700' : '400' ?>;
                          font-size:0.82rem; letter-spacing:0.05em;">
                <?= $item['label'] ?>
            </span>
            <?php if ($active): ?>
            <div style="width:3px; height:100%; background:#373737;
                         position:absolute; right:0; top:0;"></div>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>

        <!-- Divider -->
        <div style="margin:1rem 1.25rem; border-top:1px solid rgba(255,255,255,0.08);"></div>

        <!-- Ver site -->
        <a href="<?= base_url('/') ?>" target="_blank"
           style="display:flex; align-items:center; gap:10px; padding:0.7rem 1.25rem;
                   margin:0 0.5rem 2px; text-decoration:none; color:rgba(255,255,255,0.4);
                   transition:all 0.2s;"
           onmouseover="this.style.color='rgba(255,255,255,0.8)'"
           onmouseout="this.style.color='rgba(255,255,255,0.4)'">
            <i class="ph ph-arrow-square-out" style="font-size:1.05rem;"></i>
            <span style="font-weight:400; font-size:0.82rem;">Ver Site</span>
        </a>
    </nav>

    <!-- User + Sair -->
    <div style="padding:1rem; border-top:1px solid rgba(255,255,255,0.08);">
        <a href="<?= base_url('admin/perfil') ?>"
           style="display:flex; align-items:center; gap:10px; padding:0.6rem; margin-bottom:8px;
                   text-decoration:none; transition:background 0.2s; border-radius:0;"
           onmouseover="this.style.background='rgba(255,255,255,0.08)'"
           onmouseout="this.style.background='transparent'">
            <div style="width:32px; height:32px; background:rgba(255,255,255,0.15);
                         display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="ph ph-user" style="font-size:1rem; color:#fff;"></i>
            </div>
            <div style="overflow:hidden;">
                <p style="font-weight:700; font-size:0.78rem; color:#fff;
                           white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                    <?= esc(session('user_nome')) ?>
                </p>
                <p style="font-weight:400; font-size:0.62rem; color:rgba(255,255,255,0.4);
                           letter-spacing:0.08em; text-transform:uppercase;">
                    <?= esc(session('user_role')) ?>
                </p>
            </div>
        </a>
        <a href="<?= base_url('logout') ?>"
           style="display:flex; align-items:center; justify-content:center; gap:8px;
                   padding:0.65rem; background:rgba(255,255,255,0.07);
                   color:rgba(255,255,255,0.5); text-decoration:none; font-size:0.72rem;
                   font-weight:400; letter-spacing:0.1em; text-transform:uppercase;
                   transition:all 0.2s;"
           onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.color='#fff'"
           onmouseout="this.style.background='rgba(255,255,255,0.07)';this.style.color='rgba(255,255,255,0.5)'">
            <i class="ph ph-sign-out" style="font-size:1rem;"></i>
            Sair
        </a>
    </div>

</aside>

<!-- Overlay mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30"
     onclick="closeSidebar()"></div>


<!-- ═══════════════════════════════════════════
     CONTEÚDO PRINCIPAL
═══════════════════════════════════════════ -->
<div id="main-content" style="margin-left:240px; min-height:100vh;
      transition:margin-left 0.3s ease;">

    <!-- Topbar -->
    <header style="background:#fff; border-bottom:1px solid #E5E5E5;
                    padding:0 1.5rem; height:60px; display:flex;
                    align-items:center; justify-content:space-between;
                    position:sticky; top:0; z-index:20;">

        <!-- Hamburger (mobile) -->
        <button onclick="toggleSidebar()" id="btn-menu"
                class="lg:hidden"
                style="width:36px; height:36px; display:flex; align-items:center;
                        justify-content:center; border:1px solid #E5E5E5;
                        background:transparent; cursor:pointer;">
            <i class="ph ph-list" id="btn-menu-ico" style="font-size:1.2rem; color:#373737;"></i>
        </button>

        <!-- Título da página -->
        <h1 style="font-weight:700; font-size:1rem; color:#111;
                    letter-spacing:0.03em; display:none;"
            class="lg:block" id="page-title">
            <?= esc($title ?? 'Dashboard') ?>
        </h1>

        <!-- Acções rápidas -->
        <div style="display:flex; align-items:center; gap:10px; margin-left:auto;">
            <a href="<?= base_url('/') ?>" target="_blank"
               style="display:flex; align-items:center; gap:6px; padding:0.5rem 0.9rem;
                       border:1px solid #E5E5E5; color:#555; text-decoration:none;
                       font-size:0.7rem; letter-spacing:0.1em; text-transform:uppercase;
                       transition:all 0.2s;"
               onmouseover="this.style.borderColor='#373737';this.style.color='#373737'"
               onmouseout="this.style.borderColor='#E5E5E5';this.style.color='#555'">
                <i class="ph ph-globe" style="font-size:0.9rem;"></i>
                <span class="hidden sm:inline">Ver Site</span>
            </a>

            <a href="<?= base_url('admin/perfil') ?>"
               style="width:36px; height:36px; background:#373737; display:flex;
                       align-items:center; justify-content:center; text-decoration:none;"
               title="<?= esc(session('user_nome')) ?>">
                <i class="ph ph-user" style="font-size:1rem; color:#fff;"></i>
            </a>
        </div>
    </header>

    <!-- Flash messages globais -->
    <?php if ($success = session()->getFlashdata('success')): ?>
    <div style="background:#F0FFF4; border-bottom:1px solid #BBF7D0;
                 padding:0.75rem 1.5rem; display:flex; align-items:center; gap:10px;"
         id="flash-success">
        <i class="ph ph-check-circle" style="color:#16A34A; font-size:1rem; flex-shrink:0;"></i>
        <p style="font-size:0.85rem; color:#15803D; flex:1;"><?= esc($success) ?></p>
        <button onclick="this.parentElement.remove()"
                style="background:none; border:none; cursor:pointer; color:#16A34A;">
            <i class="ph ph-x" style="font-size:0.9rem;"></i>
        </button>
    </div>
    <?php endif; ?>

    <!-- Conteúdo da página -->
    <main class="admin-fade" style="padding:2rem;">
        <?= $content ?? '' ?>
    </main>

</div>


<script>
function toggleSidebar() {
    const sb  = document.getElementById('sidebar');
    const ov  = document.getElementById('sidebar-overlay');
    const ico = document.getElementById('btn-menu-ico');
    sb.classList.toggle('open');
    ov.classList.toggle('open');
    ico.className = sb.classList.contains('open') ? 'ph ph-x' : 'ph ph-list';
    ico.style.fontSize = '1.2rem';
    ico.style.color = '#373737';
}
function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebar-overlay').classList.remove('open');
    document.getElementById('btn-menu-ico').className = 'ph ph-list';
}

// Auto-hide flash after 4s
setTimeout(() => {
    const f = document.getElementById('flash-success');
    if (f) { f.style.transition = 'opacity 0.5s'; f.style.opacity = '0'; setTimeout(() => f?.remove(), 500); }
}, 4000);
</script>

<?= $extra_scripts ?? '' ?>
</body>
</html>