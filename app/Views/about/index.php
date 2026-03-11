<?php
/**
 * View: about/index.php
 * Controller: About::index()
 * Extende: templates/frontend/main.php
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     1. HISTÓRIA — SPLIT ASSIMÉTRICO
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <!-- Imagem -->
            <div class="relative ab-reveal">
                <div style="aspect-ratio:4/5; overflow:hidden; background:#D8D8D8;">
                    <img src="<?= base_url('assets/images/sobre-escritorio.jpg') ?>"
                         alt="Escritório"
                         class="w-full h-full object-cover">
                </div>
                <!-- Card flutuante fundação -->
                <div style="position:absolute; bottom:-1.5rem; right:-1rem; background:#373737;
                             padding:1.5rem 2rem; min-width:170px;" class="hidden lg:block">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:2.4rem; color:#fff; line-height:1;">2009</p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.62rem; letter-spacing:0.2em; text-transform:uppercase;
                               color:rgba(255,255,255,0.5); margin-top:6px;">Ano de Fundação</p>
                </div>
            </div>

            <!-- Texto -->
            <div>
                <div class="ab-reveal">
                    <div class="flex items-center gap-3 mb-5">
                        <div style="width:28px; height:1px; background:#373737;"></div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.68rem; letter-spacing:0.3em;
                                   text-transform:uppercase; color:#999;">A Nossa História</p>
                    </div>
                    <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                                font-size:clamp(2rem,3.5vw,3rem); color:#111;
                                line-height:1.0; letter-spacing:-0.02em;">
                        Mais de uma década<br>ao serviço da Justiça
                    </h2>
                    <div style="width:40px; height:2px; background:#373737; margin:1.5rem 0;"></div>
                </div>

                <div class="ab-reveal" style="transition-delay:0.1s;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:1rem; color:#666; line-height:1.82; margin-bottom:1.1rem;">
                        Fundado em 2009 na cidade da Beira, o nosso escritório nasceu da convicção
                        de que cada pessoa merece uma defesa jurídica competente, acessível e humana.
                        O que começou como um projecto de dois advogados tornou-se hoje uma das
                        referências jurídicas de Moçambique.
                    </p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:1rem; color:#666; line-height:1.82;">
                        Ao longo dos anos expandimos as nossas áreas de atuação, reforçamos a equipa
                        com especialistas de renome e mantivemos sempre o mesmo compromisso:
                        rigor técnico, ética profissional e total dedicação a cada cliente.
                    </p>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-10 pt-10 ab-reveal"
                     style="border-top:1px solid #EBEBEB; transition-delay:0.2s;">
                    <?php foreach ([['15+','Anos'],['800+','Casos'],['98%','Satisfação']] as [$n,$l]): ?>
                    <div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:2rem; color:#111; line-height:1;"><?= $n ?></p>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.65rem; letter-spacing:0.15em; text-transform:uppercase;
                                   color:#aaa; margin-top:5px;"><?= $l ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     2. MISSÃO · VISÃO · VALORES
═══════════════════════════════════════════ -->
<section class="py-24 lg:py-28" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- Título centrado -->
        <div class="text-center mb-16 ab-reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div style="width:28px; height:1px; background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.68rem; letter-spacing:0.3em;
                           text-transform:uppercase; color:#999;">Identidade</p>
                <div style="width:28px; height:1px; background:#373737;"></div>
            </div>
            <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem); color:#111; line-height:1.0;">
                Missão, Visão & Valores
            </h2>
            <div style="width:40px; height:2px; background:#373737; margin:1.25rem auto 0;"></div>
        </div>

        <!-- 3 colunas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-border">

            <!-- Missão -->
            <div class="bg-white p-10 ab-reveal" style="transition-delay:0.0s;">
                <div style="width:48px; height:48px; background:#373737; display:flex;
                             align-items:center; justify-content:center; margin-bottom:1.5rem;">
                    <i class="ph ph-target" style="font-size:1.3rem; color:#fff;"></i>
                </div>
                <h3 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:1.3rem; color:#111; margin-bottom:1rem;">Missão</h3>
                <div style="width:32px; height:2px; background:#373737; margin-bottom:1.25rem;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.95rem; color:#666; line-height:1.8;">
                    Prestar serviços jurídicos de excelência, com rigor técnico e ética inabalável,
                    protegendo os direitos e interesses dos nossos clientes de forma eficaz e humanizada.
                </p>
            </div>

            <!-- Visão -->
            <div class="bg-brand p-10 ab-reveal" style="transition-delay:0.1s;">
                <div style="width:48px; height:48px; border:1px solid rgba(255,255,255,0.25);
                             display:flex; align-items:center; justify-content:center; margin-bottom:1.5rem;">
                    <i class="ph ph-eye" style="font-size:1.3rem; color:#fff;"></i>
                </div>
                <h3 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:1.3rem; color:#fff; margin-bottom:1rem;">Visão</h3>
                <div style="width:32px; height:2px; background:rgba(255,255,255,0.4); margin-bottom:1.25rem;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.95rem; color:rgba(255,255,255,0.7); line-height:1.8;">
                    Ser o escritório de referência em Moçambique, reconhecido pela qualidade,
                    integridade e pelo impacto positivo que geramos na vida dos nossos clientes e na sociedade.
                </p>
            </div>

            <!-- Valores -->
            <div class="bg-white p-10 ab-reveal" style="transition-delay:0.2s;">
                <div style="width:48px; height:48px; background:#F0F0F0; display:flex;
                             align-items:center; justify-content:center; margin-bottom:1.5rem;">
                    <i class="ph ph-diamond" style="font-size:1.3rem; color:#373737;"></i>
                </div>
                <h3 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:1.3rem; color:#111; margin-bottom:1rem;">Valores</h3>
                <div style="width:32px; height:2px; background:#373737; margin-bottom:1.25rem;"></div>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:10px;">
                    <?php foreach (['Ética & Integridade','Rigor Técnico','Confidencialidade','Comprometimento','Humanidade'] as $v): ?>
                    <li style="display:flex; align-items:center; gap:10px;
                                font-family:'Antonio',sans-serif; font-weight:400;
                                font-size:0.92rem; color:#555;">
                        <i class="ph ph-check" style="color:#373737; font-size:0.85rem; flex-shrink:0;"></i>
                        <?= $v ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     3. EQUIPA DE LIDERANÇA
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16 ab-reveal">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:28px; height:1px; background:#373737;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                               letter-spacing:0.3em; text-transform:uppercase; color:#999;">Liderança</p>
                </div>
                <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:clamp(2rem,3.5vw,3rem); color:#111; line-height:1.0;">
                    Quem nos Lidera
                </h2>
                <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
            </div>
            <a href="<?= base_url('equipe') ?>"
               class="ab-eq-link"
               style="display:inline-flex; align-items:center; gap:8px;
                       font-family:'Antonio',sans-serif; font-weight:400; font-size:0.72rem;
                       letter-spacing:0.18em; text-transform:uppercase; color:#373737;
                       border-bottom:1px solid #373737; padding-bottom:2px; transition:gap 0.2s;">
                Ver Toda a Equipa <i class="ph ph-arrow-right"></i>
            </a>
        </div>

        <?php
        // Fallback se o model não retornar dados
        $lideranca_ex = [
            ['nome'=>'Dr. João Silva',    'cargo'=>'Sócio Fundador', 'foto'=>'', 'especialidade'=>'Direito Civil & Empresarial'],
            ['nome'=>'Dra. Ana Ferreira', 'cargo'=>'Sócia',          'foto'=>'', 'especialidade'=>'Direito Penal'],
            ['nome'=>'Dr. Carlos Matos',  'cargo'=>'Sócio Sénior',   'foto'=>'', 'especialidade'=>'Direito Administrativo'],
        ];
        $membros = !empty($lideranca) ? $lideranca : $lideranca_ex;
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-border">
            <?php foreach ($membros as $idx => $m): ?>
            <div class="bg-white group ab-reveal" style="transition-delay:<?= $idx * 100 ?>ms;">
                <div style="aspect-ratio:3/4; overflow:hidden; background:#DDD; position:relative;">
                    <?php if (!empty($m['foto'])): ?>
                        <img src="<?= esc($m['foto']) ?>" alt="<?= esc($m['nome']) ?>"
                             class="w-full h-full object-cover"
                             style="transition:transform 0.55s ease;">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center"
                             style="background:<?= ['#CACACA','#C0C0C0','#D0D0D0'][$idx%3] ?>;">
                            <i class="ph ph-user" style="font-size:3rem; color:rgba(255,255,255,0.4);"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute inset-0"
                         style="background:rgba(55,55,55,0); transition:background 0.3s;"
                         onmouseover="this.style.background='rgba(55,55,55,0.45)'"
                         onmouseout="this.style.background='rgba(55,55,55,0)'"></div>
                </div>
                <div style="padding:1.25rem; border-bottom:1px solid #EBEBEB;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:1.05rem; color:#111;"><?= esc($m['nome']) ?></p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.7rem; letter-spacing:0.12em; text-transform:uppercase;
                               color:#999; margin-top:4px;"><?= esc($m['cargo']) ?></p>
                    <?php if (!empty($m['especialidade'])): ?>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.82rem; color:#bbb; margin-top:3px;">
                        <?= esc($m['especialidade']) ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     4. LINHA DO TEMPO
═══════════════════════════════════════════ -->
<section class="py-24 lg:py-28" style="background:#F7F7F7;">
    <div class="max-w-5xl mx-auto px-6 lg:px-10">

        <div class="text-center mb-16 ab-reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div style="width:28px; height:1px; background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                           letter-spacing:0.3em; text-transform:uppercase; color:#999;">Percurso</p>
                <div style="width:28px; height:1px; background:#373737;"></div>
            </div>
            <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem); color:#111;">A Nossa Evolução</h2>
            <div style="width:40px; height:2px; background:#373737; margin:1.25rem auto 0;"></div>
        </div>

        <?php
        $timeline = [
            ['ano'=>'2009','titulo'=>'Fundação',         'desc'=>'O escritório é fundado na Beira por dois advogados com visão e missão clara de servir com excelência.'],
            ['ano'=>'2012','titulo'=>'Expansão',          'desc'=>'Abertura de nova área de Direito Empresarial e admissão dos primeiros advogados associados.'],
            ['ano'=>'2015','titulo'=>'Reconhecimento',    'desc'=>'Reconhecimento nacional como referência em Direito Civil e início da parceria com a IBA.'],
            ['ano'=>'2018','titulo'=>'Nova Sede',         'desc'=>'Inauguração da nova sede com instalações modernas e uma equipa de 10 profissionais.'],
            ['ano'=>'2022','titulo'=>'Era Digital',       'desc'=>'Implementação de plataforma digital para gestão de processos e comunicação com clientes.'],
            ['ano'=>'2024','titulo'=>'Hoje',              'desc'=>'12 advogados, +800 casos resolvidos e uma reputação sólida construída caso a caso.'],
        ];
        ?>

        <div class="relative">
            <!-- Linha central vertical -->
            <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-px bg-border"
                 style="transform:translateX(-50%);"></div>

            <div class="flex flex-col gap-0">
                <?php foreach ($timeline as $idx => $item): ?>
                <div class="relative grid lg:grid-cols-2 gap-0 ab-reveal"
                     style="transition-delay:<?= $idx * 80 ?>ms;">

                    <?php if ($idx % 2 === 0): ?>
                    <!-- Par — texto esquerda, ano direita -->
                    <div style="padding:2rem 3rem 2rem 0; text-align:right;" class="hidden lg:block">
                        <h4 style="font-family:'Antonio',sans-serif; font-weight:700;
                                    font-size:1.05rem; color:#111; margin-bottom:6px;">
                            <?= esc($item['titulo']) ?>
                        </h4>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.88rem; color:#777; line-height:1.7;">
                            <?= esc($item['desc']) ?>
                        </p>
                    </div>
                    <div style="padding:2rem 0 2rem 3rem;" class="hidden lg:flex items-center">
                        <div style="width:12px; height:12px; background:#373737; border:3px solid #F7F7F7;
                                     outline:2px solid #373737; border-radius:0;
                                     margin-left:-6px; margin-right:1.5rem; flex-shrink:0;"></div>
                        <p style="font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:1.6rem; color:#373737;"><?= esc($item['ano']) ?></p>
                    </div>
                    <?php else: ?>
                    <!-- Ímpar — ano esquerda, texto direita -->
                    <div style="padding:2rem 3rem 2rem 0;" class="hidden lg:flex items-center justify-end">
                        <p style="font-family:'Antonio',sans-serif; font-weight:700;
                                   font-size:1.6rem; color:#373737; margin-right:1.5rem;">
                            <?= esc($item['ano']) ?>
                        </p>
                        <div style="width:12px; height:12px; background:#373737; border:3px solid #F7F7F7;
                                     outline:2px solid #373737; margin-right:-6px; flex-shrink:0;"></div>
                    </div>
                    <div style="padding:2rem 0 2rem 3rem;" class="hidden lg:block">
                        <h4 style="font-family:'Antonio',sans-serif; font-weight:700;
                                    font-size:1.05rem; color:#111; margin-bottom:6px;">
                            <?= esc($item['titulo']) ?>
                        </h4>
                        <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                   font-size:0.88rem; color:#777; line-height:1.7;">
                            <?= esc($item['desc']) ?>
                        </p>
                    </div>
                    <?php endif; ?>

                    <!-- Mobile — lista simples -->
                    <div class="lg:hidden flex gap-4 py-5 border-b border-border">
                        <div>
                            <p style="font-family:'Antonio',sans-serif; font-weight:700;
                                       font-size:1.3rem; color:#373737; min-width:50px;">
                                <?= esc($item['ano']) ?>
                            </p>
                        </div>
                        <div>
                            <h4 style="font-family:'Antonio',sans-serif; font-weight:700;
                                        font-size:1rem; color:#111; margin-bottom:4px;">
                                <?= esc($item['titulo']) ?>
                            </h4>
                            <p style="font-family:'Antonio',sans-serif; font-weight:400;
                                       font-size:0.85rem; color:#777; line-height:1.65;">
                                <?= esc($item['desc']) ?>
                            </p>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     5. PARCEIROS / ASSOCIAÇÕES
═══════════════════════════════════════════ -->
<section class="bg-white py-20 border-t border-border">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                   letter-spacing:0.3em; text-transform:uppercase; color:#bbb;
                   text-align:center; margin-bottom:2.5rem;" class="ab-reveal">
            Afiliações & Parceiros
        </p>

        <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-16 ab-reveal"
             style="transition-delay:0.1s;">
            <?php foreach ($parceiros as $p): ?>
            <div style="text-align:center;">
                <div style="width:72px; height:72px; border:1px solid #E5E5E5;
                             display:flex; align-items:center; justify-content:center;
                             margin:0 auto 10px;">
                    <span style="font-family:'Antonio',sans-serif; font-weight:700;
                                  font-size:0.75rem; letter-spacing:0.05em; color:#373737;">
                        <?= esc($p['sigla']) ?>
                    </span>
                </div>
                <p style="font-family:'Antonio',sans-serif; font-weight:400;
                           font-size:0.7rem; color:#aaa; max-width:120px; line-height:1.4;
                           text-align:center;">
                    <?= esc($p['nome']) ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     6. CTA FINAL
═══════════════════════════════════════════ -->
<section class="bg-brand py-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center ab-reveal">
        <p style="font-family:'Antonio',sans-serif; font-weight:400; font-size:0.68rem;
                   letter-spacing:0.3em; text-transform:uppercase;
                   color:rgba(255,255,255,0.5); margin-bottom:1rem;">
            Pronto para avançar?
        </p>
        <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                    font-size:clamp(2rem,4vw,3rem); color:#fff; line-height:1.0; margin-bottom:2rem;">
            Fale connosco hoje mesmo
        </h2>
        <a href="<?= base_url('contact') ?>"
           style="display:inline-flex; align-items:center; gap:10px;
                   font-family:'Antonio',sans-serif; font-weight:700;
                   font-size:0.75rem; letter-spacing:0.2em; text-transform:uppercase;
                   background:#fff; color:#373737; padding:1.1rem 2.5rem;
                   transition:background 0.2s, color 0.2s;"
           onmouseover="this.style.background='#111'; this.style.color='#fff';"
           onmouseout="this.style.background='#fff'; this.style.color='#373737';">
            Consulta Gratuita
            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
        </a>
    </div>
</section>


<style>
    .ab-eq-link:hover { gap: 14px !important; }
    .ab-reveal {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .ab-reveal.visible { opacity: 1; transform: translateY(0); }
</style>
<script>
(function(){
    const els = document.querySelectorAll('.ab-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>