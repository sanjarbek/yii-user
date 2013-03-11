<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="row-fluid">
    <div class="span6">
    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
//        'title'=>'Logo',
//        'headerIcon'=>'icon-th-list',
        'htmlOptions'=>array(
//            'class'=>'span6',
        )
    ));
    ?>
        <img src="images/logo.png" alt="Semamed" width="span6" />
    
    <?php
    $this->endWidget();
    ?>  
    </div>
        
    <div class="span6">
    <?php 
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title'=>'Вход',
        'headerIcon'=>'icon-user',
        'htmlOptions'=>array(
//            'class'=>'span6'
        )
    ));
    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
//            'class'=>'span6',
        ),
    )); ?>

            <?php echo $form->textFieldRow($model,'username', array(
            )); ?>
            <?php echo $form->passwordFieldRow($model,'password', array(
                'hint'=>CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl) . ' | ' . CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl)
            )); ?>
        
            <?php echo $form->checkBoxRow($model,'rememberMe'); ?>
            <hr />
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'Вход',
            )) ?>


    <?php $this->endWidget(); 
    $this->endWidget();?>
    </div>
</div>
