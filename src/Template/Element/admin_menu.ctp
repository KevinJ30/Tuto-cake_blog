<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <?= $this->Html->image('Logo.png', ['class' => 'logo']) ?>
        </a>
    </div>

    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <?= $this->Html->link(
                    '<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Revenir au site',
                    ['prefix' => false, 'controller' => 'articles', 'action' => 'index'],
                    ['escape' => false]
                ) ?>

            </li>

            <!-- Articles -->

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>  Articles <span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Liste des articles', ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Rédiger un article', ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'add'], ['escape' => false]) ?></li>
                </ul>
            </li>

            <!-- Categories -->

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Categories <span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Liste des catégories', ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'index'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Rédiger un article', ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'add'], ['escape' => false]) ?></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>

                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Mon profil', ['prefix' => false, 'controller' => 'users', 'action' => 'profil'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Se déconnecter', ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['escape' => false]) ?></li>
                </ul>
            </li>
        </ul>
    </div>
</div>