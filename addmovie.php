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
<div class="container-fluid">


<!-- END MODAL -->
<h1 class="text-center">All movies</h1>
<hr>
&nbsp;<a href="addAnotherMovie.php" class="btn btn-success">Add another movie</a>
    <!-- TABLE OF CONTENTS -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
            <tr>
                <th>#</th>
                <th>Movie Title</th>
                <th>Image</th>
                <th>Content</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                try 
                {
                    $statement = $conn->prepare("SELECT * FROM movies ORDER BY id");
                    $statement->execute();

                    $rows = $statement->fetchAll();
                    $counter = 1;
                    foreach($rows as $row)
                    {   
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="removeMovie<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="exampleModalLabel">WARNING</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Are you sure you want to remove this movie?</p>
                                <a id="yes<?php echo $row['id']; ?>" href="" class="btn btn-danger">Yes</a> | <a href="" data-dismiss="modal" class="btn btn-success">NO</a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- MODAL -->
                        <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><img src="images/<?php echo $row['image']; ?>" width="100px" alt=""></td>
                        <td><?php echo $row['content']; ?></td>
                        <td>$<?php echo $row['price']; ?></td>
                        <td><a href="editmovie.php?mid=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a><a href="" id="removeBB<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
                        </tr>
                        <script>
                        $('#removeBB<?php echo $row["id"]; ?>').click((e) => {
                            e.preventDefault();

                            $('#removeMovie<?php echo $row['id']; ?>').modal('show');

                            $('#yes<?php echo $row['id']?>').click((e) => {
                                e.preventDefault();

                                //alert('Sorry for you...');
                                var data = 'mid=' + <?php echo $row['id']; ?>;
                                $.ajax
                                ({
                                    type: 'POST',
                                    url: 'removeMovieEvent.php',
                                    data: data,
                                    success: function (response) {
                                        alert(response);

                                    }
                                });
                            });
                        });
                        </script>
                        <?php
                    }
                } catch(PDOException $e)
                {
                    echo $e->getMessage();
                }

            ?>
        </tbody>
        </table>
</div>

<?php include 'footer.php'; ?>