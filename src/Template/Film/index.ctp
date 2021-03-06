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

    <h3><?= __('Film') ?>
        
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idFilm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titre','Title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateSortie','Release date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree','Duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISPO','Disponilibity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($film as $film): ?>
            <tr>
                <td><?= $this->Number->format($film->idFilm) ?></td>
                <td>
                <?= $this->Html->link(__(h($film->titre)), ['action' => 'view', $film->idFilm]) ?></td>
                <td><?= date('j F Y',strtotime(h($film->dateSortie))) ?></td>
                <td><?= h($film->duree)." minutes" ?></td>
                <td><?= h($film->DISPO)==1?"Available":"Not available" ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->idFilm]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->idFilm], ['confirm' => __('Are you sure you want to delete #{0} : "{1}"?', $film->idFilm,$film->titre)]) ?>
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
