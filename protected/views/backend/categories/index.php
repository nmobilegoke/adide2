<?php echo $this->renderPartial('_new_modal') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Products Count</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category){ ?>
            <tr>
                <td><?php echo $category->name ?></td>
                <td><?php echo $category->description ?></td>
                <td><?php echo count($category->products) ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('backend.php/categories/products', array('id'=>$category->id)) ?>" class="btn btn-default btn-sm">
                        <span fa fa-list></span>
                        Products
                    </a>
                    <?php echo $this->renderPartial('_edit_modal', array('modal'=>$category)) ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>