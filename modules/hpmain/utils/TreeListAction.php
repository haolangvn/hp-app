<?php

namespace hp\utils;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * Description of IndexAction
 *
 * @author HAO
 */
class TreeListAction extends \luya\admin\ngrest\base\actions\IndexAction {
    
    public $data;

    protected function prepareDataProvider() {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        $filter = null;
        if ($this->dataFilter !== null) {
            $this->dataFilter = Yii::createObject($this->dataFilter);
            if ($this->dataFilter->load($requestParams)) {
                $filter = $this->dataFilter->build();
                if ($filter === false) {
                    return $this->dataFilter;
                }
            }
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = call_user_func($this->prepareActiveDataQuery);
        if (!empty($filter)) {
            $query->andWhere($filter);
        }

        $dataProvider = Yii::createObject([
                    'class' => ActiveDataProvider::class,
                    'query' => $query,
                    'models' => $this->data,
                    'pagination' => $this->controller->pagination,
                    'sort' => [
                        'params' => $requestParams,
                    ],
        ]);

        if ($this->isCachable() && $this->controller->cacheDependency) {
            Yii::$app->db->cache(function() use ($dataProvider) {
                $dataProvider->prepare();
            }, 0, Yii::createObject($this->controller->cacheDependency));
        }

        return $dataProvider;
    }

}
