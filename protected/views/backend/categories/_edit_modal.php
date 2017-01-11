<!-- Button trigger modal -->
<a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#edit-category-<?php echo $modal->id ?>-modal">
    <span class="fa fa-pencil"></span> Edit
</a>

<!-- Modal -->
<div class="modal fade" id="edit-category-<?php echo $modal->id ?>-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <?php echo $this->renderPartial('_form', array('model'=> $modal)); ?>
        </div>
    </div>
</div>