<?php
/**
 * View: equipe/perfil.php
 * Controller: Equipe::perfil()
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     PERFIL DO ADVOGADO
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-3 gap-16 items-start">


            <!-- ── COLUNA ESQUERDA — Foto + contacto ─────── -->
            <div class="lg:col-span-1 pf-reveal">

                <!-- Foto -->
                <div style="aspect-ratio:3/4;overflow:hidden;background:#DDD;position:relative;
                             margin-bottom:1.5rem;">
                    <img src="<?= esc($membro['foto']) ?>"
                         alt="<?= esc($membro['nome']) ?>"
                         class="w-full h-full object-cover"
                         onerror="this.style.display='none'">
                    <div class="absolute inset-0 flex items-center justify-center"
                         style="background:#D4D4D4;z-index:-1;">
                        <i class="ph ph-user" style="font-size:4rem;color:rgba(255,255,255,0.35);"></i>
                    </div>
                    <!-- Badge cargo -->
                    <div style="position:absolute;bottom:0;left:0;right:0;
                                 background:#373737;padding:0.75rem 1rem;">
                        <p style="font-family:'Antonio',sans-serif;font-weight:700;
                                   font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;
                                   color:#fff;"><?= esc($membro['cargo']) ?></p>
                    </div>
                </div>

                <!-- OAB -->
                <?php if (!empty($membro['oab'])): ?>
                <div style="padding:0.75rem 1rem;background:#F7F7F7;
                             border-left:3px solid #373737;margin-bottom:1.5rem;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.7rem;
                               letter-spacing:0.15em;text-transform:uppercase;color:#999;">Cédula</p>
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.9rem;
                               color:#373737;margin-top:3px;"><?= esc($membro['oab']) ?></p>
                </div>
                <?php endif; ?>

                <!-- Contactos directos -->
                <div class="flex flex-col gap-3 mb-6">
                    <a href="mailto:<?= esc($membro['email']) ?>"
                       style="display:flex;align-items:center;gap:12px;padding:0.85rem 1rem;
                               border:1px solid #E5E5E5;text-decoration:none;
                               transition:border-color 0.2s,background 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.background='#F7F7F7';"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.background='#fff';">
                        <i class="ph ph-envelope" style="color:#373737;font-size:1rem;flex-shrink:0;"></i>
                        <span style="font-family:'Antonio',sans-serif;font-weight:400;
                                      font-size:0.85rem;color:#555;"><?= esc($membro['email']) ?></span>
                    </a>

                    <?php if (!empty($membro['linkedin'])): ?>
                    <a href="<?= esc($membro['linkedin']) ?>" target="_blank"
                       style="display:flex;align-items:center;gap:12px;padding:0.85rem 1rem;
                               border:1px solid #E5E5E5;text-decoration:none;
                               transition:border-color 0.2s,background 0.2s;"
                       onmouseover="this.style.borderColor='#373737';this.style.background='#F7F7F7';"
                       onmouseout="this.style.borderColor='#E5E5E5';this.style.background='#fff';">
                        <i class="ph ph-linkedin-logo" style="color:#373737;font-size:1rem;flex-shrink:0;"></i>
                        <span style="font-family:'Antonio',sans-serif;font-weight:400;
                                      font-size:0.85rem;color:#555;">LinkedIn</span>
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Idiomas -->
                <?php if (!empty($membro['idiomas'])): ?>
                <div>
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.68rem;
                               letter-spacing:0.2em;text-transform:uppercase;color:#bbb;
                               margin-bottom:10px;">Idiomas</p>
                    <div style="display:flex;flex-wrap:wrap;gap:6px;">
                        <?php foreach ($membro['idiomas'] as $idioma): ?>
                        <span style="font-family:'Antonio',sans-serif;font-weight:400;
                                      font-size:0.78rem;color:#555;background:#F0F0F0;
                                      padding:4px 12px;"><?= esc($idioma) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>


            <!-- ── COLUNA DIREITA — Bio + formação ──────── -->
            <div class="lg:col-span-2">

                <!-- Nome + especialidade -->
                <div class="pf-reveal">
                    <div class="flex items-center gap-3 mb-4">
                        <div style="width:28px;height:1px;background:#373737;"></div>
                        <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                                   letter-spacing:0.3em;text-transform:uppercase;color:#999;">
                            <?= esc($membro['especialidade']) ?>
                        </p>
                    </div>
                    <h1 style="font-family:'Antonio',sans-serif;font-weight:700;
                                font-size:clamp(2rem,4vw,3.2rem);color:#111;line-height:1.0;">
                        <?= esc($membro['nome']) ?>
                    </h1>
                    <div style="width:40px;height:2px;background:#373737;margin:1.5rem 0;"></div>
                </div>

                <!-- Bio -->
                <div class="pf-reveal" style="transition-delay:0.1s;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:1rem;
                               color:#555;line-height:1.85;">
                        <?= esc($membro['bio']) ?>
                    </p>
                </div>

                <!-- Áreas de actuação -->
                <?php if (!empty($membro['areas'])): ?>
                <div class="mt-10 pf-reveal" style="transition-delay:0.15s;">
                    <h3 style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.72rem;
                                letter-spacing:0.2em;text-transform:uppercase;color:#111;
                                margin-bottom:1rem;">Áreas de Actuação</h3>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <?php foreach ($membro['areas'] as $area): ?>
                        <span style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.82rem;
                                      color:#373737;border:1px solid #E5E5E5;padding:6px 14px;">
                            <?= esc($area) ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Formação -->
                <div class="mt-10 pf-reveal" style="transition-delay:0.2s;">
                    <h3 style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.72rem;
                                letter-spacing:0.2em;text-transform:uppercase;color:#111;
                                margin-bottom:1rem;">Formação Académica</h3>

                    <div style="display:flex;flex-direction:column;gap:0;">
                        <div style="display:flex;gap:14px;padding:1rem 0;border-bottom:1px solid #F0F0F0;">
                            <div style="width:8px;height:8px;background:#373737;flex-shrink:0;margin-top:6px;"></div>
                            <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.9rem;
                                       color:#555;line-height:1.6;"><?= esc($membro['formacao']) ?></p>
                        </div>
                        <?php if (!empty($membro['pos_graduacao'])): ?>
                        <div style="display:flex;gap:14px;padding:1rem 0;border-bottom:1px solid #F0F0F0;">
                            <div style="width:8px;height:8px;background:#373737;flex-shrink:0;margin-top:6px;"></div>
                            <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.9rem;
                                       color:#555;line-height:1.6;"><?= esc($membro['pos_graduacao']) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- CTA agendar consulta -->
                <div class="mt-12 pf-reveal" style="transition-delay:0.25s;">
                    <a href="<?= base_url('contact') ?>"
                       style="display:inline-flex;align-items:center;gap:10px;
                               font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:0.72rem;letter-spacing:0.18em;text-transform:uppercase;
                               background:#373737;color:#fff;padding:1rem 2rem;
                               transition:background 0.2s;"
                       onmouseover="this.style.background='#111';"
                       onmouseout="this.style.background='#373737';">
                        Agendar Consulta
                        <i class="ph ph-calendar" style="font-size:1rem;"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     OUTROS MEMBROS
═══════════════════════════════════════════ -->
<?php if (!empty($outros)): ?>
<section class="py-20 border-t border-border" style="background:#F7F7F7;">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center justify-between mb-12 pf-reveal">
            <h3 style="font-family:'Antonio',sans-serif;font-weight:700;
                        font-size:1.5rem;color:#111;">Outros Membros</h3>
            <a href="<?= base_url('equipe') ?>"
               style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.7rem;
                       letter-spacing:0.15em;text-transform:uppercase;color:#373737;
                       border-bottom:1px solid #373737;padding-bottom:2px;
                       display:inline-flex;align-items:center;gap:6px;transition:gap 0.2s;"
               onmouseover="this.style.gap='12px'" onmouseout="this.style.gap='6px'">
                Ver Todos <i class="ph ph-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-border">
            <?php foreach (array_slice($outros, 0, 3) as $idx => $m): ?>
            <a href="<?= base_url('equipe/' . esc($m['slug'])) ?>"
               class="bg-white group pf-reveal"
               style="display:flex;align-items:center;gap:1rem;padding:1.25rem;
                       text-decoration:none;transition-delay:<?= $idx * 80 ?>ms;
                       transition:background 0.2s;"
               onmouseover="this.style.background='#F7F7F7'"
               onmouseout="this.style.background='#fff'">

                <div style="width:56px;height:56px;overflow:hidden;background:#DDD;flex-shrink:0;position:relative;">
                    <img src="<?= esc($m['foto']) ?>" alt="<?= esc($m['nome']) ?>"
                         class="w-full h-full object-cover" onerror="this.style.display='none'">
                    <div class="absolute inset-0 flex items-center justify-center"
                         style="background:#CACACA;">
                        <i class="ph ph-user" style="font-size:1.4rem;color:rgba(255,255,255,0.45);"></i>
                    </div>
                </div>

                <div style="flex:1;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;
                               font-size:0.95rem;color:#111;"><?= esc($m['nome']) ?></p>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.7rem;letter-spacing:0.1em;text-transform:uppercase;
                               color:#999;margin-top:3px;"><?= esc($m['cargo']) ?></p>
                </div>
                <i class="ph ph-arrow-right" style="font-size:0.95rem;color:#ccc;flex-shrink:0;"></i>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>


<style>
    .pf-reveal {
        opacity:0; transform:translateY(20px);
        transition:opacity 0.55s ease, transform 0.55s ease;
    }
    .pf-reveal.visible { opacity:1; transform:translateY(0); }
</style>
<script>
(function(){
    const els = document.querySelectorAll('.pf-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach((e,i) => {
            if(e.isIntersecting){
                setTimeout(() => e.target.classList.add('visible'), i * 60);
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));
})();
</script>