<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\SiteImages;
$background=SiteImages::find()->where(['name'=>'background'])->one();
$logo=SiteImages::find()->where(['name'=>'logo'])->one();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    // NavBar::begin([
    //     'brandLabel' => 'My Company',
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'About', 'url' => ['/site/about']],
    //         ['label' => 'Contact', 'url' => ['/site/contact']],
    //         Yii::$app->user->isGuest ?
    //             ['label' => 'Login', 'url' => ['/site/login']] :
    //             [
    //                 'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 'url' => ['/site/logout'],
    //                 'linkOptions' => ['data-method' => 'post']
    //             ],
    //     ],
    // ]);
    // NavBar::end();
    ?>

    <div class="container-fluid" style="background-image: url('<?= Url::base() ?>/images/<?= $background->image_desktop ?>'); background-repeat: no-repeat;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="container">
            <img class="col-lg-5 col-md-5 col-sm-8 col-xs-12" src="<?= Url::base() ?>/images/<?= $logo->image_desktop ?>"/>
        
            <?= $content ?>
        </div>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
