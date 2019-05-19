<?php

use yii\db\Migration;

/**
 * Class m190505_094933_main
 */
class m190405_094933_main extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%hp_article}}', [
            'id' => $this->primaryKey(),
            'group' => $this->string(50)->notNull(),
            'name' => $this->string(125)->notNull(),
            'content' => $this->text(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
        $this->createIndex('index_group', '{{%hp_article}}', 'group');

        $this->createTable('{{%hp_translate}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(25)->notNull(),
            'language_code' => $this->string(8)->notNull(),
            'message' => 'varbinary(255) NOT NULL',
            'translation' => $this->string(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
        $this->createIndex('unique_key', '{{%hp_translate}}', ['message', 'language_code', 'category'], true);

        $this->createTable('{{%hp_setting}}', [
            'id' => $this->string(40)->notNull(),
            'name' => $this->string(40)->notNull(),
            'value' => $this->text(),
            'type' => 'ENUM("richtext", "json") NOT NULL',
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
        $this->addPrimaryKey('PK', '{{%hp_setting}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        if ($this->getDb()->getTableSchema('{{%hp_article}}', true) !== NULL) {
            $this->dropTable('{{%hp_article}}');
        }

        if ($this->getDb()->getTableSchema('{{%hp_translate}}', true) !== NULL) {
            $this->dropTable('{{%hp_translate}}');
        }

        if ($this->getDb()->getTableSchema('{{%hp_setting}}', true) !== NULL) {
            $this->dropTable('{{%hp_setting}}');
        }
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190505_094933_main cannot be reverted.\n";

      return false;
      }
     */
}
