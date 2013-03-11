<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change password"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>

<h4><?php echo UserModule::t("Change password"); ?></h4>

<div class="well-small">	
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
    'type'=>'horizontal',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
    
	<?php echo $form->passwordFieldRow($model,'oldPassword'); ?>
	<?php echo $form->passwordFieldRow($model,'password', array(
        'hint'=>UserModule::t("Minimal password length 4 symbols."),
    ));
    ?>
	<?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>	
	
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>UserModule::t("Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->