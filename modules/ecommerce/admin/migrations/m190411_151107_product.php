<?php

use yii\db\Migration;

/**
 * Class m190411_151107_product
 */
class m190411_151107_product extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        // I. Term Vocabulary
        $this->createTable('{{%ec_group_voc}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'weight' => $this->integer()->notNull()->defaultValue(0),
            'description' => $this->string()
        ]);
        $this->createTable('{{%ec_group_term}}', [
            'id' => $this->primaryKey(),
            'vid' => $this->integer()->notNull()->defaultValue(0),
            'sap_id' => $this->string(25)->notNull(),
            'alias' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'weight' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->boolean()->notNull()->defaultValue(true),
            'image_id' => $this->integer(),
            'synced_at' => $this->integer()->notNull()->defaultValue(0),
            'published_at' => $this->integer()->notNull()->defaultValue(0),
            'images_list' => $this->text(),
            'description' => $this->text(),
        ]);
        $this->createIndex('ecgroupterm_index_alias', '{{%ec_group_term}}', 'alias');

        $this->createTable('{{%ec_group}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0),
            'name' => $this->string()->notNull(), // Textiles
            'image_id' => $this->integer(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'weight' => $this->integer()->notNull()->defaultValue(0),
            'image_list' => $this->text(),
            'description' => $this->text(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');


        // II. Set Attribute
        $this->createTable('{{%ec_set}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(), // Trousers
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->createTable('{{%ec_set_attribute}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(), // 1 = integer, 2 = boolean, 3 = string
            'input' => $this->string()->notNull(), // zaa-text, zaa-password
            'name' => $this->string()->notNull(), // Size, Color, Material Type (Jeans), Width, Height
            'values' => $this->text(), // If its a select dropdown the json can be stored in `values` field. Optiosn for zaa-text
            'is_i18n' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%ec_set_attribute_ref}}', [
            'set_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->addPrimaryKey('ec_set_attribute_ref_pk', '{{%ec_set_attribute_ref}}', ['set_id', 'attribute_id']);

        // III. Manuafactory
        $this->createTable('{{%ec_producer}}', [
            'id' => $this->primaryKey(),
            'sap_id' => $this->string(15)->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'slogan' => $this->string(),
            'country' => $this->string(),
            'logo' => $this->string(),
            'image_id' => $this->integer(),
            'status' => $this->boolean()->notNull()->defaultValue(true),
            'weight' => $this->integer()->notNull()->defaultValue(0),
            'synced_at' => $this->integer()->notNull()->defaultValue(0),
            'published_at' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('{{%ec_producer_article}}', [
            'id' => $this->integer()->notNull(),
            'image_id' => $this->integer(),
            'image' => $this->string(),
            'image_list' => $this->text(),
            'description' => $this->text(),
            'history' => $this->text(),
            'meta_link' => $this->string(),
            'meta_title' => $this->string(),
            'meta_desc' => $this->string(),
            'meta_keyword' => $this->string(),
        ]);
        $this->addPrimaryKey('ecproducerarticle_pk', '{{%ec_producer_article}}', 'id');


        // IV. Setting (currency, price list...)
        $this->createTable('{{%ec_currency}}', [
            'id' => $this->primaryKey(),
            'is_default' => $this->boolean()->notNull()->defaultValue(false),
            'name' => $this->string()->notNull(), // CHF, EUR
            'value' => $this->float(2)->notNull(), // 1.00 CHF (which could be the base value) therefore EUR would be 0.90
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->createTable('{{%ec_item_price_list}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'is_default' => $this->boolean()->notNull()->defaultValue(false),
            'effective_at' => $this->integer(),
            'expries_at' => $this->integer(),
            'status' => $this->boolean()->notNull()->defaultValue(true),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');


        // V. Product
        $this->createTable('{{%ec_product_set_ref}}', [
            'product_id' => $this->integer()->notNull(),
            'set_id' => $this->integer()->notNull(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->addPrimaryKey('ec_product_set_ref_pk', '{{%ec_product_set_ref}}', ['product_id', 'set_id']);


        $this->createTable('{{%ec_product_group_ref}}', [
            'group_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->addPrimaryKey('ec_product_group_pk', '{{%ec_product_group_ref}}', ['group_id', 'product_id']);

        $this->createTable('{{%ec_product}}', [
            'id' => $this->primaryKey(),
//            'sap_id', delete from old db
//            'bid', delete from old db
//            'cate_id', delete from old db
            'notes_id' => $this->integer()->notNull()->defaultValue(0),
            'name' => $this->string()->notNull(),
            'fk_name' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'promote' => $this->boolean()->defaultValue(false),
            'is_new' => $this->boolean()->defaultValue(false),
            'status' => $this->boolean()->defaultValue(true),
            'count_view' => $this->integer()->notNull(),
            'cout_sell' => $this->integer()->notNull(),
            'image_id' => $this->integer(),
            'image' => $this->string(),
            'image_list' => $this->text(),
            'orginal' => $this->string(25),
            'pub_year' => $this->string(25),
            'remark' => $this->string(),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
            'synced_at' => $this->integer()->defaultValue(0),
            'published_at' => $this->integer()->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->createTable('{{%ec_product_article}}', [
            'id' => $this->integer()->notNull(),
            'image_id' => $this->integer(),
            'image' => $this->string(),
            'designer' => $this->string(25),
            'remark' => $this->string(),
            'image_list' => $this->text(),
            'notes' => $this->text(),
            'style' => $this->text(),
            'review' => $this->text(),
            'ingredient' => $this->text(),
            'benefit' => $this->text(),
            'howtouse' => $this->text(),
            'description' => $this->text(),
//            'sex', delete from old db
            'meta_link' => $this->string(),
            'meta_title' => $this->string(),
            'meta_desc' => $this->string(),
            'meta_keyword' => $this->string(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->addPrimaryKey('ecproarticle_pk', '{{%ec_product_article}}', 'id');


        $this->createTable('{{%ec_product_item}}', [
            'id' => $this->primaryKey(),
            'sap_id' => $this->string(25)->notNull()->unique(),
            'product_id' => $this->integer()->notNull()->defaultValue(0),
            'producer_id' => $this->integer()->notNull()->defaultValue(0),
            'gender_id' => $this->integer()->notNull()->defaultValue(0),
            'cate_id' => $this->integer()->notNull()->defaultValue(0),
            'group_id' => $this->integer()->notNull()->defaultValue(0),
            'group2_id' => $this->integer()->notNull()->defaultValue(0),
            'group3_id' => $this->integer()->notNull()->defaultValue(0),
            'color_id' => $this->integer()->notNull()->defaultValue(0),
            'collection_id' => $this->integer()->notNull()->defaultValue(0),
            'capa_id' => $this->integer()->notNull()->defaultValue(0),
            'image_id' => $this->integer()->defaultValue(0),
            'capacity' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'fk_name' => $this->string()->notNull(),
            'colour' => $this->string(),
            'image' => $this->string(),
            'image_list' => $this->text(),
            'note' => $this->string(),
            'sku' => $this->string(),
            'qty_available' => $this->integer(),
            'status' => $this->boolean()->defaultValue(true),
            'synced_at' => $this->integer()->defaultValue(0),
            'published_at' => $this->integer()->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->createIndex('ecitem_index_g', '{{%ec_product_item}}', 'group_id');
        $this->createIndex('ecitem_index_g2', '{{%ec_product_item}}', 'group2_id');
        $this->createIndex('ecitem_index_g3', '{{%ec_product_item}}', 'group3_id');
        $this->createIndex('ecitem_index_collect', '{{%ec_product_item}}', 'collection_id');
        $this->createIndex('ecitem_index_capa', '{{%ec_product_item}}', 'capa_id');
        $this->createIndex('ecitem_index_color', '{{%ec_product_item}}', 'color_id');

        $this->createTable('{{%ec_item_attribute_value}}', [
            'item_id' => $this->integer()->notNull(),
            'set_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->text(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addPrimaryKey('ec_item_attribute_value_pk', '{{%ec_item_attribute_value}}', ['item_id', 'attribute_id', 'set_id']);

        $this->createTable('{{%ec_item_price}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'price_list_id' => $this->integer()->notNull(),
            'price' => $this->float(2)->notNull(),
            'stock' => $this->integer()->notNull(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ecitemprice_unique_acp', '{{%ec_item_price}}', ['item_id', 'currency_id', 'price_list_id'], true);

        $this->createTable('{{%ec_item_barcode}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'barcode' => $this->string(25)->notNull(),
            'is_default' => $this->boolean()->defaultValue(false),
            'remark' => $this->string()
        ]);
        $this->createIndex('ecbarcode_unique', '{{%ec_item_barcode}}', ['item_id', 'barcode'], true);

        $this->createTable('{{%ec_product_comment}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->defaultValue(0),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'product_id' => $this->integer()->notNull(),
            'is_admin' => $this->integer()->notNull()->defaultValue(0),
            'fullname' => $this->string(50),
            'email' => $this->string(50),
            'status' => $this->boolean()->defaultValue(false),
            'star' => $this->integer(),
            'ip' => $this->string(50),
            'content' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->createTable('{{%ec_nav}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'alias' => $this->string(125)->notNull(),
            'name' => $this->string(125)->notNull(),
            'position' => $this->string(125),
            'route' => $this->string(125),
            'data_json' => $this->string(),
            'is_hidden' => $this->integer()->notNull()->defaultValue(0),
            'is_offline' => $this->integer()->notNull()->defaultValue(0),
            'is_deleted' => $this->integer()->notNull()->defaultValue(0),
            'sort_index' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'meta_title' => $this->string(),
            'meta_desc' => $this->string(),
            'meta_keyword' => $this->string(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ecnav_index_alias', '{{%ec_nav}}', 'alias');
        // VI. LOG
//        $this->createTable('{{%ec_ngrest_log}}', [
//            'id' => $this->primaryKey(),
//            'user_id' => $this->integer(),
//            'timestamp_create' => $this->integer(),
//            'route' => $this->text(80),
//            'api' => $this->text(80),
//            'is_update' => $this->boolean()->defaultValue(0),
//            'is_insert' => $this->boolean()->defaultValue(0),
//            'attributes_json' => $this->text(),
//            'attributes_diff_json' => $this->text(),
//            'pk_value' => $this->string()->notNull(),
//            'table_name' => $this->string()->notNull(),
//            'is_delete' => $this->boolean()->defaultValue(0)
//        ]);
//        $this->createIndex('eclog_index', '{{%ec_ngrest_log}}', ['pk_value', 'table_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        // V. Product
        if ($this->getDb()->getTableSchema('{{%ec_product_comment}}', true) !== NULL) {
            $this->dropTable('{{%ec_product_comment}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_nav}}', true) !== NULL) {
            $this->dropTable('{{%ec_nav}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_product}}', true) !== NULL) {
            $this->dropTable('{{%ec_product}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_product_group_ref}}', true) !== NULL) {
            $this->dropTable('{{%ec_product_group_ref}}');
        }

        if ($this->getDb()->getTableSchema('{{%ec_product_set_ref}}', true) !== NULL) {
            $this->dropTable('{{%ec_product_set_ref}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_product_article}}', true) !== NULL) {
            $this->dropTable('{{%ec_product_article}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_item_attribute_value}}', true) !== NULL) {
            $this->dropTable('{{%ec_item_attribute_value}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_item_barcode}}', true) !== NULL) {
            $this->dropTable('{{%ec_item_barcode}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_item_price}}', true) !== NULL) {
            $this->dropTable('{{%ec_item_price}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_product_item}}', true) !== NULL) {
            $this->dropTable('{{%ec_product_item}}');
        }

        // IV. Setting
        if ($this->getDb()->getTableSchema('{{%ec_item_price_list}}', true) !== NULL) {
            $this->dropTable('{{%ec_item_price_list}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_currency}}', true) !== NULL) {
            $this->dropTable('{{%ec_currency}}');
        }


        // III. Manuafactory
        if ($this->getDb()->getTableSchema('{{%ec_producer}}', true) !== NULL) {
            $this->dropTable('{{%ec_producer}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_producer_article}}', true) !== NULL) {
            $this->dropTable('{{%ec_producer_article}}');
        }


        // II. Set Attribute
        if ($this->getDb()->getTableSchema('{{%ec_set}}', true) !== NULL) {
            $this->dropTable('{{%ec_set}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_set_attribute}}', true) !== NULL) {
            $this->dropTable('{{%ec_set_attribute}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_set_attribute_ref}}', true) !== NULL) {
            $this->dropTable('{{%ec_set_attribute_ref}}');
        }

        // I. Term Vocabulary
        if ($this->getDb()->getTableSchema('{{%ec_group_term}}', true) !== NULL) {
            $this->dropTable('{{%ec_group_term}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_group_voc}}', true) !== NULL) {
            $this->dropTable('{{%ec_group_voc}}');
        }
        if ($this->getDb()->getTableSchema('{{%ec_group}}', true) !== NULL) {
            $this->dropTable('{{%ec_group}}');
        }

//        if ($this->getDb()->getTableSchema('{{%ec_ngrest_log}}', true) !== NULL) {
//            $this->dropTable('{{%ec_ngrest_log}}');
//        }
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190411_151107_product cannot be reverted.\n";

      return false;
      }
     */
}
