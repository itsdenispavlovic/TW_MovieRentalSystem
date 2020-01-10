<?php include 'header.php'; ?>
<!-- Foreach 3 per row -->
<h1 class="text-center">Hottest movies</h1>
<hr>
<div class="row">
<?php
try
{
    $statement = $conn->prepare("SELECT * FROM movies");
    $statement->execute();
    $grow = $statement->fetchAll();
    if($statement->rowCount() > 0)
    {
        foreach($grow as $row)
        {
            ?>
            <div class="col-sm-4">
                <a href="movie.php?mid=<?php echo $row['id']; ?>" style="text-decoration: none; color: black">
                <div class="card" style="height: 600px;margin-bottom: 20px">
                    <img src="images/<?php echo $row['image']; ?>" style="left: 0; right: 0; margin: 0 auto; width: 200px; height: 300px;" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <h5>Price: $<?php echo $row['price']; ?></h5>
                    <p class="card-text"><small class="text-muted"><?php echo $row['date_created']; ?></small></p>
                    </div>
                </div>
                </a>
            </div>
            <?php
        }
    }
} catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

    

</div>
</div>
</div>


<?php include 'footer.php'; ?>