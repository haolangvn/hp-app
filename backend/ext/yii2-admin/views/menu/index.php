<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index box">
    <div class="box-body table-responsive">
        <p>
            <?= Html::a(Yii::t('rbac-admin', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php Pjax::begin(); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'attribute' => 'menuParent.name',
                    'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                        'class' => 'form-control', 'id' => null
                    ]),
                    'label' => Yii::t('rbac-admin', 'Parent'),
                ],
                'route',
                'order',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['view', 'update', 'delete'])
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>