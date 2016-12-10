<div class="col-md-2" style="margin-top:1.5em;">
    <ul class="list-group">
        <li class="list-group-item list-group-item-info">Catégories</li>
        <?php foreach($categories as $categorie): ?>
            <li class="list-group-item"><?= $categorie->title ?></li>
        <?php endforeach ?>
    </ul>
</div>