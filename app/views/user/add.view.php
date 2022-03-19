
<div class="container mt-5">
  <div class="row">
  <div class="col mb-2">
  <h1>Add New User</h1>
  </div>
  </div>

<form method="POST" enctype="multipart/form-data">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
   
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="room" class="form-label">Room No</label>
    <input type="number" class="form-control" name="room" min="0" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="ext" class="form-label">Ext.</label>
    <input type="number" class="form-control" name="e" min="0" aria-describedby="emailHelp">
    
  </div>


  <div class="mb-3">
    <label for="imgUrl" class="form-label">Profile Picture</label>
    <input type="file" class="form-control" name="imgUrl" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <input type="submit" class="btn btn-success" type="button" name="add" value="Add" >
  </div>

</form>

</div>

