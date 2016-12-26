<?php
use Migrations\AbstractMigration;

class UpdateUsers extends AbstractMigration
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
        $table = $this->table('users');

        $table->addColumn('tmp_password', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 100
        ]);

        $table->update();
    }
}
