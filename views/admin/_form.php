<div class="well-small">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
	<?php echo $form->errorSummary(array($model,$profile)); ?>

		<?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->passwordFieldRow($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->dropDownListRow($model,'superuser',User::itemAlias('AdminStatus')); ?>
		<?php echo $form->dropDownListRow($model,'status',User::itemAlias('UserStatus')); ?>
<?php 
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
			<?php
			}
		}
?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>