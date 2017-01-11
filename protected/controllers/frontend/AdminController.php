<?php

class AdminController extends Controller
{
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
	public function actionDashboard()
	{
		$this->render('dashboard');
	}
    public function actionIndex()
    {
        $this->render('dashboard');
    }
    public function actionCreate()
    {
        $this->render('dashboard');
    }
	public function actionLogin()
	{
        $model = new AdminLoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['AdminLoginForm']))
        {
            $model->attributes=$_POST['AdminLoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
            {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
        Yii::app()->user->logout();
        $this->redirect('admin/login');
	}
}