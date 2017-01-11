<?php
/* @var $this PromoController */
/* @var $model Promo */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'promo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <table class="table">
        <tr>
            <td><?php echo $form->labelEx($model,'title'); ?></td>
            <td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?></td>
            <td><?php echo $form->error($model,'title'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'description'); ?></td>
            <td><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?></td>
            <td><?php echo $form->error($model,'description'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'active'); ?></td>
            <td><?php echo $form->checkBox($model,'active', array('class'=>'form-control')); ?></td>
            <td><?php echo $form->error($model,'active'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'saving_rate'); ?></td>
            <td><?php echo $form->textField($model,'saving_rate', array('class'=>'form-control')); ?></td>
            <td><?php echo $form->error($model,'saving_rate'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-default')); ?></td>
            <td></td>
        </tr>
    </table>
<?php $this->endWidget(); ?>
