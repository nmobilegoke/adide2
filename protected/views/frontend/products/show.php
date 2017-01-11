<style>
    .product-thumb:hover
    {
        cursor: hand;
        cursor: pointer;
    }
</style>
<div class="col-md-12">
    <div class="col-md-5">
        <div id="main-image-container" class="col-md-12">
            <img id="main-image" data-toggle="magnify" src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" width="400px" height="300px" class="thumbnail img-responsive "/>
            <?php if($promo){ ?>
                <div class="promo">
                    <span>Save</span>
                    <span><?php echo $promo->saving_rate ?>%</span>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_1){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" />
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_2){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_2) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" />
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_3){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_3) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" />
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if($product->image_4){?>
                <img src="<?php echo Product::imageAbsoluteUrl($product->image_4) ?>" width="100px" height="100px" class="thumbnail img-responsive product-thumb" />
            <?php } ?>
        </div>
    </div>
    <div class="col-md-7" style="background-color: white">
        <p><strong>Category: </strong><?php echo $product->category->name ?></p>
        <p><strong>Product Title: </strong><?php echo $product->name ?></p>
        <p><strong>Brand: </strong><?php echo $product->brand ?></p>
        <p><?php echo $product->short_description ?></p>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Price</th>
                    <th>Qty</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <form action="<?php echo $this->createUrl('backend.php/products/order', array('id'=>$product->id)) ?>" method="post">
                    <tr>
                        <td>&#x20A6;<?php echo $promo ? $promo->newPrice($product->price) : $product->price ?></td>
                        <td><input type="number" min="1" size="4" value="1"></td>
                        <td>
                            <button type="submit" class="btn btn-warning btn-lg">
                                <span class="fa fa-credit-card"></span> Buy Now
                            </button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.product-thumb').click(function(){
            var img = $('#main-image-container img');
            img.attr('src',$(this).attr('src'));
            var clone = img.clone();
            img.remove();
            $('#main-image-container').html(clone);
            $('#main-image').magnify();
        });
    });
</script>