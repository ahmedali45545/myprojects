<?php

namespace CAFETERIA\MODELS;

class OrderDetailsModel extends  Model
{
    public $quantity;
    public $productId;
    public $orderId;

    protected static $tableName='orderdetails';
    protected static $primaryKey='id';
    protected static $tableSchema=[
        "quantity"   =>self::DATA_TYPE_INT,
        "productId"  =>self::DATA_TYPE_INT,
        "orderId"    =>self::DATA_TYPE_INT
    ];
}