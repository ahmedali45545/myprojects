<?php

namespace CAFETERIA\CONTROLLERS;

use CAFETERIA\LIB\FrontController;
use CAFETERIA\MODELS\CategoryModel;
use CAFETERIA\MODELS\ProductModel;

class ProductsController extends AbstractController
{

    public function defaultAction()
    {
        $this->data['categories']=CategoryModel::getAll();
        $this->data['products']=ProductModel::getAll();
        $this->_view();
    }
    public function addAction()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {


            $name=$this->filterString($_POST['name']);
            $price=$this->filterFloat($_POST['price']);
            $catId=$this->filterInt((int)$_POST['catId']);
            if($_FILES['imgUrl'])
            {
                $imgName=$_FILES['imgUrl']['name'];
                $imgTmp=$_FILES['imgUrl']['tmp_name'];
                $imgExt=explode('.',$_FILES['imgUrl']['name']);
                $imgExt=end($imgExt);
                $imgExt=strtolower($imgExt);
                $extensions= array("jpeg","jpg","png");

                if(!in_array($imgExt[1],$extensions))
                {
                    $imgUrl=APP_PATH.DS.'images'.DS.$name.'.'.$imgName;
                }
                else
                {
                    $imgUrl='field';
                }

            }
            $product=new ProductModel();
            $product->name=$name;
            $product->price=$price;
            $product->catId=$catId;
            $product->imgUrl=$imgUrl;
            var_dump($product);
            if($product->save())
            {
                move_uploaded_file($imgTmp,$imgUrl);
                header('location:/products');
            }
        }
        $this->data['categories']=CategoryModel::getAll();
        $this->_view();
    }
    public function editAction()
    {
        $id=$this->filterInt($this->params[0]);
        ;
        if($id)
        {
            $product=ProductModel::getByKey((int)$id);
            if($product)
            {
                $this->data['categories']=CategoryModel::getAll();
                $this->data['product']=$product;
                $this->_view();
            }else
            {
                $this->setController(FrontController::NOT_FOUND_CONTROLLER);
                $this->_view();
            }
        }else
        {
            $this->setController(FrontController::NOT_FOUND_CONTROLLER);
            $this->_view();
        }

    }
    public function deleteAction()
    {
        $id=$this->filterInt($this->params[0]);
        if($id)
        {
            $product=ProductModel::getByKey($id);
            if($product)
            {
                $product->delete();
                header('location:/products');
            }
            else
            {
                $this->setController(FrontController::NOT_FOUND_CONTROLLER);
                $this->_view();
            }
        }
    }

}