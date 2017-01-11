<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="#">Nshopper</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $this->createUrl('category/show',array('slug'=>'phones-tablets')); ?>">Phones & Tablets <span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo $this->createUrl('category/show',array('slug'=>'computers-accessories')); ?>">Computers & Accessories</a></li>
                <li><a href="<?php echo $this->createUrl('category/show',array('slug'=>'smart-watches')); ?>">Smart Watches</a></li>
                <li><a href="<?php echo $this->createUrl('category/show',array('slug'=>'electronics')); ?>">Electronics</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-right" role="search" method="get" action="<?php echo $this->createUrl('products/search') ?>">
                    <div class="form-group">
                        <div class="search input-group" role="search">
                            <input type="text" class="form-control search-input" placeholder="search for product, category, brand" size="40" name="term"/>
                            <span class="input-group-btn">
                              <button class="btn btn-success" type="submit">
                                  <span class="glyphicon glyphicon-search"></span>
                                  <span class="sr-only">Search</span>
                              </button>
                            </span>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="visible-xs" style="margin-top: 50px"></div>
        <div id="logo-container" class="hidden-xs">
            <a href="<?php echo Yii::app()->request->baseUrl ?>">
                <img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png">
            </a>
        </div>
    </div>
</div>