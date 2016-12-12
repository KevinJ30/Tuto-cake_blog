<div class="col-md-12">

    <h1>Créer votre compte</h1>
    <hr/>
    <?= $this->Form->create($user) ?>
        <?= $this->Form->input('username', ['label' => false, 'placeholder' => 'Nom d\'utilisateur']) ?>
        <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Mot de passe']) ?>
        <?= $this->Form->input('confirm-password', ['label' => false, 'placeholder' => 'Confirmation du mot de passe', 'type' => 'password']);?>
        <?= $this->Form->input('email', ['label' => false, 'placeholder' => 'Votre adresse e-mail']) ?>
        <?= $this->Form->button('s\'inscrire', ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link('Annuler', $this->request->referer(), ['class' => 'btn btn-danger']); ?>
    <?= $this->Form->end(); ?>

</div>