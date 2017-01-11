<?php if(Yii::app()->user->getFlash('success', 'Cloned successfully!')){ ?>
    <p class="alert alert-success alert-dismissable"><?php echo Yii::app()->user->getFlash('success', 'Cloned successfully!') ?></p>
<?php } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Update Product</h4>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model'=>$model)) ?>
    </div>
</div>
