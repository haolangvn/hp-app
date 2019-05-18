<?php

use yii\helpers\Html;
use yii\grid\GridView;
use hpec\utils\ULocation;
use yii\helpers\ArrayHelper;
use hp\utils\UArray;

/* @var $this yii\web\View */
/* @var $searchModel hp\models\search\Store */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stores');
$this->params['breadcrumbs'][] = $this->title;
$province = ULocation::getProvince();
?>
<div class="store-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'alias',
                'phone',
//                'email:email',
                // 'address',
                // 'image',
                [
                    'attribute' => 'system',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'left'],
                    'filter' => UArray::system(),
                    'value' => function($model)  {
                        $result = ArrayHelper::getValue(UArray::system(), $model->system, "");
                        return $result;
                    }
                ],
                [
                    'attribute' => 'province',
                    'filter' => $province,
                    'value' => function($model) use ($province) {
                        $result = ArrayHelper::getValue($province, $model->province, "");
                        return $result;
                    },
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'center', 'style' => 'width: 80px'],
                    'filter' => ['1'=>'Show','0'=>'Hide'],
                    'value' => function($model) {
                        $link = ($model->status == 1) ? '<i class="glyphicon glyphicon-ok text-success"></i>' : '<i class="glyphicon glyphicon-remove text-danger"></i>';
                        return Html::a($link, ['update-status', 'id' => $model->id], ['class' => 'update-status', 'data' => ['method' => 'post']]);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'update', 'delete'])
                ],
            ],
        ]);
        ?>
    </div>
</div>