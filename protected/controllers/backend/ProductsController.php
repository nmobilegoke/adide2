<?php

class ProductsController extends BackendController
{
	public function actionCreate()
	{
        $model = new Product();
        if(isset($_POST['Product']))
        {
            $model->attributes=$_POST['Product'];
            if($model->save())
            {
                Yii::app()->user->setFlash('success', 'Product saved successfully!');
                $this->redirect(array('backend.php/products/images', 'id'=>$model->id));
            }
        }
		$this->render('create', array('model'=>$model));
	}

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
        $products = Product::model()->findAll($criteria);
        //$online_products = Product::model()->findAllByAttributtes(array('is_online'=>true));
        //$pending_products = Product::model()->findAllByAttributtes(array('is_online'=>false));

        $this->render('index',
            array(
                'products'=>$products,
                'pages'=>$pages,
                'sort'=> $sort
            )
        );
	}

	public function actionUpdate($id)
	{
        $model = $this->loadModel($id);
        if(isset($_POST['Product']))
        {
            $model->attributes=$_POST['Product'];
            if($model->save())
            {
                Yii::app()->user->setFlash('success', 'Product saved successfully!');
                $this->redirect(array('backend.php/products/images', 'id'=>$model->id));
            }
        }
		$this->render('update', array('model'=>$model));
	}
    public function actionShow($id)
    {
        $product = $this->loadModel($id);
        $this->render('show',array('product'=>$product));
    }
    public function actionImages($id)
    {
        $product =$this->loadModel($id);
        $this->render('images',array('product'=>$product));
    }
    public function actionClone($id)
    {
        $model = $this->loadModel($id);
        $clone = new Product();
        $clonedAttributes = $model->attributes;
        unset( $clonedAttributes['id'] ); //exclude id
        $clone->attributes = $clonedAttributes;
        if($clone->save())
        {
            Yii::app()->user->setFlash('success', 'Cloned successfully!');
            $this->redirect(array('backend.php/products/update', 'id'=>$clone->id));
        }
        $this->redirect(array('backend.php/products/create'));
    }
    public function actionUpload($id){
        $this->layout = false;
        header('Content-type: application/json');
        $response = ['error'=>'Unknown file format'];
        if(isset($_POST)){
            $model = $this->loadModel($id);
            if($model->images_count < 4)
            {
                $img = $_POST['image'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = '/uploads/products/'.$model->id.'_'.time().'.jpg';
                file_put_contents(Yii::getPathOfAlias('webroot').$file, $data);
                if($model->image_1 == null)
                {
                    //$model->image_1 = Yii::app()->request->hostInfo.'/'.Yii::app()->baseUrl.$file;
                    $model->image_1 = $file;
                    $url = Product::imageAbsoluteUrl($model->image_1);
                    $response = ['image_tag'=>'image_1', 'url'=>$url];
                }
                elseif($model->image_2 == null)
                {
                    $model->image_2 = $file;
                    $url = Product::imageAbsoluteUrl($model->image_2);
                    $response = ['image_tag'=>'image_2', 'url'=>$url];
                }
                elseif($model->image_3 == null)
                {
                    $model->image_3 = $file;
                    $url = Product::imageAbsoluteUrl($model->image_3);
                    $response = ['image_tag'=>'image_3', 'url'=>$url];
                }
                elseif($model->image_4 == null)
                {
                    $model->image_4 = $file;
                    $url = Product::imageAbsoluteUrl($model->image_4);
                    $response = ['image_tag'=>'image_4', 'url'=>$url];
                }
                $model->images_count++;
                $response['images_count'] = $model->images_count;
                $model->save();
            }
            else
            {
                $response = ['error'=>'Maximum file upload reached.'];
            }
        }
        echo CJSON::encode($response);
        Yii::app()->end();
    }
    public function actionRemoveImage()
    {
        if (Yii::app()->request->isAjaxRequest)
        {
            $id = $_GET['id'];
            $image_tag = $_GET['image_tag'];
            $product = $this->loadModel($id);
            switch ($image_tag)
            {
                case 'image_1':
                    unlink(Yii::getPathOfAlias('webroot').$product->image_1);
                    $product->image_1 = null;
                    break;
                case 'image_2':
                    unlink(Yii::getPathOfAlias('webroot').$product->image_2);
                    $product->image_2 = null;
                    break;
                case 'image_3':
                    unlink(Yii::getPathOfAlias('webroot').$product->image_3);
                    $product->image_3 = null;
                    break;
                case 'image_4':
                    unlink(Yii::getPathOfAlias('webroot').$product->image_4);
                    $product->image_4 = null;
                    break;
                default:
                    throw new CHttpException(404);
            }
            $product->images_count--;
            $product->save();
            $this->renderPartial('remove_image', array('count'=>$product->images_count));
        }
        else
        {
            throw new CHttpException(404);
        }
    }
    protected function loadModel($id)
    {
        $model=Product::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionSearch()
    {
        $query = $_GET['q'];
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
                //$match = addcslashes($word, '%_'); // escape LIKE's special characters
                $criteria->addCondition("name LIKE '%$word%'");
            }
//            $criteria = new CDbCriteria( array(
//                'condition' => "name LIKE :query OR short_description LIKE :query OR long_description LIKE :query",
//                'params'    => array(':query' => "%$match%")  // Aha! Wildcards go here
//            ) );
            $results = Product::model()->findAll( $criteria );
        }
        $this->renderJSON($results);
    }
}