    <ul class="list-group">
        <li class="list-group-item list-group-header text-center">Catégories</li>
        <?php foreach($categories as $categorie): ?>
            <li class="list-group-item"><?= $categorie->title ?></li>
        <?php endforeach ?>
    </ul>
