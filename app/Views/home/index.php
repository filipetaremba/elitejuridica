<?php
/**
 * View: home/index.php
 * Papel: orquestra as secções da página inicial.
 * Cada secção é um ficheiro parcial independente (_banner, _sobre, etc.)
 * Os dados de cada parcial chegam do controller Home::index()
 */
?>

<?= view('home/_banner',   $banner_data) ?>

<?= view('home/_sobre') ?>

<?= view('home/_equipe') ?>

<?= view('home/_parallax') ?>

<?= view('home/_contacto') ?>