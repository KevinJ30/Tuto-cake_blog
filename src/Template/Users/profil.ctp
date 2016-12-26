<div class="row">
    <div class="col-md-12">
        <h1>Mon profil</h1>
        <hr />
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Mes informations</h3>
                </div>
                <div class="panel-body">
                    <p><strong>Nom d'utilisateur : </strong><?= $user->username ?></p>
                    <p><strong>Date de création : </strong><?= $user->created->format('d/m/y') ?></p>
                    <p><strong>Date d'activation : </strong><?= $user->activated->format('d/m/y') ?></p>
                    <p><strong>Adresse e-mail : </strong><?= $user->email ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Modifier mon profil</h3>
                </div>
                <div class="panel-body">
                    <?= $this->Form->create($user) ?>
                    <?= $this->Form->input('username', ['label' => false, 'placeholder' => "Nom d'utilisateur"]) ?>
                    <?= $this->Form->input('email', ['label' => false, 'placeholder' => "Adresse e-mail"]) ?>
                    <?= $this->Html->link('Modifier mon mot de passe', ['prefix' => false, 'controller' => 'users', 'action' => 'updatePassword' ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr />
            <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enregistrer', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
            <?= $this->Form->Html->link('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Annuler',
                ['prefix' => false, 'controller' => 'users', 'action' => 'profil'],
                ['class' => 'btn btn-danger', 'escape' => false]) ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>