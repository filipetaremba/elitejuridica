<?php
/**
 * View: admin/dashboard/index.php
 * Dados reais: $stats, $ultimasNoticias, $mensagensRecentes, $ultimosMembros
 */
?>

<!-- ── Cabeçalho ─────────────────────────────────── -->
<div style="margin-bottom:2rem;">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:4px;">
        <i class="ph ph-squares-four" style="font-size:1.15rem; color:#373737;"></i>
        <h2 style="font-weight:700; font-size:1.4rem; color:#111; line-height:1;">Dashboard</h2>
    </div>
    <p style="font-weight:400; font-size:0.85rem; color:#aaa;">
        Bem-vindo, <strong style="color:#555;"><?= esc(session('user_nome')) ?></strong>.
        Hoje é <?= date('d \d\e F \d\e Y') ?>.
    </p>
</div>


<!-- ═══════════════════════════════════════════
     STAT CARDS — dados reais
═══════════════════════════════════════════ -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <?php foreach ($stats as $idx => $s): ?>
    <a href="<?= base_url($s['url']) ?>"
       style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;
               text-decoration:none; display:block; transition:border-color 0.2s;
               animation: adminFadeIn 0.4s ease <?= $idx * 0.06 ?>s both;"
       onmouseover="this.style.borderColor='#373737'"
       onmouseout="this.style.borderColor='#E5E5E5'">
        <div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:0.85rem;">
            <div style="width:38px; height:38px; background:#F7F7F7; display:flex;
                         align-items:center; justify-content:center;">
                <i class="ph <?= esc($s['icone']) ?>" style="font-size:1.05rem; color:#373737;"></i>
            </div>
            <span style="font-weight:700; font-size:2.2rem; color:#111; line-height:1;">
                <?= $s['valor'] ?>
            </span>
        </div>
        <p style="font-weight:400; font-size:0.68rem; letter-spacing:0.12em;
                   text-transform:uppercase; color:#999;">
            <?= esc($s['label']) ?>
        </p>
    </a>
    <?php endforeach; ?>
</div>


<!-- ═══════════════════════════════════════════
     LINHA PRINCIPAL: notícias + mensagens
═══════════════════════════════════════════ -->
<div class="grid lg:grid-cols-2 gap-6 mb-6">

    <!-- Últimas Notícias -->
    <div style="background:#fff; border:1px solid #E5E5E5;">
        <div style="padding:1.1rem 1.5rem; border-bottom:1px solid #E5E5E5;
                     display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:8px;">
                <i class="ph ph-newspaper" style="font-size:1rem; color:#373737;"></i>
                <h3 style="font-weight:700; font-size:0.78rem; color:#111;
                            letter-spacing:0.08em; text-transform:uppercase;">
                    Últimos Artigos
                </h3>
            </div>
            <a href="<?= base_url('admin/noticias') ?>"
               style="font-size:0.68rem; color:#aaa; text-decoration:none; letter-spacing:0.08em;
                       text-transform:uppercase; transition:color 0.2s;"
               onmouseover="this.style.color='#373737'"
               onmouseout="this.style.color='#aaa'">
                Ver todos →
            </a>
        </div>

        <?php if (empty($ultimasNoticias)): ?>
        <div style="padding:2rem; text-align:center;">
            <p style="font-size:0.85rem; color:#bbb;">Nenhum artigo ainda.</p>
            <a href="<?= base_url('admin/noticias/criar') ?>"
               style="display:inline-block; margin-top:0.75rem; padding:0.6rem 1.25rem;
                       background:#373737; color:#fff; text-decoration:none; font-size:0.7rem;
                       font-weight:700; letter-spacing:0.12em; text-transform:uppercase;">
                Escrever Artigo
            </a>
        </div>
        <?php else: ?>
        <?php foreach ($ultimasNoticias as $n): ?>
        <a href="<?= base_url('admin/noticias/editar/' . $n['id']) ?>"
           style="display:flex; align-items:center; gap:12px; padding:0.85rem 1.5rem;
                   border-bottom:1px solid #F5F5F5; text-decoration:none; transition:background 0.15s;"
           onmouseover="this.style.background='#FAFAFA'"
           onmouseout="this.style.background='transparent'">

            <!-- Thumb -->
            <div style="width:40px; height:40px; background:#F0F0F0; flex-shrink:0; overflow:hidden;">
                <?php if (!empty($n['imagem'])): ?>
                <img src="<?= base_url($n['imagem']) ?>" alt=""
                     style="width:100%; height:100%; object-fit:cover;">
                <?php else: ?>
                <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <i class="ph ph-image" style="font-size:1rem; color:#ccc;"></i>
                </div>
                <?php endif; ?>
            </div>

            <div style="flex:1; min-width:0;">
                <p style="font-weight:700; font-size:0.82rem; color:#111;
                           white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                    <?= esc($n['titulo']) ?>
                </p>
                <div style="display:flex; align-items:center; gap:8px; margin-top:3px;">
                    <?php if (!empty($n['categoria'])): ?>
                    <span style="font-size:0.62rem; color:#aaa; letter-spacing:0.08em;
                                  text-transform:uppercase;">
                        <?= esc($n['categoria']) ?>
                    </span>
                    <span style="color:#ddd; font-size:0.7rem;">·</span>
                    <?php endif; ?>
                    <span style="font-size:0.68rem; color:#bbb;">
                        <?= !empty($n['publicado_em']) ? date('d/m/Y', strtotime($n['publicado_em'])) : '—' ?>
                    </span>
                </div>
            </div>

            <!-- Badge publicado -->
            <span style="flex-shrink:0; font-size:0.6rem; font-weight:700; letter-spacing:0.1em;
                          text-transform:uppercase; padding:0.2rem 0.5rem;
                          background:<?= $n['publicado'] ? '#F0FFF4' : '#FFFBEB' ?>;
                          color:<?= $n['publicado'] ? '#166534' : '#92400E' ?>;">
                <?= $n['publicado'] ? 'Pub.' : 'Rascunho' ?>
            </span>

        </a>
        <?php endforeach; ?>
        <div style="padding:0.85rem 1.5rem; text-align:right;">
            <a href="<?= base_url('admin/noticias/criar') ?>"
               style="font-size:0.7rem; color:#373737; text-decoration:none; font-weight:700;
                       letter-spacing:0.1em; text-transform:uppercase; display:inline-flex;
                       align-items:center; gap:5px;"
               onmouseover="this.style.opacity='0.6'"
               onmouseout="this.style.opacity='1'">
                <i class="ph ph-plus" style="font-size:0.85rem;"></i> Novo artigo
            </a>
        </div>
        <?php endif; ?>
    </div>


    <!-- Mensagens Recentes -->
    <div style="background:#fff; border:1px solid #E5E5E5;">
        <div style="padding:1.1rem 1.5rem; border-bottom:1px solid #E5E5E5;
                     display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:8px;">
                <i class="ph ph-envelope" style="font-size:1rem; color:#373737;"></i>
                <h3 style="font-weight:700; font-size:0.78rem; color:#111;
                            letter-spacing:0.08em; text-transform:uppercase;">
                    Mensagens Recentes
                </h3>
                <?php
                $naoLidas = count(array_filter($mensagensRecentes, fn($m) => !$m['lida']));
                if ($naoLidas > 0):
                ?>
                <span style="background:#EF4444; color:#fff; font-size:0.6rem; font-weight:700;
                              padding:0.15rem 0.5rem; letter-spacing:0.05em;">
                    <?= $naoLidas ?> nova<?= $naoLidas > 1 ? 's' : '' ?>
                </span>
                <?php endif; ?>
            </div>
            <a href="<?= base_url('admin/mensagens') ?>"
               style="font-size:0.68rem; color:#aaa; text-decoration:none; letter-spacing:0.08em;
                       text-transform:uppercase; transition:color 0.2s;"
               onmouseover="this.style.color='#373737'"
               onmouseout="this.style.color='#aaa'">
                Ver todas →
            </a>
        </div>

        <?php if (empty($mensagensRecentes)): ?>
        <div style="padding:2rem; text-align:center;">
            <i class="ph ph-envelope-open" style="font-size:2rem; color:#ddd; display:block; margin-bottom:0.5rem;"></i>
            <p style="font-size:0.85rem; color:#bbb;">Nenhuma mensagem recebida.</p>
        </div>
        <?php else: ?>
        <?php foreach ($mensagensRecentes as $m): ?>
        <div style="display:flex; align-items:flex-start; gap:12px; padding:0.85rem 1.5rem;
                     border-bottom:1px solid #F5F5F5; transition:background 0.15s;
                     <?= !$m['lida'] ? 'border-left:2px solid #373737;' : '' ?>"
             onmouseover="this.style.background='#FAFAFA'"
             onmouseout="this.style.background='transparent'">

            <div style="width:36px; height:36px; background:<?= !$m['lida'] ? '#373737' : '#F0F0F0' ?>;
                         flex-shrink:0; display:flex; align-items:center; justify-content:center;">
                <i class="ph ph-user" style="font-size:0.95rem;
                    color:<?= !$m['lida'] ? '#fff' : '#aaa' ?>;"></i>
            </div>

            <div style="flex:1; min-width:0;">
                <div style="display:flex; align-items:baseline; gap:8px;">
                    <p style="font-weight:700; font-size:0.82rem; color:#111;">
                        <?= esc($m['nome']) ?>
                    </p>
                    <?php if (!$m['lida']): ?>
                    <span style="width:6px; height:6px; background:#EF4444; border-radius:50%;
                                  display:inline-block; flex-shrink:0;"></span>
                    <?php endif; ?>
                </div>
                <p style="font-size:0.75rem; color:#777; margin-top:1px;
                           white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                    <?= esc($m['assunto']) ?>
                </p>
                <p style="font-size:0.68rem; color:#bbb; margin-top:2px;">
                    <?= date('d/m/Y H:i', strtotime($m['created_at'])) ?>
                    <?php if (!empty($m['area'])): ?>
                    · <span style="text-transform:uppercase; letter-spacing:0.05em;"><?= esc($m['area']) ?></span>
                    <?php endif; ?>
                </p>
            </div>

        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>


<!-- ═══════════════════════════════════════════
     LINHA: equipa recente + acções rápidas
═══════════════════════════════════════════ -->
<div class="grid lg:grid-cols-3 gap-6">

    <!-- Membros recentes (2/3) -->
    <div style="background:#fff; border:1px solid #E5E5E5;" class="lg:col-span-2">
        <div style="padding:1.1rem 1.5rem; border-bottom:1px solid #E5E5E5;
                     display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:8px;">
                <i class="ph ph-users-three" style="font-size:1rem; color:#373737;"></i>
                <h3 style="font-weight:700; font-size:0.78rem; color:#111;
                            letter-spacing:0.08em; text-transform:uppercase;">
                    Equipa
                </h3>
            </div>
            <a href="<?= base_url('admin/equipe') ?>"
               style="font-size:0.68rem; color:#aaa; text-decoration:none; letter-spacing:0.08em;
                       text-transform:uppercase; transition:color 0.2s;"
               onmouseover="this.style.color='#373737'"
               onmouseout="this.style.color='#aaa'">
                Gerir →
            </a>
        </div>

        <?php if (empty($ultimosMembros)): ?>
        <div style="padding:2rem; text-align:center;">
            <p style="font-size:0.85rem; color:#bbb;">Ainda não há membros.</p>
        </div>
        <?php else: ?>
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(160px, 1fr)); gap:0;">
            <?php foreach ($ultimosMembros as $mb): ?>
            <a href="<?= base_url('admin/equipe/editar/' . $mb['id']) ?>"
               style="display:flex; flex-direction:column; align-items:center; padding:1.5rem 1rem;
                       text-decoration:none; border-right:1px solid #F5F5F5;
                       border-bottom:1px solid #F5F5F5; transition:background 0.15s;"
               onmouseover="this.style.background='#FAFAFA'"
               onmouseout="this.style.background='transparent'">
                <div style="width:52px; height:52px; background:#F0F0F0; overflow:hidden;
                             border:2px solid #E5E5E5; margin-bottom:0.75rem; flex-shrink:0;">
                    <?php if (!empty($mb['foto'])): ?>
                    <img src="<?= base_url($mb['foto']) ?>" alt=""
                         style="width:100%; height:100%; object-fit:cover;">
                    <?php else: ?>
                    <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <i class="ph ph-user" style="font-size:1.3rem; color:#bbb;"></i>
                    </div>
                    <?php endif; ?>
                </div>
                <p style="font-weight:700; font-size:0.78rem; color:#111; text-align:center; line-height:1.3;">
                    <?= esc($mb['nome']) ?>
                </p>
                <p style="font-size:0.68rem; color:#aaa; text-align:center; margin-top:3px;">
                    <?= esc($mb['cargo']) ?>
                </p>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>


    <!-- Acções rápidas (1/3) -->
    <div style="display:flex; flex-direction:column; gap:0; border:1px solid #E5E5E5; background:#fff;">
        <div style="padding:1.1rem 1.5rem; border-bottom:1px solid #E5E5E5;
                     display:flex; align-items:center; gap:8px;">
            <i class="ph ph-lightning" style="font-size:1rem; color:#373737;"></i>
            <h3 style="font-weight:700; font-size:0.78rem; color:#111;
                        letter-spacing:0.08em; text-transform:uppercase;">
                Acções Rápidas
            </h3>
        </div>

        <?php
        $atalhos = [
            ['url'=>'admin/noticias/criar', 'icone'=>'ph-pencil-line', 'label'=>'Escrever Artigo',  'desc'=>'Nova notícia'],
            ['url'=>'admin/equipe/criar',   'icone'=>'ph-user-plus',   'label'=>'Novo Membro',      'desc'=>'Adicionar à equipa'],
            ['url'=>'admin/servicos/criar', 'icone'=>'ph-plus-square', 'label'=>'Novo Serviço',     'desc'=>'Área jurídica'],
            ['url'=>'admin/utilizadores',   'icone'=>'ph-user-gear',   'label'=>'Utilizadores',     'desc'=>'Gerir acessos'],
            ['url'=>'admin/perfil',         'icone'=>'ph-user-circle', 'label'=>'Meu Perfil',       'desc'=>'Dados e password'],
        ];
        foreach ($atalhos as $a):
        ?>
        <a href="<?= base_url($a['url']) ?>"
           style="display:flex; align-items:center; gap:12px; padding:0.9rem 1.25rem;
                   text-decoration:none; border-bottom:1px solid #F5F5F5; transition:background 0.15s;"
           onmouseover="this.style.background='#FAFAFA'"
           onmouseout="this.style.background='transparent'">
            <div style="width:34px; height:34px; background:#F7F7F7; flex-shrink:0;
                         display:flex; align-items:center; justify-content:center;">
                <i class="ph <?= esc($a['icone']) ?>" style="font-size:1rem; color:#373737;"></i>
            </div>
            <div>
                <p style="font-weight:700; font-size:0.8rem; color:#111;"><?= esc($a['label']) ?></p>
                <p style="font-weight:400; font-size:0.68rem; color:#aaa;"><?= esc($a['desc']) ?></p>
            </div>
            <i class="ph ph-arrow-right" style="font-size:0.82rem; color:#ddd; margin-left:auto;"></i>
        </a>
        <?php endforeach; ?>

        <!-- Info da sessão -->
        <div style="padding:1rem 1.25rem; margin-top:auto; background:#F7F7F7;
                     border-top:1px solid #E5E5E5;">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                <i class="ph ph-shield-check" style="font-size:0.9rem; color:#bbb;"></i>
                <p style="font-size:0.68rem; color:#aaa; letter-spacing:0.08em; text-transform:uppercase;">
                    <?= strtoupper(session('user_role') ?? '') ?>
                </p>
            </div>
            <p style="font-size:0.72rem; color:#999;"><?= esc(session('user_email')) ?></p>
        </div>
    </div>

</div>