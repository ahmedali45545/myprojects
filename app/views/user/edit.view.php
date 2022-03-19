

<?php
$user=$this->data['user'][0];

?>

<div class="container">
<form method="POST"  enctype="multipart/form-data">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="<?= $user->name;?>" aria-describedby="emailHelp">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="<?= $user->email;?>"  aria-describedby="emailHelp">
   
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="<?= $user->password;?>"  aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" value="<?= $user->password;?>" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="room" class="form-label">Room No</label>
    <input type="number" class="form-control" name="room" min="0" value="<?= $user->room;?>" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="e" class="form-label">Ext.</label>
    <input type="number" class="form-control" name="e" min="0" value="<?= $user->ext;?>" aria-describedby="emailHelp">
    
  </div>


  <div class="mb-3">
    <label for="imgUrl" class="form-label">Profile Picture</label>
    <input type="file" class="form-control" name="imgUrl" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
   
    <input type="submit" class="btn" name="update" value="Update" >
  
  </div>


</form>
</div>