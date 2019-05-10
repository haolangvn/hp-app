
<?php

//use Yii;
use luya\cms\Menu;
use app\modules\demo\models\Demo;
use hp\utils\UShort;
?>

<h2>Hello World</h2>
<ul>
    <?php foreach (Yii::$app->menu->find()->container('default')->root()->all() as $item): ?>
        <li>
            <a href="<?= $item->link; ?>"><?= $item->title; ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<pre>
    

    <?php
    
//    foreach (Yii::$app->menu->getLevelContainer(2) as $secondItem) {
//        echo $secondItem->title;
//    }

    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => app\modules\ecommerce\models\Group::ngRestFind(),
        'pagination' => [
            'defaultPageSize' => 100
        ]
    ]);

//    $model = new app\modules\ecommerce\models\Barcode();
//    var_dump($model->getDb()->getTableSchema('{{%ecommerce_product_}}', true));

    foreach ($dataProvider->getModels() as $node) {
//        hp\utils\UArray::dump($node->attributes);
        hp\utils\UArray::dump($node->name);
    }
    print_r(yii\helpers\ArrayHelper::getValue(\hp\utils\UShort::app()->composition, 'langShortCode'));
//    print_r(luya\helpers\ArrayHelper::getValue(\hp\utils\UShort::app()->composition, ['langShortCode']));
    ?>

</pre>