<?php
//$yii=dirname(__FILE__).'/../yii-1-framework/framework/yii.php';
$yii=dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/frontend.php';

// Remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

//autoload third party library
$vendor_autoload=dirname(__FILE__).'/protected/vendor/autoload.php';
require_once($vendor_autoload);

require_once($yii);
Yii::createWebApplication($config)->runEnd('frontend');

//log stuff
function dg($what){
    echo Yii::trace(CVarDumper::dumpAsString($what),'vardump');
}