<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Formulario';
$script="
$('#users-number_id').change(function(){
        $.ajax({
  
    url : 'site/find',
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

var elements = document.getElementsByTagName('INPUT');
for (var i = 0; i < elements.length; i++) {
    elements[i].oninvalid = function(e) {
        e.target.setCustomValidity('');
        if (!e.target.validity.valid) {
            e.target.setCustomValidity('Este campo es obligatorio');
        }
    };
    elements[i].oninput = function(e) {
        e.target.setCustomValidity('');
    };
}
";
$this->registerJs($script,View::POS_END);
?>
<div class="col-md-7 col-xs-12 center user-form-text-container">
        <p class="form_text"><?= $content->content ?></p>
</div>
<div class="users-form col-xs-12">
    <div class="col-md-5">
        <?php $form = ActiveForm::begin();?>
        <?= $form->field($model, 'number_id')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'class' => 'input_sep col-sm-7']) ?>
        <input type="checkbox" name="terms" value="Terminos" required title="Acepta los T&eacute;rminos y Condiciones para continuar" /> Estoy de acuerdo con los <a href="<?= Url::base() ?>/BasesyCondiciones_NavidadMarcimex.pdf" target="_blank"> T&eacute;rminos y Condiciones </a>
        <input type="image" name="submit" value="" class= "button_form pull-right" src='<?=Url::base() ?>/images/<?= $btn_continuar->image_desktop ?>' />
        
        <input type="hidden" id="action" name="action" value="CREATE"/>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-7 submit-container">
        <img class= "col-xs-5"src="<?= Url::base() ?>/images/<?= $principal_formulario->image_desktop ?>"/>
        <div class="form-group">
            <a  href="<?= Url::to(['site/awards']) ?>"><img class="btn_awardform" src="<?= Url::base() ?>/images/<?= $btn_premios->image_desktop ?>"/></a>    
        </div>
    </div>
</div>