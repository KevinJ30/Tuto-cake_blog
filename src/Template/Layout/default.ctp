<!-- Layout Front-End -->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tutoriel - Création d'un blog avec CakePHP 3">
        <meta name="author" content="StudioDuWeb">

        <title>Mon Blog</title>

        <?php $this->Html->css('bootstrap.min'); ?>
    </head>
    <body>

        <div class="container">
            <h1>Bienvenue sur mon blog</h1>
        </div>

        <div class="container">
            <?= $this->fetch('content') ?>
        </div>

        <?php $this->Html->script('jquery.min.js'); ?>
        <?php $this->Html->script('bootstrap.min.js'); ?>
        <?php $this->fetch('script'); ?>
    </body>
</html>
