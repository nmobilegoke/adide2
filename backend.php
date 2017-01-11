<?php
/**
 * Author: Adam Bilyamin
 * Date: 1/29/2016
 * Time: 3:00 PM
 */
//$yii=dirname(__FILE__).'/../yii-1-framework/framework/yii.php';
$yii=dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/backend.php';

// Remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
Yii::createWebApplication($config)->runEnd('backend');
//log stuff
function dg($what){
    echo Yii::trace(CVarDumper::dumpAsString($what),'vardump');
}