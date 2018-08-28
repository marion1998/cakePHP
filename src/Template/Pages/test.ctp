<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'JE SUIS AVEUGLE';

?>
    <!DOCTYPE html>
    <html>

    <head>
        <?= $this->Html->charset() ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?= $cakeDescription ?>
            </title>
            <?= $this->Html->meta('icon') ?>
            <?= $this->Html->css('base.css') ?>
            <?= $this->Html->css('style.css') ?>
            <?= $this->Html->css('home.css') ?>
            <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    </head>

    <body class="home">
        <div class="container">
            <form>
                <input type="text" value="test">
                <input type="submit" value="Valider">
            </form>
            <button>Test</button>
            <input type="button" value="what">
            KOINKOINKOIN LAUL
        </div>
    </body>

    </html>
