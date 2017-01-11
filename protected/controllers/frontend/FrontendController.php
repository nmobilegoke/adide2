<?php
/**
 * This file is part of nshopper project
 * Author: Adam Bilyamin
 * Date: 2/8/2016
 * Time: 8:50 AM
 */

class FrontendController extends CController
{
    public $layout='main';
    public $menu=array();
    public $breadcrumbs=array();

//    public function filters()
//    {
//        return array(
//            'accessControl',
//        );
//    }
//
//    public function accessRules()
//    {
//        return array(
//            array('allow',
//                'users'=>array('*'),
//                'actions'=>array('login'),
//            ),
//            array('allow',
//                'users'=>array('@'),
//            ),
//            array('deny',
//                'users'=>array('*'),
//            ),
//        );
//    }
}