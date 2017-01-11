<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'product-form',
        'enableAjaxValidation'=>false,
        'action'=> $model->isNewRecord ? $this->createUrl('backend/products/create') : $this->createUrl('backend.php/products/update', array('id'=>$model->id)),
        'enableAjaxValidation'=>false,
        'focus'=>array($model,'name'),
        ));
    ?>
        <p><?php echo $form->errorSummary($model); ?></p>
        <table class="table">
            <thead>
            <tr>
                <th>Fields with <span class="required">*</span> are required.</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $form->labelEx($model,'category_id'); ?></td>
                    <td><?php echo $form->dropDownList($model,'category_id',CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('class'=>'form-control', 'required'=>'required','prompt' => 'Select Category')); ?></td>
                    <td><?php echo $form->error($model,'category_id'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'name'); ?></td>
                    <td><?php echo $form->textField($model,'name', array('class'=>'form-control', 'required'=>'required')); ?></td>
                    <td><?php echo $form->error($model,'name'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'brand'); ?></td>
                    <td><?php echo $form->textField($model,'brand', array('class'=>'form-control', 'required'=>'required')); ?></td>
                    <td><?php echo $form->error($model,'brand'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'price'); ?></td>
                    <td><?php echo $form->numberField($model,'price', array('class'=>'form-control', 'required'=>'required')); ?></td>
                    <td><?php echo $form->error($model,'price'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'stock'); ?></td>
                    <td><?php echo $form->numberField($model,'stock', array('class'=>'form-control', 'required'=>'required')); ?></td>
                    <td><?php echo $form->error($model,'stock'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'short_description'); ?></td>
                    <td>
                        <?php
                            $this->widget('ext.niceditor.nicEditorWidget',array(
                                "model"=>$model,                // Data-Model
                                "attribute"=>'short_description',        // Attribute in the Data-Model
                                "defaultValue"=> $model->short_description,
                                "config"=>array("maxHeight"=>"200px"),
                                "width"=>"400px",       // Optional default to 100%
                                "height"=>"200px",      // Optional default to 150px
                            ));
                        ?>
                    </td>
                    <td><?php echo $form->error($model,'short_description'); ?></td>
                </tr>
            </tbody>
        </table>
        <center>
            <?php echo CHtml::submitButton('Save and Continue', array('class'=>'btn btn-success btn-lg')); ?>
        </center>
    <?php $this->endWidget(); ?>
</div>