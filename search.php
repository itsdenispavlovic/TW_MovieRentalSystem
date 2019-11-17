<?php include 'header.php'; 
$movieSearch = 0;

// POST Event
if(isset($_POST))
{
    $movieSearch = $_POST['searchItem'];
    if($movieSearch == "")
    {
        $movieSearch = 0;
    }
}
?>

<?php
try
{
    $statement = $conn->prepare("SELECT * FROM movies WHERE title LIKE '%' :movieSearch '%' ");
    $statement->bindParam(':movieSearch', $movieSearch, PDO::PARAM_STR);
    $statement->execute();
    $grow = $statement->fetchAll();
    $n = $statement->rowCount();
        ?>
        <h1 class="text-center">Search results (<?php echo $n; ?>)</h1>
        <hr>
        <center>
        <form method="POST" action="search.php" class="form-inline my-2" style="left: 0; right: 0; margin: 0 auto; width: 300px">
            <input class="form-control mr-sm-2" type="search" name="searchItem" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" id="searchB" type="submit">Search</button>
        </form>
        </center>
        <div class="row">
        <!-- Foreach 3 per row -->
        <?php
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
                    <p class="card-text"><small class="text-muted"><?php echo $row['date_created']; ?></small></p>
                    </div>
                </div>
                </a>
            </div>
            <?php
        }
} catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<script>
$(document).ready(() => {
    $('#searchB').click((e) => {
        // validation if is empty
        //e.preventDefault();

        
    });
});
</script>

</div>
</div>
</div>


<?php include 'footer.php'; ?>