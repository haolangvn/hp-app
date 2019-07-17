<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model hpmain\models\NavItem */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Nav Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-item-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nav_id',
                'lang_id',
                'nav_item_type',
                'nav_item_type_id',
                'create_user_id',
                'update_user_id',
                'timestamp_create:datetime',
                'timestamp_update:datetime',
                'title',
                'alias',
                'description:ntext',
                'keywords:ntext',
                'title_tag',
            ],
        ]) ?>
    </div>
</div>