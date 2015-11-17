<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content->name;

?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
              
                <img class="col-lg-12 col-md-12 col-xs-12 col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    
                <p><?= $content->content ?></p>
                <p><?= $user->name ?></p>
                <p>Acertaste <?=$score->score ?> de <?=$questions?></p>
<img class="col-lg-12 col-md-12 col-xs-12 col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    
           
            <p><a class="btn btn-default" href="<?= Url::to(['site/user']) ?>">Volver a Jugar</a></p>
          <img style="float:left" src="<?= Url::base() ?>/images/<?= $principal_felicidades->image_desktop ?>"/>
          <img style="float:left" src="<?= Url::base() ?>/images/<?= $btn_volverjugar->image_desktop ?>"/>
            </div>

        </div>

    </div>
</div>
