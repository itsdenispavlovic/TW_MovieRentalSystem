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
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $statement = $conn->prepare("SELECT * FROM rentetMovies WHERE uid=:uid");
            $statement->bindParam(':uid', $_SESSION['user'], PDO::PARAM_INT);
            $statement->execute();

            $rows = $statement->fetchAll();

            if($statement->rowCount() > 0)
            {
                
            }
            else
            {
                // no records found!
            }
            ?>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>{{BUTTON}}</td>
            </tr>
            <tr>
                  <td><input type="checkbox" name=""></td>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
           
        </tbody>
    </table>
<?php include 'footer.php'; ?>