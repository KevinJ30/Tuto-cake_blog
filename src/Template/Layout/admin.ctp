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
    <nav class="navbar navbar-default">
        <?= $this->element('admin_menu') ?>
    </nav>
    <div id="main" class="container">
        <ddiv class="row">
            <div class="col-md-12">
                <?= $this->Flash->render(); ?>
                <?= $this->fetch('content') ?>
            </div>
    </div>
    <?= $this->Html->script('jquery/jquery.js'); ?>
    <?= $this->Html->script('bootstrap/bootstrap.min.js'); ?>
</body>
</html>