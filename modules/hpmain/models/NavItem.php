<?php

namespace hp\models;

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

}
