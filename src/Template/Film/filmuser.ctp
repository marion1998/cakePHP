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
        <!-- <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'addbefore']) ?></li> -->
        <?php foreach ($cart as $v): ?>
        <li><?= $v['title'] ?><?= $this->Html->link(
                        'x',['controller'=>'cart','action'=>'removeFromCart',$v['id']])?></li>
        <?php endforeach ?>
    </ul>
</nav>
<div class="film index large-9 medium-8 columns content">
    <h3><?= __('Film') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('idFilm') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateSortie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISPO') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($film as $film): ?>
            <tr>
                <!-- <td><?= $this->Number->format($film->idFilm) ?></td> -->
                <td><?= h($film->titre) ?></td>
                <td><?= strftime('%e %B %Y',strtotime(h($film->dateSortie))) ?></td>
                <td><?= h($film->duree)." minutes" ?></td>
                <td><?= h($film->DISPO)==1?"Disponible":"Non disponible" ?></td>
                <td class="">
                    <?= $this->Html->test ?>
                    <?= $this->Html->link(__('Plus de détails'), ['action' => 'view', $film->idFilm]) ?>
                
                    <?= $this->Html->link(
                        'To cart',['controller'=>'cart','action'=>'addToCart',$film->idFilm,$film->titre],
                        ['class' => 'button']);?>
                    
                    <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $film->idFilm]) ?>
                    <?php //echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->idFilm], ['confirm' => __('Are you sure you want to delete # {0}?', $film->idFilm)]) ?>
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
