<?php
/**
 * View: admin/dashboard/index.php
 * Controller: Admin\Dashboard::index()
 */
?>

<!-- Cabeçalho da página -->
<div style="margin-bottom:2rem;">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:6px;">
        <i class="ph ph-squares-four" style="font-size:1.2rem; color:#373737;"></i>
        <h2 style="font-weight:700; font-size:1.4rem; color:#111; line-height:1;">Dashboard</h2>
    </div>
    <p style="font-weight:400; font-size:0.85rem; color:#aaa;">
        Bem-vindo, <?= esc(session('user_nome')) ?>. Aqui está o resumo do sistema.
    </p>
</div>


<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <?php foreach ($stats as $idx => $s): ?>
    <div style="background:#fff; border:1px solid #E5E5E5; padding:1.5rem;
                 animation: adminFadeIn 0.4s ease <?= $idx * 0.06 ?>s both;">
        <div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:1rem;">
            <div style="width:40px; height:40px; background:#F7F7F7; display:flex;
                         align-items:center; justify-content:center;">
                <i class="ph <?= esc($s['icone']) ?>" style="font-size:1.1rem; color:#373737;"></i>
            </div>
            <span style="font-weight:700; font-size:2rem; color:#111; line-height:1;">
                <?= $s['valor'] ?>
            </span>
        </div>
        <p style="font-weight:400; font-size:0.72rem; letter-spacing:0.1em;
                   text-transform:uppercase; color:#999;">
            <?= esc($s['label']) ?>
        </p>
    </div>
    <?php endforeach; ?>
</div>


<div class="grid lg:grid-cols-3 gap-6">

    <!-- Actividade recente (2/3) -->
    <div style="background:#fff; border:1px solid #E5E5E5; padding:0;" class="lg:col-span-2">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #E5E5E5;
                     display:flex; align-items:center; justify-content:space-between;">
            <h3 style="font-weight:700; font-size:0.85rem; color:#111;
                        letter-spacing:0.05em; text-transform:uppercase;">
                Actividade Recente
            </h3>
            <i class="ph ph-clock-clockwise" style="font-size:1rem; color:#bbb;"></i>
        </div>

        <div>
            <?php foreach ($actividade as $idx => $act): ?>
            <div style="display:flex; align-items:flex-start; gap:14px;
                         padding:1rem 1.5rem; border-bottom:1px solid #F5F5F5;
                         animation: adminFadeIn 0.4s ease <?= 0.2 + $idx*0.07 ?>s both;"
                 onmouseover="this.style.background='#FAFAFA'"
                 onmouseout="this.style.background='transparent'">
                <div style="width:34px; height:34px; background:#F7F7F7; flex-shrink:0;
                             display:flex; align-items:center; justify-content:center; margin-top:1px;">
                    <i class="ph <?= esc($act['icone']) ?>" style="font-size:0.95rem; color:#555;"></i>
                </div>
                <div style="flex:1; min-width:0;">
                    <p style="font-weight:400; font-size:0.88rem; color:#333; line-height:1.4;">
                        <?= esc($act['msg']) ?>
                    </p>
                    <p style="font-weight:400; font-size:0.72rem; color:#bbb; margin-top:3px;">
                        <?= esc($act['quando']) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Atalhos rápidos (1/3) -->
    <div style="display:flex; flex-direction:column; gap:6px;">

        <div style="padding:0.9rem; border:1px solid #E5E5E5; background:#fff;
                     display:flex; align-items:center; gap:6px; margin-bottom:4px;">
            <i class="ph ph-lightning" style="font-size:1rem; color:#373737;"></i>
            <p style="font-weight:700; font-size:0.72rem; letter-spacing:0.1em;
                       text-transform:uppercase; color:#111;">Acções Rápidas</p>
        </div>

        <?php
        $atalhos = [
            ['url'=>'admin/equipe/criar',   'icone'=>'ph-user-plus',     'label'=>'Novo Membro',   'desc'=>'Adicionar à equipa'],
            ['url'=>'admin/servicos/criar',  'icone'=>'ph-plus-square',   'label'=>'Novo Serviço',  'desc'=>'Criar área jurídica'],
            ['url'=>'admin/noticias/criar',  'icone'=>'ph-pencil-line',   'label'=>'Novo Artigo',   'desc'=>'Publicar notícia'],
            ['url'=>'admin/utilizadores',    'icone'=>'ph-user-gear',     'label'=>'Utilizadores',  'desc'=>'Gerir acessos'],
            ['url'=>'contact',               'icone'=>'ph-envelope-open', 'label'=>'Mensagens',     'desc'=>'Ver contactos'],
        ];
        foreach ($atalhos as $idx => $a):
        ?>
        <a href="<?= base_url($a['url']) ?>"
           style="display:flex; align-items:center; gap:12px; padding:0.85rem 1rem;
                   background:#fff; border:1px solid #E5E5E5; text-decoration:none;
                   transition:all 0.2s; animation: adminFadeIn 0.4s ease <?= 0.15 + $idx*0.06 ?>s both;"
           onmouseover="this.style.borderColor='#373737';this.style.background='#FAFAFA'"
           onmouseout="this.style.borderColor='#E5E5E5';this.style.background='#fff'">
            <div style="width:34px; height:34px; background:#F7F7F7; flex-shrink:0;
                         display:flex; align-items:center; justify-content:center;">
                <i class="ph <?= esc($a['icone']) ?>" style="font-size:1rem; color:#373737;"></i>
            </div>
            <div>
                <p style="font-weight:700; font-size:0.82rem; color:#111;"><?= esc($a['label']) ?></p>
                <p style="font-weight:400; font-size:0.72rem; color:#aaa;"><?= esc($a['desc']) ?></p>
            </div>
            <i class="ph ph-arrow-right" style="font-size:0.85rem; color:#ccc; margin-left:auto;"></i>
        </a>
        <?php endforeach; ?>

    </div>

</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
    <?php
    $infos = [
        ['icone'=>'ph-user-circle',  'label'=>'Utilizador',       'valor'=> esc(session('user_nome'))],
        ['icone'=>'ph-shield-check', 'label'=>'Papel',             'valor'=> strtoupper(session('user_role') ?? '')],
        ['icone'=>'ph-calendar',     'label'=>'Sessão iniciada',   'valor'=> date('d M Y, H:i')],
    ];
    foreach ($infos as $inf):
    ?>
    <div style="background:#fff; border:1px solid #E5E5E5; padding:1.25rem;
                 display:flex; align-items:center; gap:12px;">
        <i class="ph <?= $inf['icone'] ?>" style="font-size:1.2rem; color:#bbb;"></i>
        <div>
            <p style="font-weight:400; font-size:0.65rem; letter-spacing:0.12em;
                       text-transform:uppercase; color:#bbb;"><?= $inf['label'] ?></p>
            <p style="font-weight:700; font-size:0.9rem; color:#333; margin-top:2px;">
                <?= $inf['valor'] ?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
</div>