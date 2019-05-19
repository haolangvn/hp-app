<?php

use yii\db\Migration;

/**
 * Class m190515_071710_contact
 */
class m190405_094999_contact extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->createTable('{{%hp_contact}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string(125)->notNull(),
            'phone' => $this->string(25)->notNull(),
            'email' => $this->string(50),
            'address' => $this->string(),
            'content' => $this->text(),
            'ip' => $this->string(25),
            'created_at' => $this->integer()->defaultValue(0),
            'update_at' => $this->integer()->defaultValue(0),
        ]);
        $this->createIndex('index_fullname', '{{%hp_contact}}', ['fullname']);
        $this->createIndex('index_phone', '{{%hp_contact}}', ['phone']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        if ($this->db->getTableSchema('{{%hp_contact}}', true) != null) {
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
