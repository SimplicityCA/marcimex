<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content->name;

?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
              

                <p><?= $content1->content ?></p>
                  <img src="<?= Url::base() ?>/images/<?= $separador->image_desktop ?>"/>
                 <p><?= $content2->content ?></p>
            <p><a class="btn btn-default" href="<?= Url::to(['site/awards']) ?>">Premios</a></p>
            <p><a class="btn btn-default" href="<?= Url::to(['site/user']) ?>">Empezar</a></p>
        <img src="<?= Url::base() ?>/images/<?= $principal_home->image_desktop ?>"/>
       
         <img src="<?= Url::base() ?>/images/<?= $btn_premios->image_desktop ?>"/>
         <img src="<?= Url::base() ?>/images/<?= $btn_empezar->image_desktop ?>"/>
            </div>

        </div>

    </div>
</div>
