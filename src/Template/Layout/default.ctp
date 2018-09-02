<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left"> 
                <?php if($LoggedIn) : ?>
                    <?php if($Admin) : ?>
                        <li><?= $this->Html->Link('All films' , ['controller' => 'film' , 'action' => 'index']); ?></li>
                        <li><?= $this->Html->Link('All users' , ['controller' => 'users' , 'action' => 'index']); ?></li>
                        <li><?= $this->Html->Link('All reservations' , ['controller' => 'reservation' , 'action' => 'index']); ?></li>
                    <?php else : ?>
                        <li><?= $this->Html->Link('List of films' , ['controller' => 'film' , 'action' => 'filmuser']); ?></li>
                    <?php endif ; ?>
                <?php endif ; ?>
            </ul>
            <ul class="right"> 
                <?php if($LoggedIn) : ?>
                    <?php if(!$Admin) : ?>
                        <li><?= $this->Html->Link('My cart' , ['controller' => '#' , 'action' => '#']); ?></li>
                        <li><?= $this->Html->Link('My reservations' , ['controller' => '#' , 'action' => '#']); ?></li>
                    <?php endif ; ?>
                    <li><?= $this->Html->Link('Logout' , ['controller' => 'users' , 'action' => 'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->Link('Login' , ['controller' => 'users' , 'action' => 'login']); ?></li>
                    <li><?= $this->Html->Link('Register' , ['controller' => 'users' , 'action' => 'add']); ?></li>
                <?php endif ; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
