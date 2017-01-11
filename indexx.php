<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1-framework/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//autoload third party library
$vendor_autoload=dirname(__FILE__).'/protected/vendor/autoload.php';
require_once($vendor_autoload);

require_once($yii);

Yii::createWebApplication($config)->run();


//log stuff
function dg($what){
    echo Yii::trace(CVarDumper::dumpAsString($what),'vardump');
}