<?php

namespace CAFETERIA\CONTROLLERS;

use CAFETERIA\MODELS\CategoryModel;
use CAFETERIA\LIB\FrontController;

class CategoriesController extends AbstractController
{

    public function defaultAction()
    {
        $this->data['categories']=CategoryModel::getAll();
        $this->_view();
    }
    public function addAction()
    {

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $catName=$this->filterString($_POST['catName']);

            $cat=new CategoryModel();
            $cat->name=$catName;
            if($cat->save())
            {
                header('location:/categories');
            }

        }
        $this->_view();
    }
    public function editAction()
    {
        $id=$this->filterInt($this->params[0]);
        if($id)
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $catName=$this->filterString($_POST['catName']);
                $cat=CategoryModel::getByKey($id);
                if($cat)
                {
                    $cat->name=$catName;
                    if($cat->save())
                    {
                        header("location:/categories");
                        exit();
                    }
                }
            }
            $cat=CategoryModel::getByKey($id);
            if($cat)
            {
                $this->data['cat']=$cat;
                $this->_view();
            }
            else {
                $this->setController(FrontController::NOT_FOUND_CONTROLLER);
                $this->_view();
            }
        }
    }
    public function deleteAction()
    {
        $id=$this->filterInt($this->params[0]);
        if($id)
        {
            $cat=CategoryModel::getByKey($id);
            if($cat)
            {
                $cat->delete();
                header('location:/categories');
            }
            else
            {
                $this->setController(FrontController::NOT_FOUND_CONTROLLER);
                $this->_view();
            }
        }
    }

}