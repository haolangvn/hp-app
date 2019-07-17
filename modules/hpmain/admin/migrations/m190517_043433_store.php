<?php

use yii\db\Migration;

/**
 * Class m190517_043433_store
 */
class m190517_043433_store extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%hp_store}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'alias' => $this->string(),
            'phone' => $this->string(50),
            'address' => $this->string(),
            'email' => $this->string(50),
            'image' => $this->string(),
            'coordinates' => $this->string(),
            'province' => $this->string(50)->notNull(),
            'region' => $this->string(25),
            'system' => $this->string(100)->notNull(),
            'content' => $this->text(),
            'sort_order' => $this->integer()->notNull()->defaultValue(0),
            'is_hidden' => $this->boolean()->notNull()->defaultValue(false),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0),
            'created_by' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_by' => $this->integer(11)->notNull()->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('hp_store_idx_name', '{{%hp_store}}', ['name']);
        $this->createIndex('hp_store_idx_alias', '{{%hp_store}}', ['alias']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%hp_store}}');
    }

}
