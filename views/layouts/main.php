<?php

use luya\helpers\Url;
use app\assets\M417Asset;

M417Asset::register($this);

/* @var $this luya\web\View */
/* @var $content string */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->langShortCode; ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->title; ?></title>
        <link type="image/png" href="<?= Url::to('@web/images/Fav-417_black.gif') ?>" rel="icon">
        <link type="image/x-icon" href="<?= Url::to('@web/images/Fav-417_black.gif') ?>" rel="shortcut icon" />
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <?php
        $this->params['content'] = $content;
        if ($this->beginCache('PAGE', [
                    'duration' => 3600,
                    'variations' => [Yii::$app->language]
                ])) {
            ?>
            <?= \app\widgets\Topheader::widget() ?>
            <?= \app\widgets\Header::widget() ?>

            <div class="container">
                <nav aria-label="breadcrumb mb-3">
                    <?= $this->renderDynamic('return app\widgets\Breadcrumbs::widget();'); ?>
                </nav>

                <div class="row">
                    <div class="col-md-12">
                        <?= $this->renderDynamic('return $this->params["content"];'); ?>
                    </div>
                </div>
            </div>
            <?= $this->render('//_footer') ?>
            <?php
            $this->endCache();
        }
        $this->endBody()
        ?>
    </body>
</html>
<?php $this->endPage() ?>
