
<?php

//use Yii;
use luya\cms\Menu;
use app\modules\demo\models\Demo;
use common\utils\UShort;
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
    foreach (Yii::$app->menu->getLevelContainer(2) as $secondItem) {
        echo $secondItem->title;
    }

    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => Demo::find(),
    ]);
    
    
    foreach ($dataProvider->getModels() as $node) {
        echo $node->name . ' -' . $node->desc;
    }
    print_r(yii\helpers\ArrayHelper::getValue(\common\utils\UShort::app()->composition, 'langShortCode'));
//    print_r(luya\helpers\ArrayHelper::getValue(\common\utils\UShort::app()->composition, ['langShortCode']));
    ?>

</pre>