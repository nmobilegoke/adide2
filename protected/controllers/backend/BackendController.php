<?php
/**
 * This file is part of nshopper project
 * Author: Adam Bilyamin
 * Date: 2/8/2016
 * Time: 8:50 AM
 */

class BackendController extends CController
{
    public $layout='main';
    public $menu=array();
    public $breadcrumbs=array();


    public function isAdmin()
    {
        return Yii::app()->user->getState('role') === "admin";
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // non-authenticated users can access login action only
                'actions'=>array('login'),
                'users'=>array('?'),
            ),
            array('allow', // allow authenticated users
                'expression'=>'Yii::app()->user->getState("role") === "admin"',
            ),
            array('deny',  // deny all users
                'users'=>array('?'),
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        Yii::app()->end();
    }
}