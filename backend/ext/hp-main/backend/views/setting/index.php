<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel hp\models\search\Setting */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index box box-primary">
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
//                'value:ntext',
//                'type',
                'created_at:date',
                'updated_at:date',
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