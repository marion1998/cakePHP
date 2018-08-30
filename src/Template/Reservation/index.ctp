<!--<warning>Bake cannot generate associations for composite primary keys at this time</warning>.-->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservation index large-9 medium-8 columns content">
    <h3><?= __('Reservation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idreservation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idFilm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idUser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservation as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->idreservation) ?></td>
                <td><?= $this->Number->format($reservation->idFilm) ?></td>
                <td><?= $this->Number->format($reservation->idUser) ?></td>
                <td><?= h($reservation->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->idreservation]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->idreservation]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->idreservation], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->idreservation)]) ?>
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
