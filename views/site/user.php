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
<div class="col-lg-7 center">
        <p class="form_text"><?= $content->content ?></p>
</div>
<div class="users-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin();?>
        <?= $form->field($model, 'number_id')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'class' => 'input_sep col-lg-7']) ?>
        <input type="checkbox" name="terms" value="Terminos" /> Estoy de acuerdo con los <a href="#" > T&eacute;rminos y Condiciones </a>
        <input type="hidden" id="action" name="action" value="CREATE"/>
    </div>
    <div class="col-lg-7">
        <img class= "col-lg-5"src="<?= Url::base() ?>/images/<?= $principal_formulario->image_desktop ?>"/>
        <div class="form-group">
            <input type="submit" name="submit" value="" class= "button_form" style='background-image: url("<?=Url::base() ?>/images/<?= $btn_continuar->image_desktop ?>");' />
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>