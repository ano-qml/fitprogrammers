<div id="leftcol">
    <h1>Edit this question</h1>
    <?php $form = $this->beginWidget('CActiveForm', array(
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
    //$form = new CActiveForm;
    ?>
        <p>
            <span class="ask_title">Title</span>
            <?php
            echo $form->textField($model, 'title', array('class'=>'textbox'));
            echo $form->error($model,'title');
            ?>
            <br />
            <i>what is your programming question?</i>
        </p>

        <p>
            <?php
            echo $form->textArea($model, 'body', array('class'=>'ask_editor'));
            echo $form->error($model,'body');
            ?>
        </p>

        <p>
            <span class="ask_title">Tags</span>
            <?php
            echo $form->textField($model, 'tags', array('class'=>'textbox'));
            echo $form->error($model,'tags');
            ?>
            <br />
            <i>at least one tag, max 10 tags. For example: csharp, .net, sql server, syntax error</i>
        </p>

        <p>
            <?php
            echo CHtml::submitButton('edit this question', array('class'=>'ask_submit'));
            ?>
        </p>
    <?php $this->endWidget(); ?>        
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
