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
        $this->createIndex('hp-article_index_group', '{{%hp_article}}', 'group');

        $this->createTable('{{%hp_translate}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(25)->notNull(),
            'language_code' => $this->string(8)->notNull()
        ]);
        $this->addColumn('{{%hp_translate}}', 'message', 'varbinary(255) NOT NULL');
        $this->addColumn('{{%hp_translate}}', 'translation', 'string(255)');
        $this->addColumn('{{%hp_translate}}', 'created_at', 'int(11) default 0');
        $this->addColumn('{{%hp_translate}}', 'updated_at', 'int(11) default 0');
        $this->createIndex('hp-translate_unique', '{{%hp_translate}}', ['message', 'language_code', 'category'], true);

        $this->createTable('{{%hp_setting}}', [
            'id' => $this->string(40)->notNull(),
            'name' => $this->string(40)->notNull(),
            'value' => $this->text()
        ]);
        $this->addColumn('{{%hp_setting}}', 'type', 'ENUM("richtext", "json") NOT NULL');
        $this->addColumn('{{%hp_setting}}', 'created_at', 'int(11) default 0');
        $this->addColumn('{{%hp_setting}}', 'updated_at', 'int(11) default 0');
        $this->addPrimaryKey('hp-setting_pk', '{{%hp_setting}}', 'id');
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
