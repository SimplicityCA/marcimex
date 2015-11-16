<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $content->name;

?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
              

                <p><?= $content->content ?></p>
                <p><?= $user->name ?></p>
                <p>Acertaste <?=$score->score ?> de <?=$questions?></p>

           
            <p><a class="btn btn-default" href="<?= Url::to(['site/user']) ?>">Volver a Jugar</a></p>
          
            </div>

        </div>

    </div>
</div>
