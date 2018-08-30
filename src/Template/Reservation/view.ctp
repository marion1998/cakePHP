<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->idreservation]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->idreservation], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->idreservation)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservation view large-9 medium-8 columns content">
    <h3><?= h($reservation->idreservation) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Idreservation') ?></th>
            <td><?= $this->Number->format($reservation->idreservation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdFilm') ?></th>
            <td><?= $this->Number->format($reservation->idFilm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdUser') ?></th>
            <td><?= $this->Number->format($reservation->idUser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reservation->created) ?></td>
        </tr>
    </table>
</div>
