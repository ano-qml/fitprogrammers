<div id="leftcol">
    <h1>Edit this answer</h1>
    <div class="your_answer">
        <h1>Your answer</h1>
        <?php 
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            'enableAjaxValidation'=>true,
            'clientOptions'=>array(
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>true,
                'validateOnSubmit'=>true,
                'validateOnChange'=>true,
                'validateOnType'=>false
            ),
            'htmlOptions'=>array('class'=>'ask_form')
        ));
        ?>
            <p>
                <?php
                echo $form->textArea($model, 'body', array('class'=>'ask_editor'));
                echo $form->error($model ,'body');
                ?>
            </p>
            
            <p>
                <?php
                echo CHtml::submitButton('edit this answer', array('class'=>'ask_submit'));
                ?>
            </p>
        <?php $this->endWidget(); ?> 
    </div>       
</div>



<div id="rightcol">
    <div class="container blue">
        <div class="container_body">
            I am pleased to announce the first version of FIT Programmers System.
            An environment where FITers can share and ask questions about Programming.
        </div>
    </div>

    <div class="container">
        <h1>Recent tags</h1>
        <div class="container_body">

        </div>
    </div>
</div>
