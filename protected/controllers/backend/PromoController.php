<?php

class PromoController extends BackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $promo = $this->loadModel($id);
        $preData = array();
        foreach($promo->productPromos as $pp)
        {
            $productData = array();
            $productData['id'] = $pp->product->id;
            $productData['name'] = $pp->product->name;
            $preData[] = $productData;
        }
		$this->render('view',array(
			'model'=>$promo,
            'preData'=>CJSON::encode($preData)
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Promo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];
			if($model->save())
                $this->redirect($this->viewPath($model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];
			if($model->save())
				$this->redirect($this->viewPath($model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria = new CDbCriteria();
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        $pages->route='backend.php/products/index';
        //sorting
        $sort = new CSort('Product');
        $sort->attributes = array('name');
        $sort->applyOrder($criteria);
        $promos = Promo::model()->findAll($criteria);
        $this->render('index',
            array(
                'promos'=>$promos,
                'pages'=>$pages,
                'sort'=> $sort
            )
        );
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Promo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Promo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Promo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='promo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function viewPath($id)
    {
        return array('backend.php/promo/view','id'=>$id);
    }
    public function updatePath($id)
    {
        return array('backend.php/update','id'=>$id);
    }
    public function actionAddProduct()
    {
        $this->layout = false;
        if(isset($_GET['promo_id']) && isset($_POST['product_id']))
        {
            $promo = Promo::model()->findByPk($_GET['promo_id']);
            $product = Product::model()->findByPk($_POST['product_id']);
            $pp = new ProductPromo();
            $pp->product_id = $product->id;
            $pp->promo_id = $promo->id;
            $pp->save();
        }
    }
    public function actionRemoveProduct()
    {
        if(isset($_GET['promo_id']) && isset($_POST['product_id']))
        {
            $promo = Promo::model()->findByPk($_GET['promo_id']);
            $product = Product::model()->findByPk($_POST['product_id']);
            $pp = ProductPromo::model()->findByAttributes(array('product_id'=>$product->id, 'promo_id'=>$promo->id));
            if($pp != null) $pp->delete();
        }
    }
}
