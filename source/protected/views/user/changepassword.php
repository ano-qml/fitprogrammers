<div class="post_title">
    User Profile
</div>

<div class="login_form">
    <h1>Change your password</h1>
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
            <span class="ask_title">Old password</span>
            <?php
            echo $form->passwordField($model, 'oldPassword', array('class'=>'textbox'));
            echo $form->error($model,'oldPassword');
            ?>
        </p>
        <p>
            <span class="ask_title">New password</span>
            <?php
            echo $form->passwordField($model, 'password', array('class'=>'textbox'));
            echo $form->error($model,'password');
            ?>
        </p>
        
        <p>
            <span class="ask_title">Confirm new password</span>
            <?php
            echo $form->passwordField($model, 'password2', array('class'=>'textbox'));
            echo $form->error($model,'password2');
            ?>
        </p>

        <p>
            <?php
            echo CHtml::submitButton('Change password', array('class'=>'ask_submit'));
            ?>
        </p>
    <?php $this->endWidget(); ?>
</div>