<?php
use App\Controller\AppController;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film[]|\Cake\Collection\CollectionInterface $film
 */
 setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Cart') ?></li>
        <?php foreach ($cart as $v): ?>
        <li><?= $v['title'] ?><?= $this->Html->link(
                        'x',['controller'=>'cart','action'=>'removeFromCart',$v['id']])?></li>
        <?php endforeach ?>
    </ul>
    <?php if($cart!=[]) : ?>
    <?= $this->Html->link('Validate cart',['controller'=>'reservation','action'=>'createReservation']) ?>
    <?php endif ; ?>
</nav>
<div class="film index large-9 medium-8 columns content">
    <?= $this->Form->create(null , ['action'=>'filter']) ?>
    <fieldset>
        <legend><?= __('Search a film') ?></legend>
        <?= $this->Form->control('Keyword') ?>
    </fieldset>
    <?= $this->Form->button(__('Let\'s go')); ?>
    <?= $this->Form->end() ?>

    <h3><?= __('Film') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('idFilm') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('titre','Title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateSortie','Release date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree','Duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISPO','Disponibility') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($film as $film): ?>
            <tr>
                <td>
                <?= $this->Html->link(__(h($film->titre)), ['action' => 'viewuser', $film->idFilm]) ?></td>
                <td><?= date('j F Y',strtotime(h($film->dateSortie))) ?></td>
                <td><?= h($film->duree)." minutes" ?></td>
                <td><?= h($film->DISPO)==1?"Available":"Not available" ?></td>
                <td class="">
                    <?= $this->Html->test ?>
                
                    <?php if($film->DISPO == 1): ?>
                        <?php if(!in_array($film->idFilm,array_column($cart,'id'))) : ?>
                            <?= $this->Html->link('Add to cart',['controller'=>'cart','action'=>'addToCart',$film->idFilm,$film->titre]) ?>
                        <?php else : ?>
                            <?= "Already in your cart" ?>
                         <?php endif ; ?>
                    <?php endif ; ?>

                    <?php if(in_array($film->idFilm,array_column($borrowed,'idFilm'))) : ?>
                    <?= $this->Html->link(
                        'Give it back',['controller'=>'reservation','action'=>'deleteReservation',$borrowed[array_search($film->idFilm,array_column($borrowed,'idFilm'))]['idReservation'],$film->idFilm]) ?>
                    <?php endif ; ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
