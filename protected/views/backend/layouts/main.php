<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/override-bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/custom.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/nicedit.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/token-input-facebook.css" rel="stylesheet">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/backend/niceditor.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/backend/jquery.tokeninput.js"></script>
	<title><?php echo Yii::app()->name.' '. CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <?php $this->renderPartial('////shared/_header') ?>
    <div id="main-container">
        <?php echo $content ?>
    </div>
    <?php $this->renderPartial('////shared/_footer') ?>
    <script>
        // highlight active menu item
        $(".nav a").on("click", function(){
            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>
</body>
</html>
