<?php

class CategoriesController extends BackendController
{
    public function actionIndex()
    {
        $categories = Category::model()->findAll();
        $this->render('index', array('categories'=>$categories));
    }
	public function actionCreate()
	{
        $model = new Category();
        if(isset($_POST['Category']))
        {
            $model->attributes=$_POST['Category'];
            if($model->save())
            {
                Yii::app()->user->setFlash('success', 'Category saved successfully!');
            }
        }
        $this->redirect(array('backend/categories/index'));
	}
	public function actionUpdate($id)
	{
        $model=$this->loadModel($id);

        if(isset($_POST['Category']))
        {
            $model->attributes=$_POST['Category'];
            if($model->save()) {
                Yii::app()->user->setFlash('success', 'Saved successfully!');
            }
        }
        Yii::app()->user->setFlash('error', 'Error! could not save category.');
        $this->redirect(array('backend/categories/index'));
	}
    public function actionProducts($id)
    {
        $category = $this->loadModel($id);
        if($category == null) throw new HttpException('Category does not exist.', 404);
        $products = $category->products;
        return $this->render('/products/index', array('products'=>$products));
    }
    protected function loadModel($id)
    {
        $model=Category::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}