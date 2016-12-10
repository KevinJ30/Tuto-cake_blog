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
    <?= $this->Html->css('design'); ?>
</head>
<body>

<header>
    <h1>StudioDuWeb</h1>
    <?= $this->Html->image('Logo.png', ['class' => 'logo']) ?>
</header>

<div class="container">
    <?= $this->cell('Categorie') ?>
    <div class="col-md-10">
        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content') ?>
    </div>
</div>

<?= $this->Html->script('jquery/jquery.js'); ?>
<?= $this->Html->script('bootstrap/bootstrap.min.js'); ?>
</body>
</html>
