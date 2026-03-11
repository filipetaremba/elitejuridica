<?php
/**
 * View: equipe/index.php
 * Controller: Equipe::index()
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     1. MEMBROS EM DESTAQUE
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-14 eq-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px;height:1px;background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                           letter-spacing:0.3em;text-transform:uppercase;color:#999;">Sócios & Sénior</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:clamp(2rem,3.5vw,3rem);color:#111;line-height:1.0;">
                Liderança do Escritório
            </h2>
            <div style="width:40px;height:2px;background:#373737;margin-top:1.25rem;"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-border">
            <?php foreach ($destaques as $idx => $m): ?>
            <div class="bg-white group eq-reveal" style="transition-delay:<?= $idx * 80 ?>ms;">

                <!-- Foto -->
                <a href="<?= base_url('equipe/' . esc($m['slug'])) ?>"
                   style="display:block;aspect-ratio:3/4;overflow:hidden;background:#DDD;position:relative;">
                    <img src="<?= esc($m['foto']) ?>"
                         alt="<?= esc($m['nome']) ?>"
                         class="w-full h-full object-cover eq-img"
                         style="transition:transform 0.55s ease;"
                         onerror="this.style.display='none'">
                    <!-- placeholder sem foto -->
                    <div class="absolute inset-0 flex items-center justify-center eq-placeholder"
                         style="background:<?= ['#CECECE','#C4C4C4','#D0D0D0','#C8C8C8'][$idx%4] ?>;">
                        <i class="ph ph-user" style="font-size:3rem;color:rgba(255,255,255,0.35);"></i>
                    </div>

                    <!-- Overlay hover -->
                    <div class="eq-overlay absolute inset-0 flex items-end p-5"
                         style="background:rgba(55,55,55,0);transition:background 0.35s ease;">
                        <div class="eq-social flex gap-2"
                             style="opacity:0;transform:translateY(10px);transition:all 0.3s ease;">
                            <?php if (!empty($m['linkedin'])): ?>
                            <a href="<?= esc($m['linkedin']) ?>" target="_blank"
                               style="width:34px;height:34px;background:rgba(255,255,255,0.15);
                                       border:1px solid rgba(255,255,255,0.3);display:flex;
                                       align-items:center;justify-content:center;color:#fff;">
                                <i class="ph ph-linkedin-logo" style="font-size:0.9rem;"></i>
                            </a>
                            <?php endif; ?>
                            <a href="mailto:<?= esc($m['email']) ?>"
                               style="width:34px;height:34px;background:rgba(255,255,255,0.15);
                                       border:1px solid rgba(255,255,255,0.3);display:flex;
                                       align-items:center;justify-content:center;color:#fff;">
                                <i class="ph ph-envelope" style="font-size:0.9rem;"></i>
                            </a>
                            <a href="<?= base_url('equipe/' . esc($m['slug'])) ?>"
                               style="width:34px;height:34px;background:rgba(255,255,255,0.15);
                                       border:1px solid rgba(255,255,255,0.3);display:flex;
                                       align-items:center;justify-content:center;color:#fff;">
                                <i class="ph ph-arrow-right" style="font-size:0.9rem;"></i>
                            </a>
                        </div>
                    </div>
                </a>

                <!-- Info -->
                <a href="<?= base_url('equipe/' . esc($m['slug'])) ?>"
                   style="display:block;padding:1.25rem;border-bottom:1px solid #EBEBEB;
                           text-decoration:none;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:1.05rem;color:#111;"><?= esc($m['nome']) ?></p>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.7rem;letter-spacing:0.12em;text-transform:uppercase;
                               color:#999;margin-top:4px;"><?= esc($m['cargo']) ?></p>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.82rem;color:#bbb;margin-top:3px;">
                        <?= esc($m['especialidade']) ?>
                    </p>
                </a>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     2. OUTROS MEMBROS
═══════════════════════════════════════════ -->
<?php if (!empty($restantes)): ?>
<section class="py-20 border-t border-border" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="mb-12 eq-reveal">
            <div class="flex items-center gap-3 mb-4">
                <div style="width:28px;height:1px;background:#373737;"></div>
                <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                           letter-spacing:0.3em;text-transform:uppercase;color:#999;">Equipa</p>
            </div>
            <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:clamp(1.8rem,3vw,2.5rem);color:#111;line-height:1.0;">
                Advogados Associados
            </h2>
            <div style="width:40px;height:2px;background:#373737;margin-top:1.25rem;"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-border">
            <?php foreach ($restantes as $idx => $m): ?>
            <div class="bg-white group eq-reveal" style="transition-delay:<?= $idx * 80 ?>ms;
                 display:flex;align-items:center;gap:1rem;padding:1.5rem;">

                <!-- Avatar -->
                <div style="width:64px;height:64px;overflow:hidden;background:#D8D8D8;flex-shrink:0;position:relative;">
                    <img src="<?= esc($m['foto']) ?>" alt="<?= esc($m['nome']) ?>"
                         class="w-full h-full object-cover"
                         onerror="this.style.display='none'">
                    <div class="absolute inset-0 flex items-center justify-center"
                         style="background:#D0D0D0;">
                        <i class="ph ph-user" style="font-size:1.5rem;color:rgba(255,255,255,0.5);"></i>
                    </div>
                </div>

                <!-- Texto -->
                <div style="flex:1;min-width:0;">
                    <a href="<?= base_url('equipe/' . esc($m['slug'])) ?>"
                       style="font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:1rem;color:#111;text-decoration:none;
                               transition:color 0.2s;"
                       onmouseover="this.style.color='#555'"
                       onmouseout="this.style.color='#111'">
                        <?= esc($m['nome']) ?>
                    </a>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.7rem;letter-spacing:0.12em;text-transform:uppercase;
                               color:#999;margin-top:3px;"><?= esc($m['cargo']) ?></p>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.82rem;color:#bbb;margin-top:2px;">
                        <?= esc($m['especialidade']) ?>
                    </p>
                </div>

                <i class="ph ph-arrow-right"
                   style="font-size:1rem;color:#ccc;flex-shrink:0;"></i>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     3. CTA FINAL
═══════════════════════════════════════════ -->
<section class="bg-brand py-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center eq-reveal">
        <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                   letter-spacing:0.3em;text-transform:uppercase;
                   color:rgba(255,255,255,0.5);margin-bottom:1rem;">
            Pronto para avançar?
        </p>
        <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                    font-size:clamp(2rem,4vw,3rem);color:#fff;line-height:1.0;margin-bottom:2rem;">
            Fale com um dos nossos especialistas
        </h2>
        <a href="<?= base_url('contact') ?>"
           style="display:inline-flex;align-items:center;gap:10px;
                   font-family:'Antonio',sans-serif;font-weight:700;
                   font-size:0.75rem;letter-spacing:0.2em;text-transform:uppercase;
                   background:#fff;color:#373737;padding:1.1rem 2.5rem;
                   transition:background 0.2s,color 0.2s;"
           onmouseover="this.style.background='#111';this.style.color='#fff';"
           onmouseout="this.style.background='#fff';this.style.color='#373737';">
            Consulta Gratuita
            <i class="ph ph-arrow-right" style="font-size:1rem;"></i>
        </a>
    </div>
</section>


<style>
    .eq-card:hover .eq-overlay { background: rgba(55,55,55,0.55) !important; }
    .eq-card:hover .eq-social   { opacity: 1 !important; transform: translateY(0) !important; }
    .eq-card:hover .eq-img      { transform: scale(1.04) !important; }

    .eq-reveal {
        opacity:0; transform:translateY(20px);
        transition:opacity 0.55s ease, transform 0.55s ease;
    }
    .eq-reveal.visible { opacity:1; transform:translateY(0); }
</style>

<script>
(function(){
    // Hover nos cards grandes
    document.querySelectorAll('.eq-reveal').forEach(card => {
        const ov  = card.querySelector('.eq-overlay');
        const soc = card.querySelector('.eq-social');
        if (!ov) return;
        card.addEventListener('mouseenter', () => {
            ov.style.background = 'rgba(55,55,55,0.55)';
            if(soc){ soc.style.opacity='1'; soc.style.transform='translateY(0)'; }
        });
        card.addEventListener('mouseleave', () => {
            ov.style.background = 'rgba(55,55,55,0)';
            if(soc){ soc.style.opacity='0'; soc.style.transform='translateY(10px)'; }
        });
    });

    // Scroll reveal
    const els = document.querySelectorAll('.eq-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>