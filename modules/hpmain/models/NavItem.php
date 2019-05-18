<?php

namespace hp\models;

use luya\cms\models\Block;

/**
 * Description of Nav
 *
 * @author HAO
 */
class NavItem extends \luya\cms\models\NavItem {

    public function rules() {
        return [
            [['title', 'alias'], 'required'],
            [['description', 'keywords', 'title_tag'], 'safe'],
            [['alias'], 'match', 'pattern' => '/\_|\/|\\\/i', 'not' => true]
        ];
    }

    public function attributeLabels() {
        return [
            'title' => 'Title',
            'alias' => 'URL Path Segment',
            'description' => 'Description (Meta Description for Google)',
            'keyword' => 'Keywords for SEO analytics (example: restaurant, pizza, italy)',
            'title_tag' => 'Page Title (SEO)',
        ];
    }

    public function eventBeforeUpdate() {
        parent::eventBeforeUpdate();
        $this->update_user_id = \hp\utils\UShort::user()->id;
    }

    public function getBlocks() {
        return NavItemBlock::find()->alias('t')
                        ->innerJoin(self::tableName() . ' t2', 't.nav_item_page_id=t2.nav_item_type_id')
                        ->innerJoin(Block::tableName() . ' t3', 't.block_id=t3.id')
                        ->select('t.*, t3.class as block_class')
                        ->where([
                            't.placeholder_var' => 'content',
                            't2.nav_item_type_id' => $this->nav_item_type_id
                        ])
                        ->indexBy('id')
                        ->all();
    }

}
