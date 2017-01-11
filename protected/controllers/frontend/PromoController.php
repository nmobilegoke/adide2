<?php

class PromoController extends CController
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
        $products = array();
        foreach($promo->productPromos as $pp)
        {
            $products[] = $pp->product;
        }
        $criteria = new CDbCriteria();
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        //$pages->route='backend.php/products/index';
        //sorting
        $sort = new CSort('Product');
        $sort->attributes = array('name');
        $sort->applyOrder($criteria);
        $this->render('view',
            array(
                'results'=>$products,
                'pages'=>$pages,
                'sort'=> $sort,
                'promo'=>$promo
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
            $message = 'Product added successfully.';
        }
        else
        {
            $message = 'Error! could not add product.';
        }
        $this->render('add_product', array('message'=>$message));
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
