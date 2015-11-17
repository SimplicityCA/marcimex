<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content->name;
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="div_awards col-lg-5 center">
                    <img class="col-lg-12 col-sm-12 col-md-12 col-xs-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    <p class="text_awards"><?= $content->content ?></p>
                    <img class="col-lg-12 col-md-12 col-xs-12 col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    <a href="<?= Url::to(['site/user']) ?>"><img class="start_awards col-lg-5 col-md-5 col-sm-5 col-xs-10 pull-right" src="<?= Url::base() ?>/images/<?= $btn_empezar->image_desktop ?>"/></a>
                </div>
                <div class="col-lg-7">
                    <img class="image_awards col-lg-10 col-md-10 col-sm-10 col-xs-12" src="<?= Url::base() ?>/images/<?= $premios->image_desktop ?>"/>
                </div>
            </div>

        </div>

    </div>
</div>
