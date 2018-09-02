<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $film->idFilm],
                ['confirm' => __('Are you sure you want to delete # {0}?', $film->idFilm)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="film form large-9 medium-8 columns content">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <legend><?= __('Edit Film') ?></legend>
        <?php
            echo "<h3>".$film->titre."</h3>";
            echo $this->Form->control('dateSortie', ['label'=>'Release date' ,'empty' => true]);
            echo $this->Form->control('duree', ['label'=>'Duration' ,'empty' => true]);
            echo $this->Form->control('synopsis', ['label'=>'Synopsis']);
            echo $this->Form->control('DISPO',['label'=>'Disponibility','options' => ['1' => 'Available','0' => 'Not available']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
