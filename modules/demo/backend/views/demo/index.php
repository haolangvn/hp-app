<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\components\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\demo\models\search\Demo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Demos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demo-index box box-primary">
    <?php Pjax::begin(); ?>
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
                'id',
                'name',
                'desc:ntext',
                [
                    'attribute' => 'deadline',
                    'format' => 'datetime',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'deadline',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND
                    ])
                ],
//                'created_at:datetime',
//                'updated_at:datetime',
                // 'created_by',
                // 'updated_by',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'update', 'delete'])
                ],
            ],
        ]);
        ?>
    </div>
    <?php Pjax::end(); ?>
</div>