<?php

namespace CAFETERIA\CONTROLLERS;
use CAFETERIA\LIB\FrontController;
use CAFETERIA\MODELS\UserModel;

class UserController extends AbstractController
{
   

    //all users
    function allAction()
    {

       $this->data['users']=UserModel::getAll();

        $this->_view();

    }


    /////////////////////add & edit///////////////////

    function submit($x,$id=0)
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $room=$_POST['room'];
            $ext=$_POST['e'];
            $imgUrl="";

            if($_FILES['imgUrl']['name'])
            {
                
                $file_name = $_FILES['imgUrl']['name'];
                $file_tmp =$_FILES['imgUrl']['tmp_name'];
                $file_ext=explode('.',$file_name);
                $file_ext=strtolower(end($file_ext));
                $ext= array("jpeg","jpg","png");
                if(in_array($file_ext,$ext)){
                  $imgUrl=$file_name;
                   
                 move_uploaded_file($file_tmp,APP_PATH.DS."images".DS.$imgUrl);
             
                 }

            }

            $user;
            if($x=='add'){
            $user=new UserModel();
            $user->name=$name;
            $user->password=$password;
            $user->email=$email;
            $user->room=$room;
            $user->ext=$ext;
            $user->imgUrl=$imgUrl;
            }else
            {
                 $user=UserModel::getByKey($id)[0];
                 $user->name=$name;
                 $user->email=$email;
                 $user->room=$room;
                 $user->ext=$ext;
                 $user->password=$password;
                

            }

             if($user->save())
             {

                header("location: /user/all");
                exit;


             }
            }
    }

    function addAction()
    {
       
        $this->submit('add');
        

        $this->_view();

    }



    ///////////////////////edit//////////


    function editAction()
    {
        $id=filter_var($this->params[0],FILTER_SANITIZE_NUMBER_INT);
        $data=UserModel::getByKey($id);
        $this->data['user']=$data;

        $this->submit('edit',$id);

        $this->_view();

    }


    ////////////delete//////////////////////////


    function deleteAction()
    {
        $id=filter_var($this->params[0],FILTER_SANITIZE_NUMBER_INT);

       $data=UserModel::getByKey($id)[0];
       if($data)
       {
           if($data->delete())
           {
            header("location: /user/all");
            exit;

           }
         
       }


    }
    


}



?>