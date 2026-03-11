<?php
/**
 * View: contact/index.php
 * Controller: Contact::index()
 */
?>

<?= view('templates/frontend/header') ?>


<!-- ═══════════════════════════════════════════
     INFO + FORMULÁRIO
═══════════════════════════════════════════ -->
<section class="bg-white py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-start">


            <!-- ── LADO ESQUERDO — info ──────────────── -->
            <div>

                <div class="ct-reveal">
                    <div class="flex items-center gap-3 mb-5">
                        <div style="width:28px;height:1px;background:#373737;"></div>
                        <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.68rem;
                                   letter-spacing:0.3em;text-transform:uppercase;color:#999;">Informações</p>
                    </div>
                    <h2 style="font-family:'Antonio',sans-serif;font-weight:700;
                                font-size:clamp(2rem,3.5vw,3rem);color:#111;line-height:1.0;">
                        Estamos aqui<br>para si
                    </h2>
                    <div style="width:40px;height:2px;background:#373737;margin:1.5rem 0;"></div>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:1rem;
                               color:#666;line-height:1.8;max-width:420px;">
                        Preencha o formulário, envie um email ou ligue directamente.
                        A nossa equipa responde sempre com brevidade.
                    </p>
                </div>

                <!-- Itens de contacto -->
                <div class="flex flex-col gap-5 mt-10">

                    <?php
                    $infos = [
                        ['ph-map-pin',  'Morada',   'Av. Principal, 123<br>Beira, Moçambique', null],
                        ['ph-phone',    'Telefone', '+258 84 000 0000', 'tel:+258840000000'],
                        ['ph-envelope', 'Email',    'geral@advocacia.co.mz', 'mailto:geral@advocacia.co.mz'],
                        ['ph-clock',    'Horário',  'Seg – Sex: 08h00 – 17h30<br>Sáb: 09h00 – 12h00', null],
                    ];
                    foreach ($infos as $idx => [$icon, $label, $text, $href]):
                    ?>
                    <div class="ct-reveal" style="display:flex;align-items:flex-start;gap:14px;
                                 transition-delay:<?= $idx * 60 ?>ms;">
                        <div style="width:42px;height:42px;background:#F7F7F7;flex-shrink:0;
                                     display:flex;align-items:center;justify-content:center;">
                            <i class="ph <?= $icon ?>" style="font-size:1.1rem;color:#373737;"></i>
                        </div>
                        <div>
                            <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.7rem;
                                       letter-spacing:0.15em;text-transform:uppercase;color:#111;
                                       margin-bottom:4px;"><?= $label ?></p>
                            <?php if ($href): ?>
                                <a href="<?= $href ?>"
                                   style="font-family:'Antonio',sans-serif;font-weight:400;
                                           font-size:0.9rem;color:#666;text-decoration:none;
                                           transition:color 0.2s;"
                                   onmouseover="this.style.color='#373737'"
                                   onmouseout="this.style.color='#666'">
                                    <?= $text ?>
                                </a>
                            <?php else: ?>
                                <p style="font-family:'Antonio',sans-serif;font-weight:400;
                                           font-size:0.9rem;color:#666;line-height:1.6;">
                                    <?= $text ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <!-- Redes sociais -->
                <div class="ct-reveal" style="display:flex;align-items:center;gap:3;
                             margin-top:2rem;padding-top:2rem;border-top:1px solid #EBEBEB;
                             transition-delay:0.25s;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.68rem;
                               letter-spacing:0.2em;text-transform:uppercase;color:#bbb;
                               margin-right:1rem;">Redes:</p>
                    <?php
                    $redes = [
                        ['ph-linkedin-logo', '#'],
                        ['ph-facebook-logo', '#'],
                        ['ph-instagram-logo','#'],
                    ];
                    foreach ($redes as [$ico, $url]):
                    ?>
                    <a href="<?= $url ?>"
                       style="width:38px;height:38px;border:1px solid #E5E5E5;display:flex;
                               align-items:center;justify-content:center;color:#999;
                               transition:all 0.2s;"
                       onmouseover="this.style.background='#373737';this.style.color='#fff';this.style.borderColor='#373737';"
                       onmouseout="this.style.background='#fff';this.style.color='#999';this.style.borderColor='#E5E5E5';">
                        <i class="ph <?= $ico ?>" style="font-size:1rem;"></i>
                    </a>
                    <?php endforeach; ?>
                </div>

            </div>


            <!-- ── LADO DIREITO — formulário ─────────── -->
            <div class="ct-reveal" style="transition-delay:0.12s;">

                <!-- Flash success -->
                <?php if (!empty($success)): ?>
                <div style="background:#F0FFF4;border-left:3px solid #373737;
                             padding:1rem 1.25rem;margin-bottom:1.5rem;
                             display:flex;align-items:center;gap:10px;">
                    <i class="ph ph-check-circle" style="color:#373737;font-size:1.1rem;"></i>
                    <p style="font-family:'Antonio',sans-serif;font-weight:400;
                               font-size:0.9rem;color:#333;"><?= esc($success) ?></p>
                </div>
                <?php endif; ?>

                <!-- Flash errors -->
                <?php if (!empty($errors)): ?>
                <div style="background:#FEF2F2;border-left:3px solid #DC2626;
                             padding:1rem 1.25rem;margin-bottom:1.5rem;">
                    <p style="font-family:'Antonio',sans-serif;font-weight:700;font-size:0.72rem;
                               letter-spacing:0.1em;text-transform:uppercase;color:#DC2626;
                               margin-bottom:6px;">Corrija os seguintes erros:</p>
                    <ul style="padding-left:1rem;margin:0;">
                        <?php foreach ($errors as $e): ?>
                        <li style="font-family:'Antonio',sans-serif;font-weight:400;
                                    font-size:0.85rem;color:#666;"><?= esc($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form action="<?= base_url('contact') ?>" method="POST"
                      id="form-contact" novalidate>
                    <?= csrf_field() ?>

                    <?php
                    // Helper para input
                    $input = function($name, $label, $type='text', $required=true, $placeholder='') use ($errors) {
                        $id  = 'field-'.$name;
                        $err = $errors[$name] ?? null;
                        $req = $required ? '<span style="color:#DC2626;">*</span>' : '';
                        echo "<div style='margin-bottom:1rem;'>";
                        echo "<label for='{$id}' style='font-family:\"Antonio\",sans-serif;font-weight:700;
                               font-size:0.68rem;letter-spacing:0.15em;text-transform:uppercase;
                               color:#555;display:block;margin-bottom:8px;'>{$label} {$req}</label>";
                        echo "<input type='{$type}' id='{$id}' name='{$name}'
                               value='".esc(old($name))."'
                               placeholder='{$placeholder}'
                               ".($required?'required':'')."
                               class='ct-input'
                               style='width:100%;padding:0.85rem 1rem;border:1px solid ".($err?'#DC2626':'#E5E5E5').";
                                      background:#fff;font-family:\"Antonio\",sans-serif;font-weight:400;
                                      font-size:0.9rem;color:#333;outline:none;transition:border-color 0.2s;'>";
                        if ($err) echo "<p style='font-family:\"Antonio\",sans-serif;font-size:0.75rem;
                                          color:#DC2626;margin-top:4px;'>".esc($err)."</p>";
                        echo "</div>";
                    };
                    ?>

                    <!-- Nome + Email -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php $input('nome',  'Nome',  'text',  true, 'O seu nome'); ?>
                        <?php $input('email', 'Email', 'email', true, 'email@exemplo.com'); ?>
                    </div>

                    <!-- Telefone + Área -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php $input('telefone', 'Telefone', 'tel', false, '+258 84 000 0000'); ?>

                        <div style="margin-bottom:1rem;">
                            <label style="font-family:'Antonio',sans-serif;font-weight:700;
                                           font-size:0.68rem;letter-spacing:0.15em;text-transform:uppercase;
                                           color:#555;display:block;margin-bottom:8px;">
                                Área Jurídica
                            </label>
                            <select name="area" class="ct-input"
                                    style="width:100%;padding:0.85rem 1rem;border:1px solid #E5E5E5;
                                            background:#fff;font-family:'Antonio',sans-serif;font-weight:400;
                                            font-size:0.9rem;color:#555;outline:none;transition:border-color 0.2s;
                                            appearance:none;cursor:pointer;">
                                <option value="">Selecionar...</option>
                                <?php foreach (['civil'=>'Direito Civil','penal'=>'Direito Penal','empresarial'=>'Direito Empresarial','laboral'=>'Direito Laboral','familia'=>'Direito de Família','administrativo'=>'Direito Administrativo','outro'=>'Outro'] as $v => $l): ?>
                                <option value="<?= $v ?>" <?= old('area')===$v?'selected':'' ?>><?= $l ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Assunto -->
                    <?php $input('assunto', 'Assunto', 'text', true, 'Resumo do seu caso'); ?>

                    <!-- Mensagem -->
                    <div style="margin-bottom:1.5rem;">
                        <label style="font-family:'Antonio',sans-serif;font-weight:700;
                                       font-size:0.68rem;letter-spacing:0.15em;text-transform:uppercase;
                                       color:#555;display:block;margin-bottom:8px;">
                            Mensagem <span style="color:#DC2626;">*</span>
                        </label>
                        <textarea name="mensagem" rows="5" required class="ct-input"
                                  placeholder="Descreva o seu caso..."
                                  style="width:100%;padding:0.85rem 1rem;
                                          border:1px solid <?= !empty($errors['mensagem'])?'#DC2626':'#E5E5E5' ?>;
                                          background:#fff;font-family:'Antonio',sans-serif;font-weight:400;
                                          font-size:0.9rem;color:#333;outline:none;
                                          transition:border-color 0.2s;resize:vertical;min-height:140px;"><?= esc(old('mensagem')) ?></textarea>
                        <?php if (!empty($errors['mensagem'])): ?>
                        <p style="font-family:'Antonio',sans-serif;font-size:0.75rem;
                                   color:#DC2626;margin-top:4px;"><?= esc($errors['mensagem']) ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Submit -->
                    <button type="submit" id="btn-submit"
                            style="width:100%;padding:1.1rem 2rem;background:#373737;color:#fff;
                                    border:none;cursor:pointer;font-family:'Antonio',sans-serif;
                                    font-weight:700;font-size:0.78rem;letter-spacing:0.2em;
                                    text-transform:uppercase;display:flex;align-items:center;
                                    justify-content:center;gap:10px;transition:background 0.2s;"
                            onmouseover="this.style.background='#111'"
                            onmouseout="this.style.background='#373737'">
                        <span id="btn-txt">Enviar Mensagem</span>
                        <i class="ph ph-paper-plane-tilt" id="btn-ico" style="font-size:1rem;"></i>
                    </button>

                    <p style="font-family:'Antonio',sans-serif;font-weight:400;font-size:0.72rem;
                               color:#bbb;margin-top:1rem;text-align:center;line-height:1.6;">
                        <i class="ph ph-lock" style="font-size:0.8rem;"></i>
                        Os seus dados são tratados de forma confidencial.
                    </p>

                </form>
            </div>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     MAPA
═══════════════════════════════════════════ -->
<section class="border-t border-border">
    <div style="height:420px;background:#E0E0E0;position:relative;overflow:hidden;">
        <!-- Google Maps embed -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30000!2d34.8393!3d-19.8437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1f29a0b5b5b5b5b5%3A0x0!2sBeira%2C+Mo%C3%A7ambique!5e0!3m2!1spt!2smz!4v1700000000000"
            width="100%" height="100%"
            style="border:0;filter:grayscale(0.3);"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>


<style>
    .ct-input:focus {
        border-color: #373737 !important;
        box-shadow: 0 0 0 3px rgba(55,55,55,0.07);
    }
    .ct-input::placeholder { color:#C0C0C0; }

    .ct-reveal {
        opacity:0;transform:translateY(20px);
        transition:opacity 0.55s ease,transform 0.55s ease;
    }
    .ct-reveal.visible { opacity:1;transform:translateY(0); }
</style>
<script>
(function(){
    // Scroll reveal
    const els = document.querySelectorAll('.ct-reveal');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    els.forEach(el => obs.observe(el));

    // Feedback no submit
    const form = document.getElementById('form-contact');
    const btn  = document.getElementById('btn-submit');
    const txt  = document.getElementById('btn-txt');
    const ico  = document.getElementById('btn-ico');
    form?.addEventListener('submit', () => {
        btn.disabled = true;
        btn.style.background = '#777';
        txt.textContent = 'A enviar...';
        ico.className = 'ph ph-circle-notch ph-spin';
    });
})();
</script>