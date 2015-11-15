<?php
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Preguntas';
$script=<<< JS
$('.next').click(function() {
	var id= $(this).attr('id_question');
	var next= parseInt(id)+1;
	var name = "question_"+id;
	var hidden="#answer_of_question_"+id;
	var container="#question_container_"+id;
	var container_next="#question_container_"+next;
var answer=$('input[name="'+name+'"]:checked').val();
$(hidden).val(answer);
if($(hidden).val()!='null'){
$(container).hide();
$(container_next).show();
}
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
        		<?php foreach($question->answers as $answer): ?>
        		<input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>"><?= $answer->content ?><br>
        		<?php endforeach; ?>

        	</div>
        	<a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#">Siguiente</a>
        	<input type="hidden" id="answer_of_question_<?= $question->id ?>" value="null" />
        </div>
        <?php }else{ ?>
        <div id="question_container_<?= $question->id ?>" style="display:none">
        	<?= $question->content ?>
        	<div>
        		<?php foreach($question->answers as $answer): ?>
        		<input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>"><?= $answer->content ?><br>
        		<?php endforeach; ?>

        	</div>
        	<a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#">Siguiente</a>
        	<input type="hidden" id="answer_of_question_<?= $question->id ?>" value="null" />
        </div>
        <?php } ?>
    	<?php endforeach; ?>
    	<div id="question_container_<?= count($model)+1 ?>" style="display:none;"> <input type="submit" value="Finalizar"></div>

        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>