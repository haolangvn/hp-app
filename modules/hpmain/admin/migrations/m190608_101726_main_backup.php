<?php

use yii\db\Migration;

/**
 * Class m190620_104015_main_backup
 */
class m190608_101726_main_backup extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        // store
        $sql = "INSERT INTO {{%hp_store}} SELECT `id`, `name`, `alias`, `phone`, `address`, `email`, `image`, `coordinates`, `province`, `region`, '' `system`, `content`, id `sort_order`, 0 `is_hidden`, 0 `is_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `tbl_store` WHERE 1";
        $this->execute($sql);

        // province
        $sql = "INSERT INTO {{%hp_location_province}} SELECT `id`, `name`, `alias`, 0 as  `region_id`   FROM `tbl_location_province` WHERE 1;;";
        $this->execute($sql);

        // district
        $sql = "INSERT INTO {{%hp_location_district}} SELECT `id`, `province_id`, `name`  FROM `tbl_location_district` WHERE 1;";
        $this->execute($sql);

        $this->addForeignKey('district_fk', '{{%hp_location_district}}', 'province_id', '{{%hp_location_province}}', 'id', 'RESTRICT', 'RESTRICT');

        $sql = "INSERT INTO {{%hp_contact}} SELECT `id`, name `fullname`, `phone`, `email`, `address`, `subject`, `content`, `ip`, `status`, `created_at`, `updated_at` FROM `tbl_contact` WHERE 1";
        $this->execute($sql);
        
        $sql = "INSERT INTO {{%hp_gallery}} SELECT `id`, pid `pk`, 'ec_product' as `table_name`, `name`, `uri`, `width`, `height`, `filesize`, `created_at`, `updated_at` FROM `tbl_product_gallery` WHERE price_id = 0";
        $this->execute($sql);
        
        $sql = "INSERT INTO {{%hp_gallery}} SELECT `id`, price_id `pk`, 'ec_product_item' as `table_name`, `name`, `uri`, `width`, `height`, `filesize`, `created_at`, `updated_at` FROM `tbl_product_gallery` WHERE price_id > 0";
        $this->execute($sql);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey('district_fk', '{{%hp_location_district}}');
        $this->truncateTable('{{%hp_store}}');
        $this->truncateTable('{{%hp_location_district}}');
        $this->truncateTable('{{%hp_location_province}}');
        $this->truncateTable('{{%hp_contact}}');
        $this->truncateTable('{{%hp_gallery}}');
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190620_104015_main_backup cannot be reverted.\n";

      return false;
      }
     */
}
