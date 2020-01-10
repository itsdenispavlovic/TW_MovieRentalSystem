<?php
include 'header.php';
if($user->isLoggedin() && $user->isAdmin($uid))
{
    // do nothing
}
else
{
    header('Location: index.php');
}

?>


<h1 class="text-center">Add another movie</h1>
<hr>
<div class="row">
<div class="col"></div>
<div class="col">
<form method="POST" action="testUploadImage.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Movie Title</label>
    <input type="text" name="title" class="form-control"  aria-describedby="emailHelp" placeholder="Enter title" value="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Movie Content</label>
    <textarea class="form-control" name="content" placeholder="Enter content" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="exampleFormControlFile1">
  </div>
  <div class="form-group">
  <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="price" placeholder="Enter price" value="">
      </div>
  </div>
  <center><button type="submit" class="btn btn-success">Add</button></center>
</form>
</div>
<div class="col"></div>
</div>

<?php include 'footer.php'; ?>