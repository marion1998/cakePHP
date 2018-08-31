<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film[]|\Cake\Collection\CollectionInterface $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'addbefore']) ?></li>
    </ul>
</nav>
<div class="film index large-9 medium-8 columns content">



    <?= $this->Form->create(null , ['action'=>'filter']) ?>
    <fieldset>
        <legend><?= __('Recherche un film') ?></legend>
        <?= $this->Form->control('Keyword') ?>
    </fieldset>
<?= $this->Form->button(__('Chercher')); ?>
<?= $this->Form->end() ?>




    <h3><?= __('Film') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idFilm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateSortie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISPO') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($film as $film): ?>
            <tr>
                <td><?= $this->Number->format($film->idFilm) ?></td>
                <td><?= h($film->titre) ?></td>
                <td><?= h($film->dateSortie) ?></td>
                <td><?= h($film->duree) ?></td>
                <td><?= h($film->DISPO) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $film->idFilm]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->idFilm]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->idFilm], ['confirm' => __('Are you sure you want to delete # {0}?', $film->idFilm)]) ?>
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
