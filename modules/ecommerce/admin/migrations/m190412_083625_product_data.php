<?php

use yii\db\Migration;

/**
 * Class m190424_083625_product_data
 */
class m190412_083625_product_data extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->bkdata();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        
    }

    public function bkdata() {

        $sql = 'INSERT INTO ec_group_voc SELECT `id`, `alias`, `name`, `weight`, `description` FROM `tbl_vocabulary` WHERE id < 200';
        $this->execute($sql);

        $sql = 'INSERT INTO ec_group_term SELECT `id`, `vid`, `sap_id`, `alias`, `name`, `weight`, `status`, null image_id,  sync_time as `synced_at`, confirmed as `published_at`, NULL AS image_list, `description` FROM `tbl_term` WHERE vid < 200';
        $this->execute($sql);

        $sql = 'INSERT INTO ec_producer SELECT `id`, `sap_id`, `name`, `alias`, `slogan`, `country`, `logo`, null `image_id`, `status`, `weight`, sync_time as `synced_at`, confirmed as `published_at` FROM `tbl_product_brand` WHERE 1';
        $this->execute($sql);

        $sql = 'INSERT INTO ec_producer_article SELECT `id`, null `image_id`, null as `image`, null as `image_list`, `description`, `history`, null as `meta_link`, name_seo as `meta_title`, null as `meta_desc`, null as `meta_keyword` FROM `tbl_product_brand` WHERE 1';
        $this->execute($sql);

        $this->insert('{{%ec_item_price_list}}', [
            'name' => 'Bảng giá bán lẻ',
            'is_default' => true,
            'status' => true
        ]);

        $this->insert('{{%ec_currency}}', [
            'name' => 'VNĐ',
            'is_default' => true,
            'value' => 1
        ]);

        $sql = 'INSERT INTO ec_product SELECT `id`, `notes_id`, `name`, name_seo `fk_name`, `alias`, `promote`, new `is_new`, `status`, countview `count_view`, bestseller `cout_sell`, null `image_id`, thumb `image`, null `image_list`, country `orginal`, `pub_year`, `remark`, `created_at`, `updated_at`, sync_time `synced_at`, confirmed `published_at` FROM `tbl_product` WHERE 1';
        $this->execute($sql);

        $sql = 'INSERT INTO ec_product_article SELECT `id`, null image_id, `image`, `designer`, `remark`, null `image_list`, `notes`, `style`, `review`, `ingredient`, `benefit`, `howtouse`, detail `description`, null `meta_link`, name_seo `meta_title`, null `meta_desc`, null `meta_keyword` FROM `tbl_product` WHERE 1';
        $this->execute($sql);

        $sql = "INSERT INTO ec_product_item (SELECT price.`id`, price.`sap_id`, price.pid `product_id`, price.bid `producer_id`, price.sex `gender_id`, price.`cate_id`, price.`group_id`, price.`group2_id`, price.`group3_id`, price.`color_id`, price.`collection_id`, price.`capa_id`, null `image_id`, price.`capacity`, price.`name`, price.name_seo `fk_name`, price.`colour`, price.`image`, null `image_list`, price.`note`, price.code `sku`, 0 `qty_available`, price.`status`, price.sync_time `synced_at`, price.confirmed `published_at` FROM (select a.* from tbl_product_price as a INNER JOIN tbl_product as b ON a.pid=b.id) as price INNER JOIN tbl_product_brand as brand ON brand.id=price.bid)";
        $this->execute($sql);

        $sql = "INSERT INTO ec_item_price (SELECT null , price.`id`, 1 `currency_id`, 1 `price_list_id`, price.`price`, 0 `stock` FROM (select a.* from tbl_product_price as a INNER JOIN tbl_product as b ON a.pid=b.id) as price INNER JOIN tbl_product_brand as brand ON brand.id=price.bid)";
        $this->execute($sql);

        $sql = "INSERT INTO ec_item_barcode (SELECT null, price.`id`, price.`code`, 1 `is_default`, '' `remark` FROM (select a.* from tbl_product_price as a INNER JOIN tbl_product as b ON a.pid=b.id) as price INNER JOIN tbl_product_brand as brand ON brand.id=price.bid)";
        $this->execute($sql);

        $sql = "INSERT INTO ec_product_comment (SELECT a.`id`, 0 `user_id`, 0 parent_id, a.pid `product_id`, 0 is_admin, a.name `fullname`, `email`, a.`status`, vote `star`, `ip`, `content`, a.`created_at`, a.`updated_at` FROM `tbl_product_comment` as a INNER JOIN tbl_product as b on a.pid=b.id WHERE a.status = 1)";
        $this->execute($sql);

        $sql = "INSERT INTO ec_product_comment (SELECT null as id, 0 `user_id`, a.id parent_id, a.pid `product_id`, 1 is_admin, b.fullname, c.`email`, a.`status`, vote `star`, '' `ip`, `content`, a.`updated_at`, a.`updated_at` FROM `tbl_product_comment` as a LEFT JOIN tbl_user_profile as b on a.updated_by=b.user_id LEFT JOIN tbl_user as c ON c.id=a.updated_by WHERE a.status = 1 AND length(reply) > 0)";
        $this->execute($sql);

        $sql = "INSERT INTO ec_nav (SELECT a.`id`, a.`parent_id`, a.`alias`, a.`name`, b.alias `position`, a.url `route`, a.data_map `data_json`, if(a.status = 0, 1, 0) `is_hidden`, if(a.status = 0, 1, 0) `is_offline`, 0 `is_deleted`, a.id `sort_index`, a.`created_at`, a.`updated_at`, name_seo `meta_title`, NULL `meta_desc`, null `meta_keyword` FROM `tbl_menu` a INNER JOIN tbl_menu_type b on b.id=a.type_id WHERE b.id > 101)";
        $this->execute($sql);
    }

    // Use up()/down() to run migration code without a transaction.
//    public function up() {
//        $this->bkdata();
//        return false;
//    }
//
//    public function down() {
//        echo "m190424_083625_product_data cannot be reverted.\n";
//
//        return false;
//    }
}
