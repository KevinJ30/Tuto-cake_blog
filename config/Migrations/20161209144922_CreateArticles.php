<?php
use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles');

        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);

        $table->addColumn('content', 'text', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);

        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime');
        $table->addColumn('publish', 'integer', [
            'default' => '0'
        ]);

        $table->addColumn('category_id', 'integer');
        
        $table->addIndex(['category_id']);
        $table->create();
    }
}
