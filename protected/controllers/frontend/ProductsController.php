<?php

class ProductsController extends FrontendController
{
	public function actionIndex()
	{
        $products = Product::model()->findAll();
        //$online_products = Product::model()->findAllByAttributtes(array('is_online'=>true));
        //$pending_products = Product::model()->findAllByAttributtes(array('is_online'=>false));
        $this->render('index', array('products'=>$products));
	}
    public function actionShow($slug)
    {
        $product = $this->loadSlugModel($slug);
        $promo = null;
        if(isset($_GET['promo'])) $promo = Promo::model()->findByPk($_GET['promo']);
        $this->pageTitle = "Addide | $product->name";
        $this->render('show',array('product'=>$product, 'promo'=>$promo));
    }
    public function actionSearch()
    {
        $query = $_GET['term'];
        if($query == null or $query == '')
        {
            $results = array();
        }
        else
        {
            $words = explode(" ", $query);
            $criteria = new CDbCriteria();
            foreach($words as $word)
            {
                $match = addcslashes($word, '%_'); // escape LIKE's special characters
                $criteria->addCondition("name LIKE '%$word%' OR short_description LIKE '%$word%' OR long_description LIKE '%$word%'");
            }
//            $criteria = new CDbCriteria( array(
//                'condition' => "name LIKE :query OR short_description LIKE :query OR long_description LIKE :query",
//                'params'    => array(':query' => "%$match%")  // Aha! Wildcards go here
//            ) );
            $count = Product::model()->count($criteria);
            $pages = new CPagination($count);
            $pages->pageSize = 12;
            $pages->applyLimit($criteria);
            $results = Product::model()->findAll( $criteria );
        }
        $this->render('search', array('results'=>$results, 'query'=>$query, 'pages'=>$pages));
    }
    public function promos()
    {

    }
    protected function loadModel($id)
    {
        $model=Product::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    protected function loadSlugModel($slug)
    {
        $model=Product::model()->findByAttributes(array('slug'=>$slug));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}