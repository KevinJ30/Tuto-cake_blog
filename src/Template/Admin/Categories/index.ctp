<div class="row">
    <div class="col-md-12">
        <h1>Liste des catégories</h1>
        <?= $this->Html->link('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une categorie',
            ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'add'],
            ['class' => 'btn btn-default', 'escape' => false]) ?>
        <hr/>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center">Titre</th>
                <th class="text-center">Description</th>
                <th class="text-center">Actions</th>
            </tr>
            <?php if($categories->count()) : ?>
                <?php foreach($categories as $categorie) : ?>
                <tr>
                    <td><?= $categorie->title ?></td>
                    <td><?= $categorie->description ?></td>
                    <td>
                        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'edit', $categorie->id], ['escape' => false, 'class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['prefix' => 'admin', 'controller' => 'categories', 'action' => 'delete', $categorie->id], ['confirm' => 'Etes vous sur de vouloir supprimer la catégorie ?', 'class' => 'btn btn-sm btn-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">Aucune catégorie</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
