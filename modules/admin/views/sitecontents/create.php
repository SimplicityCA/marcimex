<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SiteContents */

$this->title = 'Create Site Contents';
$this->params['breadcrumbs'][] = ['label' => 'Site Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
