<div class="row">
    <div class="col-md-12">

        <?php if(!$articles->count()) : ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <strong>Il n'y a aucun article présent sur le blog.</strong>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach($articles as $article) : ?>
            <article>
                <h1><?= $article->title ?></h1>
                <hr />
                <p><?= $article->content ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</div>