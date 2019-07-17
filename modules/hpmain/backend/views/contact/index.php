<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel hpmain\models\search\Contact */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index box box-primary">
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
                'fullname',
                'phone',
                'email:email',
                'address',
                ['class' => 'hp\grid\Boolean', 'attribute' => 'status'],
//                'content:ntext',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'delete'])
                ],
            ],
        ]);
        ?>
    </div>
    <?php Pjax::end(); ?>
</div>