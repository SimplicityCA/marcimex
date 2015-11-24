<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content->name;
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="div_awards col-sm-5 center">
                    <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    <p class="text_awards"><?= $content->content ?></p>
                    <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    <a href="<?= Url::to(['site/user']) ?>"><img class="start_awards col-sm-5 pull-right" src="<?= Url::base() ?>/images/<?= $btn_empezar->image_desktop ?>"/></a>
                </div>
                <div class="col-sm-7">
                    <img class="image_awards col-sm-11" src="<?= Url::base() ?>/images/<?= $premios->image_desktop ?>"/>
                </div>
            </div>

        </div>

    </div>
</div>
