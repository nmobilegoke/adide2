<style>
    .product-thumb:hover
    {
        cursor: hand;
        cursor: pointer;
    }
</style>
<div class="col-md-12">
    <div class="col-md-5">
        <div class="col-md-12">
            <img id="main-image" src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" width="400px" height="300px" class="thumbnail img-responsive"/>
        </div>
        <div class="col-md-3">
            <?php if($product->image_1){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" onclick="$('#main-image').attr('src',$(this).attr('src'));"/>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_2){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_2) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" onclick="$('#main-image').attr('src',$(this).attr('src'));"/>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_3){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_3) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" onclick="$('#main-image').attr('src',$(this).attr('src'));"/>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_4){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_4) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" onclick="$('#main-image').attr('src',$(this).attr('src'));"/>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-7">
        <p><strong>Category: </strong><?php echo $product->category->name ?></p>
        <p><strong>Product Title: </strong><?php echo $product->name ?></p>
        <p><strong>Brand: </strong><?php echo $product->brand ?></p>
        <p><strong>Status: </strong><?php echo $product->is_online ? 'Live Online' : 'Pending' ?></p>
        <p><?php echo $product->short_description ?></p>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Unit Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $product->price ?></td>
                    <td><?php echo $product->stock ?></td>
                    <td>
                        <a href="<?php echo $this->createUrl('backend.php/products/update', array('id'=>$product->id)) ?>" class="btn btn-default btn-sm">
                            <span class="fa fa-pencil"></span> Edit
                        </a>
                        <a href="<?php echo $this->createUrl('backend.php/products/clone', array('id'=>$product->id)) ?>" class="btn btn-default btn-sm">
                            <span class="fa fa-copy"></span> Clone
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
