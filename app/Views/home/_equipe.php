<?php
/**
 * Parcial: home/_equipe.php
 * Dados esperados: $equipe (array — membros com destaque=1, máx 4)
 * Chamada: view('home/_equipe', $equipe_data)
 */
?>

<!-- ═══════════════════════════════════════════
     EQUIPA
═══════════════════════════════════════════ -->
<section id="equipe" class="bg-white py-24 lg:py-36 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- ── Cabeçalho ─────────────────────── -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16 eq-reveal">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:28px; height:1px; background:#373737;"></div>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.68rem; letter-spacing:0.3em;
                               text-transform:uppercase; color:#999;">
                        Profissionais
                    </p>
                </div>
                <h2 style="font-family:'Antonio',sans-serif; font-weight:700;
                            font-size:clamp(2.2rem,4vw,3.4rem);
                            line-height:1.0; letter-spacing:-0.02em; color:#111;">
                    A Nossa Equipa
                </h2>
                <div style="width:40px; height:2px; background:#373737; margin-top:1.25rem;"></div>
            </div>

            <a href="<?= base_url('equipe') ?>"
               class="eq-cta-link"
               style="display:inline-flex; align-items:center; gap:8px;
                       font-family:'Antonio',sans-serif; font-weight:400;
                       font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase;
                       color:#373737; border-bottom:1px solid #373737;
                       padding-bottom:2px; white-space:nowrap; transition:gap 0.2s;">
                Ver Toda a Equipa
                <i class="ph ph-arrow-right" style="font-size:0.95rem;"></i>
            </a>

        </div>

        <!-- ── Grid de membros ───────────────── -->
        <?php if (!empty($equipe)): ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-border">
            <?php foreach ($equipe as $idx => $membro): ?>
            <div class="eq-card bg-white group eq-reveal"
                 style="transition-delay: <?= $idx * 80 ?>ms;">

                <!-- Imagem -->
                <div style="aspect-ratio:3/4; overflow:hidden; background:#E8E8E8; position:relative;">
                    <img src="<?= esc($membro['foto'] ?? base_url('assets/images/placeholder-membro.jpg')) ?>"
                         alt="<?= esc($membro['nome']) ?>"
                         class="w-full h-full object-cover"
                         style="transition:transform 0.6s ease;"
                         onmouseover="this.style.transform='scale(1.04)'"
                         onmouseout="this.style.transform='scale(1)'">

                    <!-- Overlay no hover -->
                    <div class="absolute inset-0 eq-overlay"
                         style="background:rgba(55,55,55,0); transition:background 0.35s ease;
                                display:flex; align-items:flex-end; padding:1.5rem;">
                        <!-- Ícones sociais aparecem no hover -->
                        <div class="eq-social"
                             style="display:flex; gap:8px; opacity:0;
                                    transform:translateY(10px);
                                    transition:opacity 0.3s ease, transform 0.3s ease;">
                            <?php if (!empty($membro['linkedin'])): ?>
                            <a href="<?= esc($membro['linkedin']) ?>" target="_blank"
                               style="width:34px; height:34px; background:rgba(255,255,255,0.15);
                                       border:1px solid rgba(255,255,255,0.3);
                                       display:flex; align-items:center; justify-content:center;
                                       color:#fff; transition:background 0.2s;"
                               onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                               onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                                <i class="ph ph-linkedin-logo" style="font-size:0.9rem;"></i>
                            </a>
                            <?php endif; ?>
                            <a href="<?= base_url('equipe/' . esc($membro['slug'])) ?>"
                               style="width:34px; height:34px; background:rgba(255,255,255,0.15);
                                       border:1px solid rgba(255,255,255,0.3);
                                       display:flex; align-items:center; justify-content:center;
                                       color:#fff; transition:background 0.2s;"
                               onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                               onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                                <i class="ph ph-user" style="font-size:0.9rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div style="padding:1.25rem 1.25rem 1.5rem; border-bottom:1px solid #EBEBEB;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:1.05rem; color:#111; line-height:1.2;">
                        <?= esc($membro['nome']) ?>
                    </p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.72rem; letter-spacing:0.12em; text-transform:uppercase;
                               color:#999; margin-top:5px;">
                        <?= esc($membro['cargo'] ?? 'Advogado') ?>
                    </p>
                    <?php if (!empty($membro['especialidade'])): ?>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.82rem; color:#bbb; margin-top:4px;">
                        <?= esc($membro['especialidade']) ?>
                    </p>
                    <?php endif; ?>
                </div>

            </div>

            <!-- JS hover por card -->
            <script>
            (function(){
                const cards = document.querySelectorAll('.eq-card');
                cards.forEach(card => {
                    const overlay = card.querySelector('.eq-overlay');
                    const social  = card.querySelector('.eq-social');
                    card.addEventListener('mouseenter', () => {
                        if (overlay) overlay.style.background = 'rgba(55,55,55,0.55)';
                        if (social)  { social.style.opacity = '1'; social.style.transform = 'translateY(0)'; }
                    });
                    card.addEventListener('mouseleave', () => {
                        if (overlay) overlay.style.background = 'rgba(55,55,55,0)';
                        if (social)  { social.style.opacity = '0'; social.style.transform = 'translateY(10px)'; }
                    });
                });
            })();
            </script>

            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <!-- Fallback — dados de exemplo enquanto não há model -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-border">
            <?php
            $exemplos = [
                ['nome'=>'Dr. João Silva',    'cargo'=>'Sócio Fundador',   'esp'=>'Direito Civil'],
                ['nome'=>'Dra. Ana Ferreira', 'cargo'=>'Sócia',            'esp'=>'Direito Penal'],
                ['nome'=>'Dr. Carlos Matos',  'cargo'=>'Advogado Sénior',  'esp'=>'Direito Empresarial'],
                ['nome'=>'Dra. Maria Sousa',  'cargo'=>'Advogada',         'esp'=>'Direito de Família'],
            ];
            foreach ($exemplos as $idx => $m):
            ?>
            <div class="bg-white eq-reveal" style="transition-delay:<?= $idx*80 ?>ms;">
                <!-- Placeholder da foto -->
                <div style="aspect-ratio:3/4; background:<?= ['#D5D5D5','#C8C8C8','#BEBEBE','#D0D0D0'][$idx] ?>;
                             display:flex; align-items:center; justify-content:center;">
                    <i class="ph ph-user" style="font-size:3rem; color:rgba(255,255,255,0.4);"></i>
                </div>
                <div style="padding:1.25rem 1.25rem 1.5rem; border-bottom:1px solid #EBEBEB;">
                    <p style="font-family:'Antonio',sans-serif; font-weight:700;
                               font-size:1.05rem; color:#111;"><?= $m['nome'] ?></p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.72rem; letter-spacing:0.12em; text-transform:uppercase;
                               color:#999; margin-top:5px;"><?= $m['cargo'] ?></p>
                    <p style="font-family:'Antonio',sans-serif; font-weight:400;
                               font-size:0.82rem; color:#bbb; margin-top:4px;"><?= $m['esp'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>

<style>
    .eq-cta-link:hover { gap: 14px !important; }

    .eq-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .eq-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function(){
    const els = document.querySelectorAll('#equipe .eq-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    els.forEach(el => obs.observe(el));
})();
</script>