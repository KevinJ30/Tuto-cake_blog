<div class="row">
    <div class="col-md-12">
        <h1>Modifier mon mot de passe</h1>
        <hr />
        <?= $this->Form->create($user) ?>
        <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Mot de passe']) ?>
        <?= $this->Form->input('confirm-password', ['type' => 'password', 'label' => false, 'placeholder' => 'Confirmation du mot de passe']) ?>
        <hr />
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enregistrer', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
        <?= $this->Form->Html->link('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Annuler',
            ['prefix' => false, 'controller' => 'users', 'action' => 'profil'],
            ['class' => 'btn btn-danger', 'escape' => false]) ?>
    </div>
</div>