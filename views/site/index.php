<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content1->name;
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-5 center">
                    <p class="home_text"><?= $content1->content ?></p>
                    <img src="<?= Url::base() ?>/images/<?= $separador->image_desktop ?>"/>
                     <p class="home_text"><?= $content2->content ?></p>
                    <a class="btn_premios" href="<?= Url::to(['site/awards']) ?>"><img class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1" src="<?= Url::base() ?>/images/<?= $btn_premios->image_desktop ?>"/></a>
                    <a class="btn_empezar" href="<?= Url::to(['site/user']) ?>"><img class="col-lg-5 col-md-5 col-sm-5 col-xs-offset-1 col-xs-10" src="<?= Url::base() ?>/images/<?= $btn_empezar->image_desktop ?>"/></a>
                </div>
                <div class="col-lg-7">
                    <img class="image_home col-lg-9 col-xs-12" src="<?= Url::base() ?>/images/<?= $principal_home->image_desktop ?>"/>
                </div>
       
         
         
            </div>

        </div>

    </div>
</div>
