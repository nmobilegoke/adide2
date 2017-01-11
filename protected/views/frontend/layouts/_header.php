<div id="layer-1" class="col-md-12">
    <span>0700-ADIDE | </span>
    <span>customer@adide.ng</span>
    <div class="pull-right">
        <a href="#" style="color: #ffffff">Login</a> | <a href="#" style="color: #ffffff">Create Account</a> | <a href="#" style="color: #ffffff">Help</a>
    </div>
</div>
<div id="layer-2" class="col-md-12">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo67x50.png" alt="...">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-text-white.png" alt="...">
    </a>
    <a href="#">
        <strong>
            <span class="fa fa-tint"></span> Store Finder
        </strong>
    </a>
    <a href="#">
        <strong>
            <span class="fa fa-cart-plus"></span> Shopping Cart
        </strong>
    </a>
    <div class="pull-right">
        <form class="navbar-form navbar-left" role = "search" action="<?php echo $this->createUrl('products/search'); ?>">
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control edges-circle" placeholder="search product title or category" size="35" name="term"/>
                    <span class="input-group-btn">
                        <button class="btn btn-warning edges-circle" type="submit">
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="layer3" class="col-md-12"></div>
<div class="clearfix"></div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header visible-xs">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Adide</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php $categories = Category::model()->findAll(array('limit' => 8)); ?>
                <?php foreach($categories as $category){ ?>
                    <li><a href="<?php echo $this->createUrl('category/show',array('slug'=>$category->slug)); ?>"><?php echo $category->name ?></a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>