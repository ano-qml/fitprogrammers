<div class="post_title">
    A question on .NET Course: how can we manage to do the source code when we dont know it
</div>


<div id="leftcol">
    <div class="post_container">
        <div class="post_left">
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_up.png" /></a>
            <span class="vote_count">
                <?php echo $question->vote_up_count - $question->vote_down_count; ?>
            </span>
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_down.png" /></a>
            <a href="#" class="star"><img src="<?php echo Yii::app()->baseUrl ?>/images/star.png" /></a>
        </div>
        <div class="post_right">
            <div class="post_body">
                <?php
                echo $question->body;
                ?>
            </div>
            <div class="post_tags">
                <?php
                for ($i = 0; $i < count($question->tags); $i++) { 
                ?>
                <a href="<?php echo Yii::app()->createUrl('tags/index',array('name'=>trim($question->tags[$i])))?>" class="tag" title="tags"><?php echo trim($question->tags[$i]); ?></a>
                <?php
                }
                ?>
            </div>
            <div class="post_actions">
                <a href="#">link</a>
                |
                <a href="#">edit</a>
            </div>
            <div class="post_info">
                asked <b><?php echo $question->created_date; ?></b>
                <br />
                <a href="#"><?php echo FMembership::getAuthor($question->author)->getAttribute('real_name'); ?></a>
            </div>
            <div class="post_comments"></div>
        </div>
    </div>
    
    <div class="post_answer_title"><?php echo count($answers); ?> answers</div>
    
    
    <?php
    foreach($answers as $answer) {
    ?>
    <div class="post_container">
        <div class="post_left">
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_up.png" /></a>
            <span class="vote_count"><?php echo $answer->vote_up_count - $answer->vote_down_count; ?></span>
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_down.png" /></a>
            <a href="#" class="star"><img src="<?php echo Yii::app()->baseUrl ?>/images/star.png" /></a>
        </div>
        <div class="post_right">
            <div class="post_body">
                <?php
                echo $answer->body;
                ?>
            </div>
            <div class="post_actions">
                <a href="#">link</a>
                |
                <a href="#">edit</a>
            </div>
            <div class="post_info">
                answered <b><?php echo $answer->created_date ?></b>
                <br />
                <a href="#"><?php echo FMembership::getAuthor($answer->author)->getAttribute('real_name'); ?></a>
            </div>
            <div class="post_comments"></div>
        </div>
    </div>
    <hr class="hr" />
    <?php
    }
    ?>
    
    
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
                echo CHtml::submitButton('post answer', array('class'=>'ask_submit'));
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