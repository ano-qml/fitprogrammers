<div class="post_tilte">
    Login to FITProgrammers
</div>

<div class="login_form">
    <h1>Login information</h1>
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
    ?>
        <p>
            <!-- Error summary -->
            <?php echo $form->errorSummary($model); ?>
        </p>
        <p>
            <span class="ask_title">Account</span>
            <?php
            echo $form->textField($model, 'fitportal_id', array('class'=>'textbox'));
            echo $form->error($model,'fitportal_id', array('class'=>'error'));
            ?>
        </p>
        <p>
            <span class="ask_title">Password</span>
            <?php
            echo $form->passwordField($model, 'password', array('class'=>'textbox'));
            echo $form->error($model,'password', array('class'=>'error'));
            ?>
        </p>

        <p>
            <?php
            echo CHtml::submitButton('Login', array('class'=>'ask_submit'));
            ?>
        </p>
    <?php $this->endWidget(); ?>
</div>