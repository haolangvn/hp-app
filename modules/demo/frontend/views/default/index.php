
<?php

//use Yii;
use luya\cms\Menu;
use app\modules\demo\models\Demo;
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

    print_r(Demo::find()->asArray()->all());
    ?>

</pre>