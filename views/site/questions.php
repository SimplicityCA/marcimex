<?php
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$checked2="";
$checked1="";
$this->title = 'Preguntas';
$script=<<< JS
$('.next').click(function() {
		var id= $(this).attr('id_question');
	var next= parseInt(id)+1;
	var name = "question_"+id;
	var answer=$('input[name="'+name+'"]:checked').val();

		var hidden="#answer_of_question_"+id;
		var container="#question_container_"+id;
	var container_next="#question_container_"+next;
	if(answer)
	$(hidden).val(answer);
		//alert($(hidden).val());
	if($(hidden).val()!='no'){


	

	
$(container).hide();
$(container_next).show();
}else{alert('Selecciona una opción')}
});
JS;
$this->registerJs($script,View::POS_END);
?>
<div class="site-index">



    <div class="body-content">
    	<?php $form = ActiveForm::begin(); ?>
        <div class="row">
        <?php foreach($model as $k => $question): ?>
        <?php if($k==0){ ?>
        <div id="question_container_<?= $question->id ?>">
        	<?= $question->content ?>
        	<div>
        		<?php foreach($question->answers as $z => $answer): ?>
                <?php if($z==0){ $checked1="checked"; } ?>
        		<input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>"<?= $checked1 ?>><?= $answer->content ?><br>
        		<?php endforeach; ?>

        	</div>
        	<a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#">Siguiente</a>
        	<input type="hidden" id="answer_of_question_<?= $question->id ?>" value="no" />
        </div>
        <?php }else{ ?>
        <div id="question_container_<?= $question->id ?>" style="display:none">
        	<?= $question->content ?>
        	<div>
        		<?php foreach($question->answers as $y => $answer): ?>
                <?php if($y==0){ $checked2="checked"; } ?>
        		<input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>" <?= $checked2 ?>><?= $answer->content ?><br>
        		<?php endforeach; ?>

        	</div> 
        	<?php if($k+1==count($model)){ ?>
  
        	 <input type="submit" value="Finalizar">
        	<?php }else{ ?>
			<a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#">Siguiente</a>
        	<?php } ?>
        	<input type="hidden" id="answer_of_question_<?= $question->id ?>" value="no" />
        	
        	
        </div>
        <?php } ?>
    	<?php endforeach; ?>
<img id="img_<?= $pregunta1->name ?>" style="float:left" src="<?= Url::base() ?>/images/<?= $pregunta1->image_desktop ?>"/>
<img id="img_<?= $pregunta2->name ?>" style="float:left" src="<?= Url::base() ?>/images/<?= $pregunta2->image_desktop ?>"/>
<img id="img_<?= $pregunta3->name ?>" style="float:left" src="<?= Url::base() ?>/images/<?= $pregunta3->image_desktop ?>"/>
<img id="img_<?= $pregunta4->name ?>" style="float:left" src="<?= Url::base() ?>/images/<?= $pregunta4->image_desktop ?>"/>
<img id="img_<?= $pregunta5->name ?>" style="float:left" src="<?= Url::base() ?>/images/<?= $pregunta5->image_desktop ?>"/>
<img style="float:left" src="<?= Url::base() ?>/images/<?= $btn_siguiente->image_desktop ?>"/>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
