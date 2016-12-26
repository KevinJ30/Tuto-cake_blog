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
    <!--<div class="logo">
        <?= $this->Html->image('Logo.png', ['class' => 'logo']) ?>
    </div>
    <div class="title">
        <h1>StudioDuWeb</h1>
    </div>
    <div class="membre">
        <a href="#">Membre</a>
    </div>-->
    <div class="row">
        <div class="col-sm-1">
            <?= $this->Html->image('Logo.png', ['class' => 'logo']) ?>
        </div>
        <div class="col-sm-10">
            <h1 class="title">StudioDuWeb</h1>
        </div>
    </div>
</header>

<div id="main" class="container">

    <div class="row">
        <div class="col-md-3" style="margin-top:1.5em;">
            <?= $this->cell('Categorie') ?>
        </div>
        <div class="col-md-9">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

<footer class="text-center">
    <small><?= $this->Html->link('Vous-êtes administrateur du blog ?', ['prefix' => 'admin', 'controller' => 'dashboard']) ?></small>
</footer>

<?= $this->Html->script('jquery/jquery.js'); ?>
<?= $this->Html->script('bootstrap/bootstrap.min.js'); ?>
</body>
</html>