<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */

use Cake\I18n\Time;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="film form large-9 medium-8 columns content">
   <?php
    $content = file_get_contents("http://www.omdbapi.com/?apikey=f26a44c6&t=".str_replace(" ","+",$titlesub));
    $result  = json_decode($content);
    ?>
    
    <?= $this->Form->create($film) ?>
    <fieldset>
        <legend><?= __('Add Film') ?></legend>
        <?php
            if ($result->Response == "True"){
                echo $this->Form->control('titre',['value' => $result->Title]);
                echo $this->Form->control('dateSortie', ['empty' => true, 'value' => $result->Released]);
                echo $this->Form->control('duree', ['empty' => true, 'value' => intval($result->Runtime)]);
                echo $this->Form->control('synopsis',['value' => $result->Plot]);
                echo $this->Form->control('DISPO', ['options' => ['1' => 'Disponible','0' => 'Indisponible'], 'value' => '1']);
            }else{
                echo $this->Form->control('titre',['value' => $titlesub]);
                echo $this->Form->control('dateSortie', ['empty' => true]);
                echo $this->Form->control('duree', ['empty' => true]);
                echo $this->Form->control('synopsis');
                echo $this->Form->control('DISPO', ['options' => ['1' => 'Disponible','0' => 'Indisponible'], 'value' => '1']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
