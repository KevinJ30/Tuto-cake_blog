<div class="row">
    <div class="col-md-12">
        <h2>Modifier une categorie</h2>
        <hr />
        <?= $this->Form->create($categorie) ?>
        <?= $this->Form->input('title', ['label' => false, 'placeholder' => 'Titre de la categorie']) ?>
        <?= $this->Form->input('description', ['label' => false, 'placeholder' => 'Description de la categorie']) ?>
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enregistrer', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
        <?= $this->Form->Html->link('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Annuler',
            ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'index'],
            ['class' => 'btn btn-danger', 'escape' => false]) ?>
        <?= $this->Form->end(); ?>
    </div>
</div>