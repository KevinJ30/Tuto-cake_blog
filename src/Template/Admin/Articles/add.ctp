<div class="row">
    <div class="col-md-12">
        <h1>Ajouter un articles</h1>
        <hr/>

        <?= $this->Form->create($article) ?>
        <?= $this->Form->input('title', ['label' => false, 'placeholder' => 'Titre de l\'article']) ?>
        <?= $this->Form->input('category_id', ['type' => 'select', 'empty' => 'Choisissez une catégorie', 'label' => false]) ?>
        <?= $this->Form->input('content', ['label' => false, 'type' => 'textarea', 'placeholder' => 'Contenu de l\'article']) ?>
        <?= $this->Form->input('publish', ['label' => 'Voulez-vous publier cet article', 'type' => 'checkbox']) ?>
        <hr />
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enregistrer', ['type' => 'submit', 'escape' => false, 'class' => 'btn-success']) ?>
        <?= $this->Form->Html->link('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Annuler',
            ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index'],
            ['class' => 'btn btn-danger', 'escape' => false]) ?>
    </div>
</div>