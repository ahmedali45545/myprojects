<?php

namespace CAFETERIA\MODELS;

class UserModel extends Model 
{

    public  $name;
    public  $email;
    public  $room;
    public  $ext;
    public  $password;
    public  $imgUrl;
    public $id;


    protected static $tableName='user';
    protected static $primaryKey='id';
    protected static $tableSchema=
        [
             'name' =>self::DATA_TYPE_STR,
             'email'  => self::DATA_TYPE_STR,
             'room' =>self::DATA_TYPE_INT,
              'ext' =>self::DATA_TYPE_INT,
             'password' =>self::DATA_TYPE_STR,
             'imgUrl' =>self::DATA_TYPE_STR

        ];

}

?>