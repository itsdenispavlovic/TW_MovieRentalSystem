<?php
include 'header.php';

?>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<style>
#example_length
{
    display: none !important;
}
.dataTables_filter
{
    float: right !important;
}
</style>
<script>
$(document).ready(function() {
    $('#example').DataTable(
        {
            "pageLength": 5,
            "responsive": true
        }
    );
} );
</script>
<h3 class="text-center">Rented Movies</h3>
<hr>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<?php
$statement = $conn->prepare("SELECT * FROM rentetMovies WHERE uid=:uid");
$statement->bindParam(':uid', $_SESSION['user'], PDO::PARAM_INT);
$statement->execute();

$rows = $statement->fetchAll();
?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titel</th>
                <th>From</th>
                <th>To</th>
                <th>Unique Code</th>
                <?php echo ($statement->rowCount() >= 3) ? "<th>You got 10% OFF discount</th>" : "<th>Price</th>"; ?>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if($statement->rowCount() > 0)
            {
                foreach($rows as $row)
                {
                    $Counter = $Counter+1;
                    ?>
                        <tr>
                            <td><?php echo $Counter; ?></td>
                            <td><?php echo $user->getMovieTitle($row['mid']); ?></td>
                            <td><?php echo $row['start']; ?></td>
                            <td><?php echo $row['end']; ?></td>
                            <td><?php echo $row['generatedCode']; ?></td>
                            <?php
                            if($statement->rowCount() >= 3){
                                echo "<td>$";
                                echo $user->getDiscount($row['mid']);
                                echo "</td>"; 
                            }
                            else
                            {
                                echo "<td>$";
                                echo $user->getPrice($row['mid']);
                                echo "</td>";
                            }
                            ?>
                            <td><a id="rentMo<?php echo $row['mid']; ?>" href="#" class="btn btn-danger" title="Remove">X</a></td>
                        </tr>

                        <script>
                        $('#rentMo<?php echo $row['mid']; ?>').click((e) => {
                            e.preventDefault();

                            //alert('Sorry for you...');
                            var data = 'mid=' + <?php echo $row['mid']; ?>;
                                $.ajax
                                ({
                                    type: 'POST',
                                    url: 'removeRentedMovies.php',
                                    data: data,
                                    success: function (response) {
                                        alert(response);

                                    }
                                });
                        });
                        </script>
                    <?php
                }
            }
            else
            {
                // no records found!
                // todo remove from header when the user is not logged in!
            }
            ?>
            
           
           
        </tbody>
    </table>
<?php include 'footer.php'; ?>