<div class="row">
    <div class="col-md-12">
        <h1>Liste des articles</h1>
        <?= $this->Html->link('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un article',
            ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'add'],
            ['class' => 'btn btn-default', 'escape' => false]) ?>
        <hr/>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center">Titre</th>
                <th class="text-center">Url</th>
                <th class="text-center">Catégorie associé</th>
                <th class="text-center">Date de création</th>
                <th class="text-center">Date de modification</th>
                <th class="text-center">Publier</th>
                <th>Actions</th>
            </tr>
            <?php if($articles->count()) : ?>
                <?php foreach($articles as $article) : ?>
                    <tr>
                        <td><?= $article->title ?></td>
                        <td><?= $article->slug ?></td>
                        <td><?= $article->category->title ?></td>
                        <td><?= $article->created->format('dd-mm-yyyy') ?></td>
                        <td><?= $article->modified->format('dd-mm-yyyy') ?></td>
                        <td><?= $article->publish ?></td>
                        <td>
                            <?= $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'edit', $article->id], ['escape' => false, 'class' => 'btn btn-sm btn-primary']) ?>
                            <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['prefix' => 'admin', 'controller' => 'articles', 'action' => 'delete', $article->id], ['confirm' => 'Etes vous sur de vouloir supprimer la catégorie ?', 'class' => 'btn btn-sm btn-danger', 'escape' => false]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Aucun Article</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
