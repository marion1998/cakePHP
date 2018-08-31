<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->idFilm]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->idFilm], ['confirm' => __('Are you sure you want to delete # {0}?', $film->idFilm)]) ?> </li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'addbefore']) ?> </li>
    </ul>
</nav>
<div class="film view large-9 medium-8 columns content">
    <h3><?= h($film->idFilm) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($film->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DISPO') ?></th>
            <td><?= h($film->DISPO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdFilm') ?></th>
            <td><?= $this->Number->format($film->idFilm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateSortie') ?></th>
            <td><?= h($film->dateSortie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duree') ?></th>
            <td><?= h($film->duree) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Synopsis') ?></h4>
        <?= $this->Text->autoParagraph(h($film->synopsis)); ?>
    </div>
</div>
