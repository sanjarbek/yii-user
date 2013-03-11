<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>

<h4><?php echo UserModule::t('Your profile'); ?></h4>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

    <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data'=>$model,
            'attributes' => array(
                'username', 
                'email',
                array(
                    'name' => 'status',
                    'value' => User::itemAlias('UserStatus', $model->status),
                ),
                'create_at',
                'lastvisit_at',
            ),
        ));
    ?>
    <h4>Дополнительные поля</h4>
    <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data'=>$profile,
        ));
    ?>
    
