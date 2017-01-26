@php

use CodeIgniter\Database\Migration;

class Migration_create_sessions_table extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 9, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => false],
            'timestamp'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => false, 'default' => 0],
            'data'       => ['type' => 'text', 'null' => false, 'default' => ''],
        ]);

    <?php if ($matchIP === true) : ?>
        $this->forge->addKey(['id', 'ip_address'], true);
    <?php else: ?>
        $this->forge->addKey('id', true);
    <?php endif ?>
        $this->forge->addKey('timestamp');
        $this->forge->createTable('<?= $tableName ?>', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('<?= $tableName ?>', true);
    }
}
