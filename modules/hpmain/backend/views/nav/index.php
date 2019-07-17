<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel hpmain\models\Search\NavItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nav Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-item-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?php // Html::a('Create', ['create'], ['class' => 'btn btn-success btn-flat'])    ?>
    </div>
    <div class="box-body table-responsive">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
                'id',
//                'container',
                'title',
                'alias',
//                'nav_id',
//                'lang_id',
//                'nav_item_type',
//                'nav_item_type_id',
                // 'create_user_id',
                // 'update_user_id',
                // 'timestamp_create:datetime',
                // 'timestamp_update:datetime',
                // 'description:ntext',
                // 'keywords:ntext',
                // 'title_tag',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['update']),
                    'buttons' => [
                        'content' => function($url, $model, $key) {
                            return yii\helpers\Html::a('<i class="fa fa-newspaper-o" aria-hidden="true"></i> ', ['/main/nav/update-content', 'id' => $model->id, 'page' => $model->nav_item_type_id], ['target' => '_blank', 'data-pjax' => 0]);
                        }
                    ]
                ],
            ],
        ]);
        ?>
    </div>
    <?php Pjax::end(); ?>
</div>