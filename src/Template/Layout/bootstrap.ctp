<!-- Layout Front-End -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tutoriel - Création d'un blog avec CakePHP 3">
    <meta name="author" content="StudioDuWeb">

    <title>Mon Blog</title>

    <?= $this->Html->css('bootstrap/bootstrap.min'); ?>
</head>
<body>

<div class="container">
    <h1>Bienvenue sur mon blog</h1>
</div>

<div class="container">
    <?= $this->Flash->render(); ?>
    <?= $this->fetch('content') ?>
</div>

<?= $this->Html->script('jquery/jquery.js'); ?>
<?= $this->Html->script('bootstrap/bootstrap.min.js'); ?>
</body>
</html>
