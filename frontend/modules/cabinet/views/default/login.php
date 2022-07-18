<?php

use yii\helpers\Html;

\backend\assets\AppAsset::register($this);

$this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?=Yii::$app->homeUrl?>images/favicon.ico">
        <?php $this->registerCsrfMetaTags(); ?>
        <title><?= Html::encode($this->title); ?> &bull; Spector77</title>
        <?php $this->head(); ?>
    </head>

    <body class="auth-body-bg">
    <?php $this->beginBody(); ?>

    <?php
    $flash = Yii::$app->session->getAllFlashes();?>


    <?= $content ?>

    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage(); ?>