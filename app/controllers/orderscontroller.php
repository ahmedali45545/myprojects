<?php

namespace CAFETERIA\CONTROLLERS;

use CAFETERIA\MODELS\OrderDetailsModel;
use CAFETERIA\MODELS\OrdersModel;

class OrdersController extends AbstractController
{

    public function addAction()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $userId=$this->filterInt($_POST['user']);
            if($userId)
            {
                $totalPrice=$_SESSION['totalPrice'];
                $productsDetails=[];
                foreach ($_SESSION['shopping_cart'] as $item=>$value)
                {
                    $productsDetails[]=array($value['itemId'],$value['itemQuantity']);
                    $productsId[]=$value['itemId'];
                }
                $order=new OrdersModel();
                $order->userId=$userId;
                $order->totalPrice=$totalPrice;
                if($order->save())
                {
                    foreach ($productsDetails as $item)
                    {
                        $orderDetails=new OrderDetailsModel();
                        $orderDetails->orderId=$order->id;
                        $orderDetails->productId=$item[0];
                        $orderDetails->quantity=$item[1];
                        $orderDetails->save();
                    }
                }
                unset($_SESSION['shopping_cart']);
                header('location:/');

            }
        }
    }

}