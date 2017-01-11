<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product){?>
            <tr>
                <td>
                    <div class="media">
                        <div class="pull-left">
                            <a href="<?php echo $this->createUrl('backend.php/products/show',array('id'=>$product->id)) ?>">
                                <img class="media-object" src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" width="100px" height="100px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><?php echo $product->name ?></h5>
                            <a href="<?php echo $this->createUrl('backend.php/products/show',array('id'=>$product->id)) ?>">Preview Listing</a>
                        </div>
                    </div>
                </td>
                <td><?php echo $product->price ?></td>
                <td><?php echo $product->stock ?></td>
                <td><?php echo $product->is_online? 'Live on Online' : 'Pending' ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('backend.php/products/show',array('id'=>$product->id)) ?>" class="btn btn-default btn-sm">Preview Listing</a>
                    <a href="<?php echo $this->createUrl('backend.php/products/update',array('id'=>$product->id)) ?>" class="btn btn-default btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>