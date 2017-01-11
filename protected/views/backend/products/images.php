<div class="col-md-6 col-md-offset-4">
    <div style="border: 2px dashed #808080; width: 250px;height: 200px;padding: 10px">
        <?php
        $this->widget('ext.NavaJcrop.ImageJcrop', array(
            'config' => array(
                'title'=>$product->name,
                'image'=> Yii::app()->baseUrl.'/uploads/default.png',//required, all field below are not required.
                'id'=>'image-1',
                'unique'=>true,
                'buttons'=>array(
                    /*
                   'cancel'=>array(
                       'name'=>'Cancel',
                       'class'=>'button-crop',
                       'style'=>'margin-left: 5px;',
                   ),
                   'edit'=>array(
                       'name'=>'Edit',
                       'class'=>'button-crop',
                       'style'=>'margin-left: 5px;',
                   ),*/
                    'crop'=>array(
                        'name'=>'Done',
                        'class'=>'btn btn-success',
                        'style'=>'margin-left: 5px;',
                    )
                ),
                'options'=>array(
                    'imageWidth'=>200,
                    'imageHeight'=>200,
                    'resultStyle'=>'position: fixed;top: 10%;left: 25%;max-width:350px;max-height:350px;z-index: 9999;',
                    'resultMaxWidth'=>500,
                    'resultMinWidth'=>500,
                ),
                'callBack'=> array(
                    'success'=>"function(obj,res){doSomething(obj,res);}",
                    'error'=>"function(){alert('error');}",
                )
            )
        ));
        ?>
    </div>
    <div style="margin: 10px">
        <small>Click camera to upload images </small>
        <strong>500px X 500px<strong>
        <h4>
            <strong>
                <span id="images_count"><?php echo $product->images_count ?></span>/4
            </strong>
        </h4>
    </div>
</div>
<div class="col-md-12">
    <hr/>
</div>
<div class="col-md-12">
    <div class="col-md-3">
        <div id="image_1">
            <?php if($product->image_1){
                echo '<img src="'.Product::imageAbsoluteUrl($product->image_1).'" width="200px" height="200px" class="thumbnail"/>';
                echo CHtml::ajaxLink(
                    '<span class="fa fa-remove"></span> Delete',
                    array('backend.php/products/removeImage?id='.$product->id.'&image_tag=image_1'),
                    array('update' => '#image_1'),
                    array('class'=> 'btn btn-warning text-center')
                );
            } ?>
        </div>
    </div>
    <div class="col-md-3">
        <div id="image_2">
            <?php if($product->image_2){
                echo '<img src="'.Product::imageAbsoluteUrl($product->image_2).'" width="200px" height="200px" class="thumbnail"/>';
                echo CHtml::ajaxLink(
                    '<span class="fa fa-remove"></span> Delete',
                    array('backend.php/products/removeImage?id='.$product->id.'&image_tag=image_2'),
                    array('update' => '#image_2'),
                    array('class'=> 'btn btn-warning text-center')
                );
            } ?>
        </div>
    </div>
    <div class="col-md-3">
        <div id="image_3">
            <?php if($product->image_3){
                echo '<img src="'.Product::imageAbsoluteUrl($product->image_3).'" width="200px" height="200px" class="thumbnail"/>';
                echo CHtml::ajaxLink(
                    '<span class="fa fa-remove"></span> Delete',
                    array('backend.php/products/removeImage?id='.$product->id.'&image_tag=image_3'),
                    array('update' => '#image_3'),
                    array('class'=> 'btn btn-warning text-center')
                );
            } ?>
        </div>
    </div>
    <div class="col-md-3">
        <div id="image_4">
            <?php if($product->image_4){
                echo '<img src="'.Product::imageAbsoluteUrl($product->image_4).'" width="200px" height="200px" class="thumbnail"/>';
                echo CHtml::ajaxLink(
                    '<span class="fa fa-remove"></span> Delete',
                    array('backend.php/products/removeImage?id='.$product->id.'&image_tag=image_4'),
                    array('update' => '#image_4'),
                    array('class'=> 'btn btn-warning text-center')
                );
            } ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <hr/>
    <center>
        <a href="<?php echo $this->createUrl('backend.php/products/show', array('id'=>$product->id)) ?>" class="btn btn-success btn-lg">Finish</a>
    </center>
</div>
<script>
    function doSomething(obj,res){ //the 'obj' is IMG tag, 'res' is base64image
        $.ajax({
            cache: false,
            type: "post",
            url: '<?php echo Yii::app()->createUrl('backend.php/products/upload', array('id'=>$product->id));?>',
            data: 'image='+res,
            success: function(data){
                obj.attr('src',res);
                if(data['error']== undefined)
                {
                    //upload successful
                    $('#'+data['image_tag']).html('<img src="'+data['url']+'" width="200px" height="200px" class="thumbnail"/>');
                    $('#images_count').html(data['images_count']);
                }
                else
                {
                    alert(data['error']);
                }
            }
        });
    }
</script>