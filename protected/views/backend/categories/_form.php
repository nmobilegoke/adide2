<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'category-form',
        'action'=> $model->isNewRecord ? $this->createUrl('backend/categories/create') : $this->createUrl('backend.php/categories/update', array('id'=>$model->id)),
        'enableAjaxValidation'=>false,
        'focus'=>array($model,'name'),
    )); ?>
    <?php echo $form->errorSummary($model); ?>
    <table class="table">
        <thead>
            <tr>
                <th>Fields with <span class="required">*</span> are required.</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $form->labelEx($model,'name'); ?></td>
                <td><?php echo $form->textField($model,'name', array('class'=>'form-control', 'required'=>'required')); ?></td>
                <td><?php echo $form->error($model,'name'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'description'); ?></td>
                <td><?php echo $form->textArea($model,'description', array('class'=>'form-control', 'required'=>'required')); ?></td>
                <td><?php echo $form->error($model,'description'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'show_on_home'); ?></td>
                <td><?php echo $form->checkBox($model,'show_on_home', array('class'=>'form-control')); ?></td>
                <td><?php echo $form->error($model,'show_on_home'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo CHtml::submitButton('Submit', array('class'=>'form-control btn btn-success')); ?></td>
            </tr>
        </tbody>
    </table>
    <?php $this->endWidget(); ?>
</div>