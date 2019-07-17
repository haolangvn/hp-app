<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel hpmain\models\search\TranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translate-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//                'id',
                'category',
                'language_code',
                'message',
//                'translation',
                // 'created_at',
                // 'updated_at',

                [
                'class' => 'yii\grid\ActionColumn',
                'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'update', 'delete'])
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>