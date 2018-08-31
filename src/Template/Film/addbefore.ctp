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
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ajouter Film') ?></legend>
        <?php
            echo $this->Form->control('titre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Rechercher')) ?>
    <?= $this->Form->end() ?>
</div>
