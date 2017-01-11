<div class="col-md-12">
    <div class="row">
        <div class="col-md-12" style="background-color: white;">
            <div id="products" class="row">
                <?php if(count($results) == 0){ ?>
                    <div class="col-md-8 col-md-offset-2">
                        <span style="color: red">No product found.</span>
                    </div>
                <?php }else{ ?>
                    <?php foreach($results as $product){ ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 custom-col product">
                            <a href="<?php echo $this->createUrl('products/show', array('slug'=>$product->slug)) ?>" data-toggle="tooltip" data-placement="bottom" title="<?php "Order $product->name Now" ?>">
                                <img src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" class="img-responsive center-block product-item" width="174px" height="178px"/>
                            </a>
                            <h5 class="text-center">
                                <strong><?php echo $product->name ?></strong>&nbsp;<br/>
                                <strong style="color: #ff0000">&#8358;<?php echo $product->price ?></strong>
                            </h5>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <center>
                <?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
            </center>
        </div>
    </div>
</div>