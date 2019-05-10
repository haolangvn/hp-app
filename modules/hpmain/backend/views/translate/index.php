<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel hp\models\search\Translate */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Translates');
$this->params['breadcrumbs'][] = $this->title;

$trans = new hp\models\Translate();
$lang = $trans->getLang();

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    'id',
    'category',
    'message',
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'update', 'delete'])
    ]
];

//foreach ($lang as $code => $name) {
//    $columns[] = [
//        'attribute' => 'translate',
//        'value' => $name
//    ];
//}
//exit;
?>
<div class="translate-index box box-primary">
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
            'columns' => $columns
        ]);
        ?>
    </div>
    <?php Pjax::end(); ?>
</div>