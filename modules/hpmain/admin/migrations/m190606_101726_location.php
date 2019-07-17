<?php

use yii\db\Migration;

/**
 * Class m190606_101726_location
 */
class m190606_101726_location extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->createTable('{{%hp_location_province}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'region_id' => $this->integer()->defaultValue(0),
        ]);

        $this->createTable('{{%hp_location_district}}', [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%hp_location_district}}');
        $this->dropTable('{{%hp_location_province}}');
    }

}
