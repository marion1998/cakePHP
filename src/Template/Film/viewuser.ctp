<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Cart') ?></li>
        <?php foreach ($cart as $v): ?>
        <li><?= $v['title'] ?><?= $this->Html->link(
                        'x',['controller'=>'cart','action'=>'removeFromCart',$v['id']])?></li>
        <?php endforeach ?>
    </ul>
    <?= $this->Html->link('Validate cart',['controller'=>'reservation','action'=>'createReservation']);?>
</nav>
<div class="film view large-9 medium-8 columns content">
    <h3><?= h($film->idFilm) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= 'Title' ?></th>
            <td><?= h($film->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= 'Disponibility' ?></th>
            <td><?= h($film->DISPO)=="1"?"Available":"Not available" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= 'Release date' ?></th>
            <td><?= date('j F Y',strtotime(h($film->dateSortie))) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= 'Duration' ?></th>
            <td><?= h($film->duree). " minutes" ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= 'Synopsis' ?></h4>
        <?= $this->Text->autoParagraph(h($film->synopsis)); ?>
    </div>

    <?php if($film->DISPO == 1) : ?>
    <?= $this->Html->link(
    'Add to cart',['controller'=>'cart','action'=>'addToCart',$film->idFilm,$film->titre]
    ) ?>
    <?php endif ; ?>

    <?php if(in_array($film->idFilm,array_column($borrowed,'idFilm'))) : ?>
    <?= $this->Html->link(
    'Give it back',['controller'=>'reservation','action'=>'deleteReservation',$borrowed[array_search($film->idFilm,array_column($borrowed,'idFilm'))]['idReservation'],$film->idFilm]) ?>
    <?php endif ; ?>
</div>
