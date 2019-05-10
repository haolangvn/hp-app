<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\ecommerce\utils\UStatus;
use yii\helpers\ArrayHelper;
use hp\utils\UShort;
use hp\utils\UFormat;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecommerce\models\search\Order */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'center'],
                    'value' => function($model) {
                        $data = UStatus::getObject($model->status);
                        $result = '<span class="label" style="background-color:' . ArrayHelper::getValue($data, 'option') . '">';
                        $result .= $model->id;
                        $result .= '</span>';
                        return $result;
                    },
                ],
                [
                    'attribute' => 'fullname',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align: left'],
                    'contentOptions' => ['align' => 'left', 'style' => 'width: 180px'],
                    'value' => function($model) {
                        $result = $model->customer->fullname;
                        return $result;
                    },
                ],
                [
                    'attribute' => 'province_id',
                    'value' => function($model) {
                        $result = $model->customer->province_id;
                        return $result;
                    },
                ],
                [
                    'attribute' => 'total',
                    'headerOptions' => ['width' => 100],
                    'contentOptions' => ['align' => 'right'],
                    'value' => function($model) {
                        $rs = $model->details;
                        $total = 0;
                        foreach ($rs as $node) {
                            $total += $node->total;
                        }
                        return UFormat::currency($total);
                    },
                ],
                [
                    'attribute' => 'discount',
                    'header' => 'Discount ',
                    'headerOptions' => ['width' => 100],
                    'contentOptions' => ['align' => 'right'],
                    'value' => function($model) {
                        $rs = $model->details;
                        $discount = 0;
                        foreach ($rs as $node) {
                            $discount += $node->discount;
                        }
                        return UFormat::currency($model->discount + $discount);
                    }
                ],
                [
                    'attribute' => 'cost',
                    'header' => 'Cost ',
                    'headerOptions' => ['width' => 100],
                    'contentOptions' => ['align' => 'right'],
                    'value' => function($model) {
                        return UFormat::currency($model->cost);
                    },
                ],
                [
                    'attribute' => 'shipping_cost',
                    'headerOptions' => ['width' => 120],
                    'contentOptions' => ['align' => 'right'],
                    'value' => function($model) {
                        return UFormat::currency($model->shipping_cost);
                    },
                ],
//                [
//                    'attribute' => 'status',
//                    'format' => 'raw',
//                    'headerOptions' => ['style' => 'text-align: center'],
//                    'contentOptions' => ['align' => 'center', 'style' => 'width: 280px'],
//                    'value' => function($model) {
//                        $data = UStatus::getObject($model->status);
//                        $result = '<span class="label" style="background-color:' . ArrayHelper::getValue($data, 'option') . '">';
//                        $result .= ArrayHelper::getValue($data, 'value');
//                        $result .= '</span>';
//                        return $result;
//                    },
//                ],
                [
                    'attribute' => 'note_admin',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'left','style' => 'width: 100px'],
                    'value' => function($model) {
                        $result = $model->note_admin;
                        return $result;
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'center'],
                    'value' => function($model) {
                        $result = $model->created_at;
                        return $result;
                    },
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'datetime',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'contentOptions' => ['align' => 'center'],
                    'value' => function($model) {
                        $result = $model->updated_at ? $model->updated_at : false;
                        return $result;
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => mdm\admin\components\Helper::filterActionColumn(['sync', 'view-new', 'delete']),
                    'options' => ['width' => 80],
                    'contentOptions' => ['align' => 'right'],
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            return UShort::user()->id == 1 ? Html::a('<span class="fa fa-trash"></span>', $url, ['data' => ['method' => 'post', 'confirm' => 'Are you sure?']]) : '';
                        },
                        'view-new' => function ($url, $model, $key) {
                            return Html::a('<span class="fa fa-eye"></span>', $url, ['target' => '', 'class' => 'update', 'data-pjax' => 0]);
                        },
                        'sync' => function ($url, $model, $key) {
                            return $model->isSync >= 10 ? $model->isSync.'<i class="fa fa-arrow-circle-up" style="color:#00a65a"></i>' : $model->isSync.'<i class="fa fa-arrow-circle-up" style="color:#fe1010"></i>';
                        }
                    ]
                ],
            ],
        ]);
        ?>
    </div>
    <?php Pjax::end(); ?>
</div>