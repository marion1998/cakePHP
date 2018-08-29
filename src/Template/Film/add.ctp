<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="film form large-9 medium-8 columns content">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <legend><?= __('Add Film') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('dateSortie', ['empty' => true]);
            echo $this->Form->control('duree', ['empty' => true]);
            echo $this->Form->control('synopsis');
            echo $this->Form->control('DISPO', ['options' => ['1' => 'Disponible','0' => 'Indisponible']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
