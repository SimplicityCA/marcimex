<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$script="
$('#users-number_id').change(function(){
        $.ajax({
  
    url : 'find',
    data : { number_id : $(this).val() },
    type : 'POST',
    dataType : 'json',
    success : function(data) {
        if(data.user){
        $('#users-name').val(data.user.name);
        $('#users-last_name').val(data.user.last_name);
        $('#users-email').val(data.user.email);
        $('#users-phone').val(data.user.phone);
        $('#users-city').val(data.user.city);
        $('#action').val('UPDATE');
    }else{

    }

    },
    error : function(xhr, status) {
        alert('Disculpe, existió un problema');
    }
});
    });
";
$this->registerJs($script,View::POS_END);
?>

<div class="users-form">
<img style="float:left" src="<?= Url::base() ?>/images/<?= $principal_formulario->image_desktop ?>"/>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'number_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

   
<input type="hidden" id="action" name="action" value="CREATE"/>
<img style="float:left" src="<?= Url::base() ?>/images/<?= $btn_continuar->image_desktop ?>"/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>