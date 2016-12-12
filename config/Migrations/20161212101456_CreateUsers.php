<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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

        $table->addColumn('username', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 100
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 100
        ]);

        $table->addColumn('created', 'datetime');

        $table->addColumn('email', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 150
        ]);

        $table->addColumn('token', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 255
        ]);

        $table->addColumn('activated', 'datetime', ['null' => true]);

        $table->create();
    }
}
