<?php
use Migrations\AbstractMigration;

class ChangeNull extends AbstractMigration
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

        $table->changeColumn('tmp_password', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 100
        ]);

        $table->changeColumn('token', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 255
        ]);

        $table->update();
    }
}
