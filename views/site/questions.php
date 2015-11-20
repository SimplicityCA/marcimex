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

    var answer_container="#answer_container_"+id;
    var answer_container_next="#answer_container_"+next;

    var img_container="#img_pregunta"+id;
    var img_container_next="#img_pregunta"+next;

	if(answer)
	$(hidden).val(answer);
	if($(hidden).val()!='no'){	
        $(container).hide();
        $(container_next).show();
        $(answer_container).hide();
        $(answer_container_next).show();
        $(img_container).hide();
        $(img_container_next).show();
    }else
    {
        alert('Selecciona una opción')
    }
});
JS;
$this->registerJs($script,View::POS_END);
?>

    	<?php $form = ActiveForm::begin(); ?>
        <?php foreach($model as $k => $question): ?>
            <?php $checked_answer = rand(0,2); ?>
            <?php if($k==0){ ?>
                
    	        <div id="question_container_<?= $question->id ?>" class="col-md-7 center question_container">
                    <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                        <p class="text_questions"><?= $question->content ?></p>
                    <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                </div>
                
        	       <div class="col-md-5 answer_container" id="answer_container_<?= $question->id ?>">
            		  <?php foreach($question->answers as $z => $answer): ?>
                          <?php $checked1 = ($z==$checked_answer)?"checked":""; ?>
            		      <input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>"<?= $checked1 ?>><?= $answer->content ?><br>
            		  <?php endforeach; ?>
            	       <a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#"><img style="float:left" src="<?= Url::base() ?>/images/<?= $btn_siguiente->image_desktop ?>"/></a>
            	       <input type="hidden" id="answer_of_question_<?= $question->id ?>" value="no" />
                    </div>
                    
               
            <?php }else{ ?>
                    <div id="question_container_<?= $question->id ?>" class="col-md-7 center question_container" style="display:none">
                        <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                            <p class="text_questions"><?= $question->content ?></p>
                        <img class="col-sm-12" src="<?= Url::base() ?>/images/<?= $sep->image_desktop ?>" />
                    </div>
    	          
                        <div id="answer_container_<?= $question->id ?>" class="col-md-5 answer_container" style="display:none" >
                		      <?php foreach($question->answers as $y => $answer): ?>
                                    <?php $checked2 = ($y==$checked_answer)?"checked":""; ?>
                		          <input type="radio" name="question_<?= $question->id ?>" value="<?= $answer->correct ?>" <?= $checked2 ?>><?= $answer->content ?><br>
                		      <?php endforeach; ?>

        	           
                    	       <?php if($k+1==count($model)){ ?>
              
                    	           <!-- <input type="submit" value="Finalizar"> -->
                                   <input type="image" name="submit" value="" class= "next" src='<?= Url::base() ?>/images/<?= $btn_siguiente->image_desktop ?>' />
                    	       <?php }else{ ?>
            			             <a id="button_question_<?= $question->id ?>" id_question="<?= $question->id ?>" class="next" href="#"><img style="float:left" src="<?= Url::base() ?>/images/<?= $btn_siguiente->image_desktop ?>"/></a>
                    	       <?php } ?>
        	               <input type="hidden" id="answer_of_question_<?= $question->id ?>" value="no" />
                        </div> 
                       
                   
            <?php } ?>
    	<?php endforeach; ?>
                   


    <?php ActiveForm::end(); ?>
    <div class="col-md-7 center question-images-container">
        <img id="img_<?= $pregunta1->name ?>"  src="<?= Url::base() ?>/images/<?= $pregunta1->image_desktop ?>"/>
        <img id="img_<?= $pregunta2->name ?>" style="display:none" src="<?= Url::base() ?>/images/<?= $pregunta2->image_desktop ?>"/>
        <img id="img_<?= $pregunta3->name ?>" style="display:none" src="<?= Url::base() ?>/images/<?= $pregunta3->image_desktop ?>"/>
        <img id="img_<?= $pregunta4->name ?>" style="display:none" src="<?= Url::base() ?>/images/<?= $pregunta4->image_desktop ?>"/>
        <img id="img_<?= $pregunta5->name ?>" style="display:none" src="<?= Url::base() ?>/images/<?= $pregunta5->image_desktop ?>"/>

    </div>
