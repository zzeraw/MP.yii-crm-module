<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('class' => 'form-control input-large', 'value' => '')); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'role_id'); ?>
        <?php
            echo $form->dropDownList($model, 'role_id',
                CHtml::listData(CrmUserRole::model()->findAll(array('order' => 'id')), 'id', 'title'),
                array('class' => 'form-control')
            );
        ?>
        <?php echo $form->error($model, 'role_id'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->