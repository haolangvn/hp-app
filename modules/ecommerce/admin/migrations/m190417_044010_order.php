<?php

use yii\db\Migration;
use yii\helpers\ArrayHelper;

/**
 * Class m190417_044010_order
 */
class m190417_044010_order extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->safeDown();
//        return true;

        $this->createTable('{{%ec_order}}', [
            'id' => $this->primaryKey(),
            'billing' => $this->string(255)->defaultValue(null),
            'ocustomer_id' => $this->integer()->notNull()->defaultValue(0),
            'oshipment_id' => $this->integer()->notNull()->defaultValue(0),
            'shipping_cost' => $this->integer(11)->notNull()->defaultValue(0),
            'total' => $this->integer(11)->notNull()->defaultValue(0)->comment("Tổng giá trị đã trừ KM theo line"),
            'cost' => $this->integer(11)->notNull()->defaultValue(0)->comment("Giá trị thanh toán bill (chua bao gồm phí giao hàng)"),
            'discount' => $this->integer(11)->notNull()->defaultValue(0)->comment("KM theo Bill"),
            'discount_per' => $this->float(4)->notNull()->defaultValue(0),
//             'discount_voucher' => $this->integer(11)->notNull()->defaultValue(0)->comment("KM theo Coupon"),
//            'voucher' => $this->string(50),
            'note' => $this->string(255)->comment("Remarks trên POS"),
            'note_admin' => $this->string(255),
            'payment' => $this->string(255),
            'payment_status' => $this->string(255),
            'device' => $this->string(255),
            'channel' => $this->string(255),
            'isSync' => $this->integer(2)->notNull()->defaultValue(0),
            'promotion_code' => $this->string(100)->comment("Ex: Mai190093,Mai190092"),
            'promotion_type' => $this->integer(3)->defaultValue(0)->comment("0: Không KM, 20: Discount by Line, 31: Free item"),
            'description' => $this->text(),
            'status' => $this->integer(2)->notNull()->defaultValue(0),
            'created_at' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0),
            'created_by' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_by' => $this->integer(11)->notNull()->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_order_idx_billing', '{{%ec_order}}', ['billing']);
        $this->createIndex('ec_order_idx_device', '{{%ec_order}}', ['device']);
        $this->createIndex('ec_order_idx_channel', '{{%ec_order}}', ['channel']);

        $this->createTable('{{%ec_order_detail}}', [
            'id' => $this->primaryKey(),
            'oid' => $this->integer(11)->notNull()->defaultValue(0),
            'pid' => $this->integer(11)->notNull()->defaultValue(0)->comment("product Id"),
            'specid' => $this->integer(11)->notNull()->defaultValue(0)->comment("Price Id"),
            'price' => $this->integer(11)->notNull()->defaultValue(0)->comment("Đơn giá"),
            'quantity' => $this->integer(2)->defaultValue(0),
            'total' => $this->integer(11)->defaultValue(0)->comment("Tổng Line (chưa giảm giá)"),
            'discount' => $this->integer(11)->defaultValue(0)->comment("Giảm giá theo line"),
            'discount_per' => $this->float(4)->defaultValue(0)->comment("Giảm % theo line"),
            'cost' => $this->integer(11)->defaultValue(0)->comment("Tổng Line(đã giảm giá)"),
            'product' => $this->text()->notNull(),
            'note' => $this->string(255),
            'promotion_code' => $this->string(100)->comment("Ex: Mai190093,Mai190092"),
            'promotion_type' => $this->integer(3)->defaultValue(0)->comment("0: Không KM, 20: Discount by Line, 31: Free item"),
            'description' => $this->text()
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_order_detail_idx_oid', '{{%ec_order_detail}}', ['oid']);
        $this->createIndex('ec_order_detail_idx_promotion_code', '{{%ec_order_detail}}', ['promotion_code']);

        $this->createTable('{{%ec_order_customer}}', [
            'oid' => $this->integer(11)->notNull()->unique(),
//            'customer_id' => $this->integer(11)->notNull()->defaultValue(0),
            'fullname' => $this->string(255)->notNull(),
            'gender' => $this->integer(1)->defaultValue(1)->comment("2: Mrs, 1: Mr"),
            'phone' => $this->string(255)->notNull(),
            'email' => $this->string(255),
            'address' => $this->text(),
            'district_id' => $this->integer(11)->notNull()->defaultValue(0),
            'province_id' => $this->integer(11)->notNull()->defaultValue(0),
            'region' => $this->string(100),
            'confirmed' => $this->integer(1)->notNull()->defaultValue(0)->comment("Xác nhận khách hàng, sau đó tạo tài khoản cho khác"),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_order_customer_idx_fullname', '{{%ec_order_customer}}', ['fullname']);
        $this->createIndex('ec_order_customer_idx_phone', '{{%ec_order_customer}}', ['phone']);
        $this->createIndex('ec_order_customer_idx_email', '{{%ec_order_customer}}', ['email']);

        $this->createTable('{{%ec_order_shipment}}', [
            'oid' => $this->integer(11)->notNull()->unique(),
            'fullname' => $this->string(255),
            'phone' => $this->string(255),
            'address' => $this->string(255),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_order_shipment_idx_fullname', '{{%ec_order_shipment}}', ['fullname']);
        $this->createIndex('ec_order_shipment_idx_phone', '{{%ec_order_shipment}}', ['phone']);

        $this->createTable('{{%ec_order_vat}}', [
            'oid' => $this->integer(11)->notNull()->unique(),
            'name' => $this->string(255),
            'address' => $this->string(255),
            'tax_code' => $this->string(15),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_order_vat_idx_name', '{{%ec_order_vat}}', ['name']);
        $this->createIndex('ec_order_vat_idx_tax_code', '{{%ec_order_vat}}', ['tax_code']);

        $this->createTable('{{%ec_order_status}}', [
            'id' => $this->integer(5)->notNull()->unique(),
            'type' => $this->string(50)->notNull(),
            'value' => $this->string(50)->notNull(),
            'option' => $this->string(50)->notNull(),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');        
        
        $this->createTable('{{%ec_promotion_sap}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(100)->notNull(),
            'sap_name' => $this->string(255)->notNull(),
            'sap_fromdate' => $this->string(20),
            'sap_todate' => $this->string(20),
            'sap_status' => $this->string(1),
            'name' => $this->string(255),
            'description' => $this->text(),
            'priority' => $this->integer(2)->notNull()->defaultValue(0),
            'from_date' => $this->integer(11)->notNull()->defaultValue(0),
            'to_date' => $this->integer(11)->notNull()->defaultValue(0),
            'so_header' => $this->integer(1)->notNull()->defaultValue(0),
            'so_lines' => $this->integer(1)->notNull()->defaultValue(0),
            'type' => $this->integer(3)->notNull()->defaultValue(0),
            'status' => $this->integer(1)->notNull()->defaultValue(0),            
            'created_at' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0),
            'created_by' => $this->integer(11)->notNull()->defaultValue(0),
            'updated_by' => $this->integer(11)->notNull()->defaultValue(0),
                ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->createIndex('ec_promotion_sap_code', '{{%ec_promotion_sap}}', ['code']);
        $this->createIndex('ec_promotion_sap_sap_name', '{{%ec_promotion_sap}}', ['sap_name']);
        
        $this->importData();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
//        $this->dropTable('{{%ec_customer}}');        
        $prefix = $this->db->tablePrefix;
        if ($this->db->getTableSchema($prefix . 'ec_order', true) != null) {
            $this->dropTable('{{%ec_order}}');
        }

        if ($this->db->getTableSchema($prefix . 'ec_order_detail', true) != null) {
            $this->dropTable('{{%ec_order_detail}}');
        }

        if ($this->db->getTableSchema($prefix . 'ec_order_customer', true) != null) {
            $this->dropTable('{{%ec_order_customer}}');
        }

        if ($this->db->getTableSchema($prefix . 'ec_order_vat', true) != null) {
            $this->dropTable('{{%ec_order_vat}}');
        }

        if ($this->db->getTableSchema($prefix . 'ec_order_shipment', true) != null) {
            $this->dropTable('{{%ec_order_shipment}}');
        }

        if ($this->db->getTableSchema($prefix . 'ec_order_status', true) != null) {
            $this->dropTable('{{%ec_order_status}}');
        }
        
        if ($this->db->getTableSchema($prefix . 'ec_promotion_sap', true) != null) {
            $this->dropTable('{{%ec_promotion_sap}}');
        }
    }

    public function importData() {

        /*         * Import Order */
        $sql = 'INSERT INTO `ec_order` SELECT `id`, `billing`, 0 as `ocustomer_id`,0 as `oshipment_id`,`shipping_cost`,`total`, `cost`,`discount`,`discount_per`,`note`, `note_admin`, `payment`, `payment_status`,`device`, `channel`, `isSync`, `promotion_code`, `promotion_type`, `description`, `status`, `created_at`, `confirm_at` as `updated_at`, 0 as `created_by`, `confirm_by` as `updated_by`  FROM `tbl_order` WHERE 1';
        $this->execute($sql);

        /** Import Order Detail */
        $sql = 'INSERT INTO `ec_order_detail` SELECT `id`, `oid`, `pid`, `specid`, `price`, `quantity`, `total`, `discount`,'
                . '`discount_per`, `cost`, `product`, `note`, `promotion_code`, `promotion_type`, `description` FROM `tbl_order_detail` WHERE 1';
        $this->execute($sql);

        /** Import Order Detail */
        $sql = 'INSERT INTO `ec_order_vat` SELECT `id` as `oid`, `name`, `address`, `tax_code` FROM `tbl_order_vat` WHERE 1';
        $this->execute($sql);

        /** Import Order Customer */
        $sql = 'INSERT INTO `ec_order_customer` SELECT `id` as `oid`, `fullname`, `sex` as `gender`,'
                . '`phone`, `email`, `address`, `district_id`,`province_id`,`region`, 1 as `confirmed`  FROM `tbl_order` WHERE 1';
        $this->execute($sql);

        /** Import Order Shipment */
        $sql = "SELECT `id`, `shipping` FROM `tbl_order` WHERE `shipping` != ''";
        $shipping = $this->db->createCommand($sql)->queryAll();
        foreach ($shipping as $item) {
            $oid = ArrayHelper::getValue($item, "id");
            $data = ArrayHelper::getValue($item, "shipping");
            $data = unserialize($data);
            $f = trim(ArrayHelper::getValue($data, 'f', ''));
            $p = trim(ArrayHelper::getValue($data, 'p', ''));
            $a = trim(ArrayHelper::getValue($data, 'a', ''));
            if (!($f == "" && $p == "" && $a == "")) {
                $sql = 'INSERT INTO `ec_order_shipment` (`oid`, `fullname`, `phone`, `address`) Values '
                        . '("' . $oid . '","' . $f . '","' . $p . '","' . $a . '")';
                $this->execute($sql);
            }
        }

        /** Import Order Status */
        $sql = 'INSERT INTO `ec_order_status` (`id`, `type`, `value`, `option`) Values '
                . '("0","shipping","=== Chưa xác nhận ===","#fe1010"),'
                . '("1","shipping","Hoàn tất","#00a65a"),'
                . '("7","shipping","=== Lưu tạm ===","#a200ff"),'
                . '("8","shipping","Đang đi đường","#ffdd14"),'
                . '("9","shipping","Chờ lấy hàng","#ea4c89"),'
                . '("-2","shipping","Hủy => Kg có SP","#bbb"),'
                . '("-6","shipping","Hủy => Hàng đã test","#bbb"),'
                . '("-7","shipping","Hủy => hàng bị hư","#bbb"),'
                . '("-3","shipping","Hủy => Khách hủy (đổi ý ko mua)","#bbb"),'
                . '("-8","shipping","Hủy => Khách đến CH mua","#bbb"),'
                . '("-5","shipping","Hủy => Trùng ĐH","#bbb"),'
                . '("-4","shipping","Không liên lạc được","#bbb")';
        $this->execute($sql);
        
        
        /** Import Promotion SAP */
        $sql = 'INSERT INTO `ec_promotion_sap` SELECT `id`, `code`, `sap_name`, `sap_fromdate`, `sap_todate`, `sap_status`, `name`,'
                . '`description`, `priority`, `from_date`, `to_date`, `so_header`, `so_lines`, `type`, `status`, `created_at`, `updated_at`,`created_by`,`updated_by`  FROM `tbl_promotion_sap` WHERE 1';
        $this->execute($sql);
        
        $this->addColumn('ec_promotion_sap', 'sort_order', $this->integer(4)->defaultValue(0)->after('status'));
        
        $sql = 'UPDATE `ec_promotion_sap` set `sort_order` = `id`  WHERE 1';
        $this->execute($sql);
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190417_044010_order cannot be reverted.\n";

      return false;
      }
     */
}
