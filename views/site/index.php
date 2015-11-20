<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content1->name;
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-5 center home_inst">
                    <p class="home_text"><?= $content1->content ?></p>
                    <img src="<?= Url::base() ?>/images/<?= $separador->image_desktop ?>"/>
                     <p class="home_text"><?= $content2->content ?></p>
                    <a  href="<?= Url::to(['site/awards']) ?>"><img class="btn_home" src="<?= Url::base() ?>/images/<?= $btn_premios->image_desktop ?>"/></a>
                    <a  href="<?= Url::to(['site/user']) ?>"><img class="btn_home" src="<?= Url::base() ?>/images/<?= $btn_empezar->image_desktop ?>"/></a>
                </div>
                <div class="col-sm-7 main-desktop-image">
                    <img class="image_home col-sm-9" src="<?= Url::base() ?>/images/<?= $principal_home->image_desktop ?>"/>
                </div>
       
         
         
            </div>

        </div>

    </div>
</div>
