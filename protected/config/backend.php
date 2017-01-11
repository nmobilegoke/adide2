<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'), array(
        'components' => array(
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    'backend/login' => 'backend/site/login',
                    'backend/<_c>' => '<_c>',
                    'backend/<_c>/<_a>' => '<_c>/<_a>',
                ),
            ),
            'user'=>array(
                'loginUrl'=>array('backend.php/site/login'),
                'allowAutoLogin'=>true,
            ),
        ),
        // autoloading model and component classes
        'import'=>array(
            'application.controllers.backend.*',
        )
    )
);