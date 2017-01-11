<!-- Button trigger modal -->
<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#new-category-modal">
    <span class="fa fa-plus"></span> New Category
</a>

<!-- Modal -->
<div class="modal fade" id="new-category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Category</h4>
            </div>
            <?php echo $this->renderPartial('_form', array('model'=> new Category())); ?>
        </div>
    </div>
</div>