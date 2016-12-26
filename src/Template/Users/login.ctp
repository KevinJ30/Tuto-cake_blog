<div class="row">
    <div class="col-md-12">
        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Authentification</h1>
        <hr/>
        <?= $this->Flash->render('Auth') ?>
        <?= $this->Form->create() ?>
            <?= $this->Form->input('username', ['label' => false, 'placeholder' => 'Nom d\'utilisateur']) ?>
            <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Mot de passe']) ?>
            <hr/>
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Se connecter', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
        <?= $this->Form->Html->link('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Annuler',
                ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index'],
                ['class' => 'btn btn-danger', 'escape' => false]
        ) ?>
        <p>
            <p><?= $this->Html->link('J\'ai oublier mon mot de passe ?', ['prefix' => false, 'controller' => 'users', 'action' => 'inscription']) ?></p>
            <p><?= $this->Html->link('Pas encore inscrit ?', ['prefix' => false, 'controller' => 'users', 'action' => 'inscription']) ?></p>
        </p>
        <?= $this->Form->end() ?>
    </div>
</div>