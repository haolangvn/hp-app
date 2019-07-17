<?php

namespace hpmain\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use luya\cms\models\NavContainer;
use luya\cms\models\Nav;
use hpmain\models\NavItem;
use hp\utils\TreeDataBuilder;

/**
 * NavItemSearch represents the model behind the search form of `hpmain\models\NavItem`.
 */
class NavItemSearch extends \yii\db\ActiveRecord {

    public $container;
    public $parent_nav_id;
    public $build_tree = false;

    public static function tableName() {
        return NavItem::tableName();
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'build_tree'], 'integer'],
            [['title', 'alias', 'container', 'lang_id'], 'string', 'max' => 255],
            [['description', 'keywords', 'title_tag'], 'safe'],
        ];
    }

    public function scenarios() {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = self::find()
                ->alias('item')
                ->innerJoin(Nav::tableName() . ' nav', 'nav.id = item.nav_id')
                ->innerJoin(NavContainer::tableName() . ' c', 'c.id = nav.nav_container_id')
                ->where(['nav.is_draft' => FALSE])
                ->select('item.id, title, item.alias, item.nav_item_type_id, c.name container, nav.parent_nav_id')
                ->orderBy('nav.nav_container_id, nav.sort_index');

        $this->load($params);

        // 
        if ($this->build_tree) {
            $query->andWhere(['nav.parent_nav_id' => 0]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'item.id' => $this->id,
            'nav_container_id' => $this->container,
            'lang_id' => $this->lang_id,
//            'nav_id' => $this->nav_id,
//            'nav_item_type' => $this->nav_item_type,
//            'nav_item_type_id' => $this->nav_item_type_id,
//            'create_user_id' => $this->create_user_id,
//            'update_user_id' => $this->update_user_id,
//            'timestamp_create' => $this->timestamp_create,
//            'timestamp_update' => $this->timestamp_update,
        ]);

        $query->andFilterWhere(['like', 'item.title', $this->title])
                ->andFilterWhere(['like', 'item.alias', $this->alias]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'models' => $this->build_tree ? TreeDataBuilder::contruct($query, [
                'varLabel' => 'title',
                'varParent' => 'parent_nav_id'
            ])->getTree() : null,
            'sort' => $this->build_tree ? false : [],
        ]);



        return $dataProvider;
    }

}
