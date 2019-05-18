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
        $this->safeDown();

        $this->createTable('{{%hp_store}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'alias' => $this->string(255),
            'phone' => $this->string(255),
            'email' => $this->string(255),
            'address' => $this->string(255),
            'image' => $this->string(255),
            'system' =>$this->string(100)->notNull(),
            'province' => $this->string(25)->notNull(),
            'region'=> $this->string(25),
            'content' => $this->text()->notNull(),
            'status' => $this->integer(1)->defaultValue(1),
            'weight' => $this->integer(2)->defaultValue(0),
            'created_at' => $this->integer(11)->defaultValue(0),
            'updated_at' => $this->integer(11)->defaultValue(0),
            'created_by' => $this->integer(11)->defaultValue(0),
            'updated_by' => $this->integer(11)->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('hp_store_idx_name', '{{%hp_store}}', ['name']);
        $this->createIndex('hp_store_idx_alias', '{{%hp_store}}', ['alias']);
        
        $this->importData();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $prefix = $this->db->tablePrefix;
        if ($this->db->getTableSchema($prefix . 'hp_store', true) != null) {
            $this->dropTable('{{%hp_store}}');
        }
    }
    
    public function importData() {

        /** Import Order */
        $sql = 'INSERT INTO `hp_store` SELECT `id`, `name`,`alias`,`phone`,`email`,`address`,`image`,`coordinates` as `system`,';
        $sql.= '`province`, `region`, `sort_content` as `content`, `status`, `weight`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `tbl_store` WHERE 1';
        $this->execute($sql);
        
        $sql = 'UPDATE `hp_store` SET `system` = 0 WHERE `hp_store`.`system` like "%Thế Giới Nước Hoa%"';
        $this->execute($sql);
        $sql = 'UPDATE `hp_store` SET `system` = 1 WHERE `hp_store`.`system` like "%Perfume World%"';
        $this->execute($sql);
        $sql = 'UPDATE `hp_store` SET `system` = 2 WHERE `hp_store`.`system` like "%Minus417%"';
        $this->execute($sql);
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190517_043433_store cannot be reverted.\n";

      return false;
      }
     */
}
