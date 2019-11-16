<?php
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
        <?php
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>


<?php include 'footer.php'; ?>