<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO primário -->
    <title><?= esc($title ?? 'Advocacia & Consultoria Jurídica') ?></title>
    <meta name="description" content="<?= esc($meta_description ?? 'Escritório de advocacia comprometido com a excelência jurídica.') ?>">
    <meta name="robots" content="<?= esc($robots ?? 'index, follow') ?>">

    <!-- Canonical: evita conteúdo duplicado no Google -->
    <link rel="canonical" href="<?= esc($canonical ?? current_url()) ?>">

    <!-- Open Graph (WhatsApp, LinkedIn, Facebook) -->
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?= esc($title ?? 'Advocacia & Consultoria Jurídica') ?>">
    <meta property="og:description" content="<?= esc($meta_description ?? '') ?>">
    <meta property="og:url"         content="<?= esc(current_url()) ?>">
    <meta property="og:image"       content="<?= esc($og_image ?? base_url('assets/img/og-default.jpg')) ?>">
    <meta property="og:locale"      content="pt_BR">

    <!-- Favicon -->
    <link rel="icon"             type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon.png') ?>">
    <link rel="icon"             type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180"                href="<?= base_url('assets/img/apple-touch-icon.png') ?>">

    <!-- Fonts: preconnect primeiro, depois load -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload"
          href="https://fonts.googleapis.com/css2?family=Antonio:wght@300;400;600;700&display=swap"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@300;400;600;700&display=swap" rel="stylesheet">
    </noscript>

    <!-- CSS compilado (Tailwind via build, não CDN) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <!-- Phosphor Icons (local, não unpkg) -->
    <script src="https://unpkg.com/@phosphor-icons/web" defer></script>

    <style>
        * { font-family: 'Antonio', sans-serif; }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }

        p, span, a, li { font-weight: 400; }

        main { animation: fadeUp 0.35s ease-out; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #ffffff; }
        ::-webkit-scrollbar-thumb { background: #373737; }

        @media (max-width: 768px) {
            #hero-slider {
                height: 85vh !important;
                min-height: 0 !important;
            }
        }
    </style>

    <!-- Slot para CSS/scripts específicos de cada página -->
    <?= $extra_head ?? '' ?>
</head>

<body class="bg-white text-brand antialiased">

    <?= view('templates/frontend/navbar') ?>

    <main id="main-content">
        <?= $content ?? '' ?>
    </main>

    <?= view('templates/frontend/footer') ?>

    <!-- JS principal (defer = não bloqueia renderização) -->
    <script src="<?= base_url('assets/js/frontend/main.js') ?>" defer></script>
    <?= $extra_scripts ?? '' ?>

</body>
</html>