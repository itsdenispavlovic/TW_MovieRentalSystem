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

// MOVIE ID
$mid = $_GET['mid'];

// Fetch all the data needed
try
{
    $statement = $conn->prepare("SELECT * FROM movies WHERE id=:mid");
    $statement->bindParam(':mid', $mid, PDO::PARAM_INT);
    $statement->execute();

    if($statement->rowCount())
    {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        // Here are the datas
        $movieTitle = $row['title'];
        $movieContent = $row['content'];
        $moviePrice = $row['price'];
    }
} catch(PDOException $e)
{
    echo $e->getMessage();
}
?>


<h1 class="text-center">Edit <?php echo $movieTitle; ?></h1>
<hr>
<div class="row">
<div class="col"></div>
<div class="col">
<form id="editMovie">
<input type="text" hidden name="mid" value="<?php echo $mid; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Movie Title</label>
    <input type="text" name="title" class="form-control"  aria-describedby="emailHelp" placeholder="Enter title" value="<?php echo $movieTitle; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="content" placeholder="Enter content" id="exampleFormControlTextarea1" rows="3"><?php echo $movieContent; ?></textarea>
  </div>
  <div class="form-group">
  <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="price" placeholder="Enter price" value="<?php echo $moviePrice; ?>">
      </div>
  </div>
  <center><button type="submit" class="btn btn-success">Edit</button></center>
</form>
</div>
<div class="col"></div>
</div>
<script>
$(document).ready(() => {
    $('#editMovie').submit((e) => {
        e.preventDefault();
        $.ajax
            ({
                type: 'POST',
                url: 'editEvent.php',
                data: $('#editMovie').serialize(),
                success: function (response) {
                    alert(response);

                }
            });
    });
});
</script>
<?php include 'footer.php'; ?>