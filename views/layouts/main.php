<?php

use yii\helpers\Url;
use app\assets\ResourcesAsset;

/* @var $this luya\web\View */
/* @var $content string */

$this->beginPage();

ResourcesAsset::register($this);
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->langShortCode; ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->title; ?></title>
        <link type="image/png" href="<?= Url::to('@web/images/favicon.ico') ?>" rel="icon">
        <link type="image/x-icon" href="<?= Url::to('@web/images/favicon.ico') ?>" rel="shortcut icon" />
        <?php $this->head() ?>
    </head>


    <?php
    $this->beginBody();

    /**
     * Dynamic contend: Header & navigation
     */
    echo app\widgets\Header::widget();

    /**
     * 
     */
    echo app\widgets\Breadcrumbs::widget();

    /**
     * 
     */
//    echo '<div class="container">';
    echo $content;
//    echo '</div>';

    /*
     * Dynamic Footer
     */
    echo \app\widgets\Footer::widget();

    /**
     * 
     */
    echo app\widgets\Alert::widget();

    $this->endBody()
    ?>

</html>
<?php $this->endPage() ?>
