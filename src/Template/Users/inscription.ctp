<div class="col-md-12">

    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Créer votre compte</h1>
    <hr/>
    <?= $this->Form->create($user) ?>
        <?= $this->Form->input('username', ['label' => false, 'placeholder' => 'Nom d\'utilisateur']) ?>
        <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Mot de passe']) ?>
        <?= $this->Form->input('confirm-password', ['label' => false, 'placeholder' => 'Confirmation du mot de passe', 'type' => 'password']);?>
        <?= $this->Form->input('email', ['label' => false, 'placeholder' => 'Votre adresse e-mail']) ?>
        <hr/>
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> S\'inscrire', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
        <?= $this->Form->Html->link('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Annuler',
            ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index'],
            ['class' => 'btn btn-danger', 'escape' => false]
        ) ?>
    <?= $this->Form->end(); ?>

</div>