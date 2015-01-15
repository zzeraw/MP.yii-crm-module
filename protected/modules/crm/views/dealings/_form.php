<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'dealing-form',
    'enableAjaxValidation' => false,
)); ?>

    <h2>Сделка</h2>

    <?php echo $form->errorSummary($dealing_model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($dealing_model,'title'); ?>
        <?php echo $form->textField($dealing_model,'title', array('class' => 'form-control')); ?>
        <?php echo $form->error($dealing_model,'title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($dealing_model,'budget'); ?>
        <?php echo $form->textField($dealing_model,'budget', array('class' => 'form-control')); ?>
        <?php echo $form->error($dealing_model,'budget'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($dealing_model,'status_id'); ?>
        <?php
            echo $form->dropDownList($dealing_model, 'status_id',
                CHtml::listData(CrmDealingStatus::model()->findAll(array('order' => 'sorting')), 'id','title'),
                array('class' => 'form-control')
            );
        ?>
        <?php echo $form->error($dealing_model,'status_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($dealing_model,'note'); ?>
        <?php echo $form->textArea(
            $dealing_model,
            'note',
            array(
                'rows' => 6,
                'cols' => 50,
                'class' => 'form-control',
            )
        ); ?>
        <?php echo $form->error($dealing_model,'note'); ?>
    </div>


    <div class="buttons">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>

</div>
