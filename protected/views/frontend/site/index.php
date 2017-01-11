<?php $this->pageTitle = 'Adide Stores' ?>
<div class="col-md-12">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banners/banner1.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banners/banner2.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="col-md-12">
    <hr style="margin-bottom: 0px"/>
    <h1 class="text-center primary-color">
        <strong>AMAZING VALUE</strong> shopping is easy at <strong>adide</strong>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo67x50.png" alt="...">
    </h1>
    <hr style="margin-bottom: 2px"/>
    <h3 class="primary-color text-center">There are many different ways of grabbing our great deals, see our options below.</h3>
</div>
<div class="col-md-12">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-6" style="padding-right: 0px">
            <a href="<?php echo $this->createUrl('promo/view', array('id'=>$blackFriday->id)) ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/promo1.png" class="img-responsive center-block">
            </a>
        </div>
        <div class="col-md-6" style="padding-left: 0px">
            <a href="<?php echo $this->createUrl('promo/view', array('id'=>$easter->id)) ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/promo3.png" class="img-responsive center-block">
            </a>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading" style="background-color: pink">
                <h4 class="panel-title primary-color text-center"><strong>See Products Categories</strong></h4>
            </div>
            <div class="panel-body" style="padding: 0">
                <div class="btn-group-vertical" role="group" aria-label="..." style="width: 100%">
                    <?php foreach(Category::model()->findAll() as $category){ ?>
                        <a href="<?php echo $this->createUrl('category/show', array('slug'=>$category->slug)) ?>" class="btn btn-warning" style="width: 100%"><?php echo $category->name ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php foreach($categories as $category){ ?>
            <div class="panel">
                <div class="panel-heading" style="background-color: pink">
                    <h4 class="panel-title primary-color text-center"><strong><?php echo $category->name ?></strong></h4>
                </div>
                <div class="panel-body">
                    <?php foreach($category->products(array('limit' => 12)) as $product){ ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 custom-col">
                            <a href="<?php echo $this->createUrl('products/show', array('slug'=>$product->slug)) ?>">
                                <img src="<?php echo Product::imageAbsoluteUrl($product->image_1) ?>" class="img-responsive center-block product-item" width="174px" height="178px"/>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!--<div class="col-md-12">-->
<!--    <div class="col-md-4 paddingless-left paddingless-right">-->
<!--        <a href="#">-->
<!--            <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/img1.jpg" class="img-responsive center-block">-->
<!--        </a>-->
<!--    </div>-->
<!--    <div class="col-md-4 paddingless-left paddingless-right">-->
<!--        <a href="#">-->
<!--            <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/img2.jpg" class="img-responsive center-block">-->
<!--        </a>-->
<!--    </div>-->
<!--    <div class="col-md-4 paddingless-left paddingless-right">-->
<!--        <a href="#">-->
<!--            <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/img3.jpg" class="img-responsive center-block">-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->
