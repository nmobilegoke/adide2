<?php

class CategoryController extends FrontendController
{

    /**
     * Display products under particular category
     * @param $slug the slug presentation of the category
     */
    public function actionShow($slug)
    {
        $category = Category::model()->findByAttributes(array('slug'=>$slug));
        if($category === null) throw new CHttpException('Products category does not exist.',404);
        $this->pageTitle = "Addide | $category->name";
        $criteria = new CDbCriteria();
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        //sorting
        $sort = new CSort('Product');
        $sort->attributes = array('name');
        $sort->applyOrder($criteria);
        $products = $category->products;
        $this->render('/products/search',
            array(
                'results'=>$products,
                'query'=>$category->name,
                'pages'=>$pages,
                'sort'=> $sort
            )
        );
    }


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Category the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Category $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}