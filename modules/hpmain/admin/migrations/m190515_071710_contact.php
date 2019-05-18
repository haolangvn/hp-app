<?php

use yii\db\Migration;

/**
 * Class m190515_071710_contact
 */
class m190515_071710_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->safeDown();
        
        $this->createTable('{{%hp_contact}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->notNull(),
            'email' => $this->string(255),
            'address' => $this->string(255),
            'content' => $this->text()->notNull(),
            'created_at' => $this->integer(11)->defaultValue(0),
            'update_at' => $this->integer(11)->defaultValue(0),
            'ip'=>$this->string(255)
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('hp_contact_idx_fullname', '{{%hp_contact}}', ['fullname']);
        $this->createIndex('hp_contact_idx_phone', '{{%hp_contact}}', ['phone']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $prefix = $this->db->tablePrefix;
        if ($this->db->getTableSchema($prefix . 'hp_contact', true) != null) {
            $this->dropTable('{{%hp_contact}}');
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190515_071710_contact cannot be reverted.\n";

        return false;
    }
    */
}
