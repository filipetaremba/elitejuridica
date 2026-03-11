<?php
/**
 * View: servicos/index.php
 * Controller: Servicos::index()
 * Extende: templates/frontend/main.php
 */

$lista       = $servicos;
$destaques   = array_filter($lista, fn($s) => !empty($s['destaque']));
$secundarios = array_filter($lista, fn($s) => empty($s['destaque']));
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     1. INTRO — TEXTO + NÚMEROS
═══════════════════════════════════════════ -->
<section class="bg-white py-20 border-b border-border">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div class="sv-reveal">
                <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:1.1rem;
                           color:#555; line-height:1.85; max-width:520px;">
                    Cada área jurídica exige conhecimento especializado, experiência prática
                    e uma abordagem estratégica. A nossa equipa multidisciplinar garante
                    que o seu caso é tratado pelo especialista certo.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 sv-reveal" style="transition-delay:0.1s;">
                <?php foreach ([['9','Áreas de\nAtuação'],['15+','Anos de\nExperiência'],['800+','Casos\nResolvidos']] as [$n,$l]): ?>
                <div style="text-align:center; padding:1.5rem; border:1px solid #EBEBEB;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:2.2rem; color:#111; line-height:1;"><?= $n ?></p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.65rem; letter-spacing:0.15em; text-transform:uppercase;
                               color:#aaa; margin-top:8px; line-height:1.5;">
                        <?= nl2br(esc($l)) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     2. SERVIÇOS EM DESTAQUE
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-14 sv-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px; height:1px; background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                           letter-spacing:0.3em; text-transform:uppercase; color:#999;">Principais Áreas</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem); color:#111; line-height:1.0;">
                Serviços em Destaque
            </h2>
            <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
        </div>

        <!-- Grid grande 3 col -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-border">
            <?php foreach ($destaques as $idx => $s): ?>
            <div class="sv-card bg-white group sv-reveal"
                 style="transition-delay:<?= ($idx % 3) * 80 ?>ms; padding:2.5rem;">

                <!-- Ícone -->
                <div style="width:52px; height:52px; border:1px solid #E5E5E5;
                             display:flex; align-items:center; justify-content:center;
                             margin-bottom:1.75rem; transition:all 0.3s;"
                     class="sv-icon">
                    <i class="ph <?= esc($s['icone'] ?? 'ph-scales') ?>"
                       style="font-size:1.3rem; color:#373737; transition:color 0.3s;"></i>
                </div>

                <!-- Número -->
                <p style="font-family:'Antonio',sans-serif; font-weight:700;
                           font-size:0.65rem; letter-spacing:0.2em; color:#ddd;
                           margin-bottom:0.75rem;">
                    <?= str_pad($idx + 1, 2, '0', STR_PAD_LEFT) ?>
                </p>

                <!-- Título -->
                <h3 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:1.2rem; color:#111; margin-bottom:0.75rem;
                            transition:color 0.25s;" class="sv-titulo">
                    <?= esc($s['titulo']) ?>
                </h3>

                <!-- Linha que expande -->
                <div style="width:0; height:2px; background:#373737; margin-bottom:1rem;
                             transition:width 0.35s ease;" class="sv-linha"></div>

                <!-- Descrição -->
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.9rem; color:#777; line-height:1.75; flex:1;">
                    <?= esc($s['descricao']) ?>
                </p>

                <!-- CTA saber mais -->
                <div style="margin-top:1.75rem; padding-top:1.25rem; border-top:1px solid #F0F0F0;
                             display:flex; align-items:center; gap:6px;">
                    <a href="<?= base_url('contact') ?>"
                       class="sv-ler"
                       style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:0.68rem; letter-spacing:0.18em; text-transform:uppercase;
                               color:#373737; display:inline-flex; align-items:center;
                               gap:6px; transition:gap 0.2s;">
                        Consultar <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                    </a>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     3. OUTRAS ÁREAS — LISTA COMPACTA
═══════════════════════════════════════════ -->
<?php if (!empty($secundarios)): ?>
<section class="py-20 border-t border-border" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-12 sv-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px; height:1px; background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                           letter-spacing:0.3em; text-transform:uppercase; color:#999;">Mais Áreas</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                        font-size:clamp(1.8rem,3vw,2.5rem); color:#111; line-height:1.0;">
                Outras Áreas de Atuação
            </h2>
            <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-border">
            <?php foreach ($secundarios as $idx => $s): ?>
            <div class="bg-white sv-reveal group"
                 style="transition-delay:<?= ($idx % 3) * 80 ?>ms;
                        display:flex; align-items:flex-start; gap:1rem; padding:1.75rem;
                        transition:background 0.25s;">
                <div style="width:40px; height:40px; background:#F7F7F7; flex-shrink:0;
                             display:flex; align-items:center; justify-content:center;
                             transition:background 0.25s;" class="sv-ic2">
                    <i class="ph <?= esc($s['icone'] ?? 'ph-scales') ?>"
                       style="font-size:1.1rem; color:#373737;"></i>
                </div>
                <div>
                    <h4 style="font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:1rem; color:#111; margin-bottom:6px;
                                transition:color 0.2s;" class="sv-t2">
                        <?= esc($s['titulo']) ?>
                    </h4>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.85rem; color:#888; line-height:1.65;">
                        <?= esc(mb_strimwidth($s['descricao'], 0, 90, '...')) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     4. PROCESSO DE TRABALHO
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="text-center mb-16 sv-reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div style="width:28px; height:1px; background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                           letter-spacing:0.3em; text-transform:uppercase; color:#999;">Como Trabalhamos</p>
                <div style="width:28px; height:1px; background:#373737;"></div>
            </div>
            <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem); color:#111; line-height:1.0;">
                O Nosso Processo
            </h2>
            <div style="width:40px; height:2px; background:#373737; margin:1.25rem auto 0;"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-border">
            <?php
            $passos = [
                ['ph-chat-dots',   '01', 'Consulta Inicial',    'Reunião para compreender o seu caso, analisar os factos e esclarecer todas as dúvidas iniciais.'],
                ['ph-magnifying-glass-plus', '02', 'Análise Jurídica', 'Estudo aprofundado da situação, pesquisa de legislação e jurisprudência aplicável ao seu caso.'],
                ['ph-strategy',    '03', 'Estratégia',          'Definição da abordagem mais eficaz — negociação extrajudicial ou litigância judicial.'],
                ['ph-trophy',      '04', 'Acompanhamento',      'Representação activa, comunicação transparente e defesa intransigente dos seus interesses.'],
            ];
            foreach ($passos as $idx => $p):
            ?>
            <div class="bg-white p-8 sv-reveal" style="transition-delay:<?= $idx * 80 ?>ms;">
                <div style="width:44px; height:44px; background:#373737;
                             display:flex; align-items:center; justify-content:center;
                             margin-bottom:1.5rem;">
                    <i class="ph <?= $p[0] ?>" style="font-size:1.1rem; color:#fff;"></i>
                </div>
                <p style="font-family:'Antonio',sans-serif; font-weight:700;
                           font-size:0.65rem; letter-spacing:0.2em; color:#ddd; margin-bottom:8px;">
                    <?= $p[1] ?>
                </p>
                <h4 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:1.05rem; color:#111; margin-bottom:0.75rem;">
                    <?= $p[2] ?>
                </h4>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.88rem; color:#777; line-height:1.72;">
                    <?= $p[3] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     5. CTA FINAL
═══════════════════════════════════════════ -->
<section class="bg-brand py-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center sv-reveal">
        <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                   letter-spacing:0.3em; text-transform:uppercase;
                   color:rgba(255,255,255,0.5); margin-bottom:1rem;">
            Tem um caso?
        </p>
        <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                    font-size:clamp(2rem,4vw,3rem); color:#fff; line-height:1.0; margin-bottom:2rem;">
            A primeira consulta é gratuita
        </h2>
        <a href="<?= base_url('contact') ?>"
           style="display:inline-flex; align-items:center; gap:10px;
                   font-family:'Antonio',sans-serif; font-weight:700;
                   font-size:0.75rem; letter-spacing:0.2em; text-transform:uppercase;
                   background:#fff; color:#373737; padding:1.1rem 2.5rem;
                   transition:background 0.2s, color 0.2s;"
           onmouseover="this.style.background='#111'; this.style.color='#fff';"
           onmouseout="this.style.background='#fff'; this.style.color='#373737';">
            Marcar Consulta
            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
        </a>
    </div>
</section>


<style>
    .sv-ler:hover  { gap: 12px !important; }

    .sv-card:hover .sv-icon  { background: #373737 !important; border-color: #373737 !important; }
    .sv-card:hover .sv-icon i{ color: #fff !important; }
    .sv-card:hover .sv-titulo{ color: #373737 !important; }
    .sv-card:hover .sv-linha { width: 40px !important; }

    .sv-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .sv-reveal.visible { opacity: 1; transform: translateY(0); }
</style>
<script>
(function(){
    const els = document.querySelectorAll('.sv-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>