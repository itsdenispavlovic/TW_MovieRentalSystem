<?php
// UID
if(isset($_SESSION['user']))
{
    // User is logged in
    $uid = $_SESSION['user'];
}
else
{
    $uid = 0;
}
// Get id
if(isset($_GET['mid']))
{
    $movieID = $_GET['mid'];
}
else
{
    // Redirect to index
    header("Location: index.php");
}
include 'header.php';

try {
    $statement = $conn->prepare("SELECT * FROM movies WHERE id=:mid");
    $statement->bindParam(':mid', $movieID, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if($statement->rowCount() > 0)
    {
        ?>
        <div class="card">
            <img src="images/<?php echo $row['image']; ?>" style="left: 0; right: 0; margin: 0 auto; width: 200px; height: 300px;" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['title']; ?></h5>
            <p class="card-text"><?php echo $row['content']; ?></p>
            <p class="card-text"><small class="text-muted"><?php echo $row['date_created']; ?></small></p>
            </div>
        </div>
        <br>
        <div class="container">
        <div class="modal" id="rentError" tabindex="-1" role="dialog">
        <div class="modal-dialog"  role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>To rent the following movie "<?php echo $row['title']; ?>" you need to login.</p>
                <a href="#" class="btn btn-success">Login</a>
            </div>
            
            </div>
        </div>
        </div>
            <div class="row">
                <a href="#" id="rent" class="btn btn-info" title="sdadasd">Rent this movie</a>
            </div>
        </div>
       
        <?php
        //Fullname, username, email, password
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<script>
$(document).ready(() => {
    // Rent button click event
    $('#rent').click((event) => {
        event.preventDefault();

        var isLoggedin = <?php echo $uid ?>;
        if(isLoggedin == 0)
        {
            $('#rentError').modal('show');
        }
    });
});
</script>

<?php include 'footer.php'; ?>