<div class="form">
    <?php
        echo CHtml::beginForm();
    ?>
        <div id="photo-<?php echo $counter ?>">
                <?php
                $this->widget('ext.NavaJcrop.ImageJcrop', array(
                    'config' => array(
                        'image'=>$photo->url,//required, all field below are not required.
                        'id'=>'photo-'.$counter,
                        'unique'=>true,
                        'buttons'=>array(
                            'cancel'=>array(
                                'name'=>'Cancel',
                                'class'=>'button-crop',
                                'style'=>'margin-left: 5px;',
                            ),
                            /*'edit'=>array(
                                'name'=>'Edit',
                                'class'=>'button-crop',
                                'style'=>'margin-left: 5px;',
                            ),*/
                            'crop'=>array(
                                'name'=>'Crop',
                                'class'=>'button-crop',
                                'style'=>'margin-left: 5px;',
                            )
                        ),
                        'options'=>array(
                            'imageWidth'=>150,
                            'imageHeight'=>175,
                            'resultStyle'=>'position: fixed;top: 50px;max-width:350px;max-height:350px;z-index: 9999;',
                            'resultMaxWidth'=>350,
                            'resultMinWidth'=>350,
                        ),
                        'callBack'=> array(
                            'success'=>"function(obj,res){doSomething(obj,res);}",
                            'error'=>"function(){alert('error');}",
                        )
                    )
                ));
                ?>
        </div>
    <?php CHtml::endForm(); ?>
</div>
<script>
    function upload(obj,res){ //the 'obj' is IMG tag, 'res' is base64image
        $.ajax({
            cache: false,
            type: "post",
            url: '<?php echo Yii::app()->createUrl('backend/photos/upload');?>',
            data: 'image='+res,
            success: function(data){
                obj.attr('src',res);
            }
        });
    }
</script>