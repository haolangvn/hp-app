<?php

use yii\db\Migration;

/**
 * Class m190427_102937_product_relation
 */
class m190413_102937_product_relation extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        // Relationship
        $this->addForeignKey('ecproarticle_fk', '{{%ec_product_article}}', 'id', '{{%ec_product}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecproducer_fk', '{{%ec_producer_article}}', 'id', '{{%ec_producer}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecgroupterm_fk_vid', '{{%ec_group_term}}', 'vid', '{{%ec_group_voc}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitem_fk_producer', '{{%ec_product_item}}', 'producer_id', '{{%ec_producer}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitem_fk_cate', '{{%ec_product_item}}', 'cate_id', '{{%ec_group_term}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitem_fk_gender', '{{%ec_product_item}}', 'gender_id', '{{%ec_group_term}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitem_fk_product', '{{%ec_product_item}}', 'product_id', '{{%ec_product}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('ecitemprice_fk_item', '{{%ec_item_price}}', 'item_id', '{{%ec_product_item}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitemprice_fk_currency', '{{%ec_item_price}}', 'currency_id', '{{%ec_currency}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitemprice_fk_pricelist', '{{%ec_item_price}}', 'price_list_id', '{{%ec_item_price_list}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecsetref_fk_set', '{{%ec_set_attribute_ref}}', 'set_id', '{{%ec_set}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecsetref_fk_attr', '{{%ec_set_attribute_ref}}', 'attribute_id', '{{%ec_set_attribute}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('ecprogroup_fk_product', '{{%ec_product_group_ref}}', 'product_id', '{{%ec_product}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecprogroup_fk_group', '{{%ec_product_group_ref}}', 'group_id', '{{%ec_group}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('ecprosetref_fk_product', '{{%ec_product_set_ref}}', 'product_id', '{{%ec_product}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecprosetref_fk_set', '{{%ec_product_set_ref}}', 'set_id', '{{%ec_set}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecprosetref_fk_comment', '{{%ec_product_comment}}', 'product_id', '{{%ec_product}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('ecbarcode_fk_item', '{{%ec_item_barcode}}', 'item_id', '{{%ec_product_item}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitemvalue_fk_item', '{{%ec_item_attribute_value}}', 'item_id', '{{%ec_product_item}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitemvalue_fk_set', '{{%ec_item_attribute_value}}', 'set_id', '{{%ec_set}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('ecitemvalue_fk_attr', '{{%ec_item_attribute_value}}', 'attribute_id', '{{%ec_set_attribute}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey('ecproarticle_fk', '{{%ec_product_article}}');
        $this->dropForeignKey('ecproducer_fk', '{{%ec_producer_article}}');
        $this->dropForeignKey('ecgroupterm_fk_vid', '{{%ec_group_term}}');
        $this->dropForeignKey('ecitem_fk_producer', '{{%ec_product_item}}');
        $this->dropForeignKey('ecitem_fk_cate', '{{%ec_product_item}}');
        $this->dropForeignKey('ecitem_fk_gender', '{{%ec_product_item}}');
        $this->dropForeignKey('ecitem_fk_product', '{{%ec_product_item}}');

        $this->dropForeignKey('ecitemprice_fk_item', '{{%ec_item_price}}');
        $this->dropForeignKey('ecitemprice_fk_currency', '{{%ec_item_price}}');
        $this->dropForeignKey('ecitemprice_fk_pricelist', '{{%ec_item_price}}');
        $this->dropForeignKey('ecsetref_fk_set', '{{%ec_set_attribute_ref}}');
        $this->dropForeignKey('ecsetref_fk_attr', '{{%ec_set_attribute_ref}}');

        $this->dropForeignKey('ecprogroup_fk_product', '{{%ec_product_group_ref}}');
        $this->dropForeignKey('ecprogroup_fk_group', '{{%ec_product_group_ref}}');
        $this->dropForeignKey('ecprosetref_fk_product', '{{%ec_product_set_ref}}');
        $this->dropForeignKey('ecprosetref_fk_set', '{{%ec_product_set_ref}}');

        $this->dropForeignKey('ecbarcode_fk_item', '{{%ec_item_barcode}}');
        $this->dropForeignKey('ecitemvalue_fk_item', '{{%ec_item_attribute_value}}');
        $this->dropForeignKey('ecitemvalue_fk_set', '{{%ec_item_attribute_value}}');
        $this->dropForeignKey('ecitemvalue_fk_attr', '{{%ec_item_attribute_value}}');
        $this->dropForeignKey('ecprosetref_fk_comment', '{{%ec_product_comment}}');
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190427_102937_product_relation cannot be reverted.\n";

      return false;
      }
     */
}
