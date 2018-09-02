<?php
$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <?= $this->Html->css('button_home.css') ?>
</head>
<body>
       <div class="view content text-center">
       	<?php if(!$LoggedIn) : ?>
       	<?= $this->Html->meta('icon') ?>
       	<?= $this->Html->link('Login', '/users/login', ['class' => 'button','target' => '_blank']) ?>
       	<?= $this->Html->link('Register', '/users/add', ['class' => 'button','target' => '_blank']) ?>
       	<?php endif ?>

        <?= $this->Html->image('http://www.larchipel.paris/wp-content/uploads/2014/10/logo_simplon.jpg'); ?>
        
        </div>
</body>
</html>
