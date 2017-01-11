<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title text-center"><?php echo $model->title ?> Promo</h4>
    </div>
    <div class="panel-body">
        <p>
            <strong>Description:</strong> <?php echo $model->description ?>
        </p>
        <p>
            <strong>Saving Rate:</strong> <?php echo $model->saving_rate ?>%
        </p>
        <p>
            <strong>Status:</strong> <?php echo $model->status(); ?>
        </p>
        <hr/>
        <h4 class="text-center">Products Under Promo</h4>
        <hr style="margin: 0"/>
        <input id="promo_products" name="term" data-pre='<?php echo $preData; ?>'/>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#promo_products").tokenInput("<?php echo $this->createUrl('backend/products/search') ?>", {
            crossDomain: false,
            propertyToSearch: "name",
            prePopulate: $('#promo_products').data('pre'),
            hintText: "Type product name to add to promo",
            noResultsText: "Product not found.",
            theme: 'facebook',
            preventDuplicates: true,
            onAdd: function(product)
            {
                $.ajax({
                    url: "<?php echo $this->createUrl('backend/promo/addProduct').'?promo_id='.$model->id ?>",
                    type: 'POST',
                    dataType: 'script',
                    data: {'product_id': product.id},
                    success: function(res) {
                        //console.log(res);
                    }
                });
            },
            onDelete: function(product)
            {
                $.ajax({
                    url: "<?php echo $this->createUrl('backend/promo/removeProduct').'?promo_id='.$model->id ?>",
                    type: 'POST',
                    dataType: 'script',
                    data: {'product_id': product.id},
                    success: function(res) {
                        //console.log(res);
                    }
                });
            }
        });
    });
</script>