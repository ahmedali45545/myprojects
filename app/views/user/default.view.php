<?php

//print_r($this->data['users']);

?>


<div class="container mt-5">

   <h1>Users</h1>
<div class="row">
  <div class="col offset-8 mb-3">
  <a href="./add" class="btn btn-success px-5">Add</a>
  </div>
</div>
 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Room</th>
      <th scope="col">Img</th>
      <th scope="col">Ext</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 <?php  foreach($this->data['users'] as $user) {?>
    <tr>
      <td><?=$user->name?></td>
      <td><?=$user->room?></td>
      <td>
      <?=APP_PATH.DS.'images'.DS.$user->imgUrl;?>
       <img src="<?=APP_PATH.DS.'images'.DS.$user->imgUrl;?>" height="30px"/>
        </td>
      <td><?=$user->ext?></td>
       <td>
           <a href="./edit/<?= $user->id;?>" type="button" class="btn btn-primary mx-2" >Edit</a>
           <a href= "./delete/<?= $user->id;?>"  type="button" class="btn btn-danger" >Delete</a>
       </td>
    </tr>

    <?php } ?>
   
  </tbody>
</table>

</div>

