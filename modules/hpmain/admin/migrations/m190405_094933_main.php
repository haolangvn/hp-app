<?php

use yii\db\Migration;

/**
 * Class m190505_094933_main
 */
class m190405_094933_main extends Migration {

    public $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        // article
        $this->createTable('{{%hp_article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(125)->notNull(),
            'group' => $this->string(50),
            'content' => $this->text(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
                ], $this->tableOptions);
        $this->createIndex('index_group', '{{%hp_article}}', 'group');


        // translate
        $this->createTable('{{%hp_translate}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(25)->notNull(),
            'language_code' => $this->string(8)->notNull(),
            'message' => 'varbinary(255) NOT NULL',
            'translation' => $this->string(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
                ], $this->tableOptions);
        $this->createIndex('unique_key', '{{%hp_translate}}', ['message', 'language_code', 'category'], true);

        // setting
        $this->createTable('{{%hp_setting}}', [
            'id' => $this->string(40)->notNull(),
            'lang_id' => $this->integer()->notNull()->defaultValue(0),
            'name' => $this->string(40)->notNull(),
            'value' => $this->text(),
            'type' => 'ENUM("richtext", "json") NOT NULL',
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
                ], $this->tableOptions);
        $this->addPrimaryKey('PK', '{{%hp_setting}}', ['id', 'lang_id']);

        // contact
        $this->createTable('{{%hp_contact}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string(125)->notNull(),
            'phone' => $this->string(25)->notNull(),
            'email' => $this->string(50),
            'address' => $this->string(),
            'subject' => $this->string(),
            'content' => $this->text(),
            'ip' => $this->string(25),
            'status' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
                ], $this->tableOptions);
        $this->createIndex('index_fullname', '{{%hp_contact}}', ['fullname']);
        $this->createIndex('index_phone', '{{%hp_contact}}', ['phone']);

        $this->createTable('{{%hp_gallery}}', [
            'id' => $this->primaryKey(),
            'pk' => $this->integer()->notNull(),
            'table_name' => $this->string(50)->notNull(),
            'name' => $this->string(125),
            'uri' => $this->string(125)->notNull(),
            'width' => $this->integer(),
            'height' => $this->integer(),
            'filesize' => $this->integer(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
                ], $this->tableOptions);

        $this->createIndex('gallery_index_table', '{{%hp_gallery}}', ['pk', 'table_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%hp_article}}');
        $this->dropTable('{{%hp_setting}}');
        $this->dropTable('{{%hp_translate}}');
        $this->dropTable('{{%hp_contact}}');
        $this->dropTable('{{%hp_gallery}}');
    }

}
