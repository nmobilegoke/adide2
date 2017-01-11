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
            <a class="navbar-brand visible-xs" href="#">Addide</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if($this->isAdmin()){ ?>
                    <li class="active"><a href="<?php echo Yii::app()->baseUrl ?>/backend.php">Dashboard <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo $this->createUrl('backend/categories/index') ?>">Categories</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Orders <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">New Orders</a></li>
                            <li><a href="#">Shipped Orders</a></li>
                            <li><a href="#">Delivered Orders</a></li>
                            <li><a href="#">Returned Orders</a></li>
                            <li><a href="#">Canceled Orders</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Transaction History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Listings <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->createUrl('backend/products/index') ?>">Live on Site</a></li>
                            <li><a href="<?php echo $this->createUrl('backend/products/index') ?>">Pending</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo $this->createUrl('backend/products/index') ?>">Sold Out</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $this->createUrl('backend/products/create') ?>" style="padding: 10px;background-color: orange;;height: 50px;font-weight: bold">
                            <span class="glyphicon glyphicon-plus-sign"></span> Add Product
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->createUrl('backend/promo/create') ?>">New Promo</a></li>
                            <li><a href="<?php echo $this->createUrl('backend/promo/index') ?>">List Promos</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if($this->isAdmin()){ ?>
                    <li><a href="#">Welcome <?php echo Yii::app()->user->name ?>!</a></li>
                    <li><a href="<?php echo $this->createUrl('backend.php/site/logout') ?>">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>