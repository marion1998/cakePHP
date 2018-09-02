<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
</nav>
<div class="reservation index large-9 medium-8 columns content">
    <h3><?= __('Reservation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idReservation','Reservation n°') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idFilm','Title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->idReservation) ?></td>
                <td><?= $this->Number->format($reservation->idFilm) ?></td>
                <td class="actions">
                    <?= $this->Html->link(
                        'Give it back',['controller'=>'reservation','action'=>'deleteReservation',$reservation->idReservation,$reservation->idFilm]); ?>
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