<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Advocacia & Consultoria Jurídica' ?></title>
    <meta name="description" content="<?= $meta_description ?? 'Escritório de advocacia comprometido com a excelência jurídica.' ?>">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand:    '#373737',
                        dark:     '#111111',
                        mid:      '#555555',
                        soft:     '#999999',
                        border:   '#E5E5E5',
                        offwhite: '#F7F7F7',
                    },
                    fontFamily: {
                        sans:  ['"Antonio"', 'sans-serif'],
                        title: ['"Antonio"', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Google Fonts — Antonio -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

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
    </style>

    <?= $extra_head ?? '' ?>
</head>

<body class="bg-white text-brand antialiased">

    <?= view('templates/frontend/navbar') ?>

    <main>
        <?= $content ?? '' ?>
    </main>

    <?= view('templates/frontend/footer') ?>

    <script src="<?= base_url('assets/js/frontend/main.js') ?>"></script>
    <?= $extra_scripts ?? '' ?>

</body>
</html>