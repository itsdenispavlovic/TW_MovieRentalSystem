<?php include 'header.php'; ?>

<div class="container">
<div class="modal" id="createdAccount" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>You have successfully created your account, now you can login</p>
        <a href="login.php" class="btn btn-success">Login</a>
      </div>
    </div>
  </div>
</div>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-8">
            <h3 class="text-center">Register</h3>
        <form id="regForm" style="border: 1px solid black; padding: 20px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Fullname</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter fullname">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <center>
            <input type="submit" id="regB" value="Register" class="btn btn-success">
            <br /><br />
            <p class="text-align">Already a user? <a href="login.php">Login here!</a></p>
        </center>
        </form>
        </div>
        <div class="col">
            
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    $('#regB').click((e) => {
        e.preventDefault();

        $.ajax
        ({
            type: 'POST',
            url: 'regState.php',
            data: $('#regForm').serialize(),
            success: function (response) {
                // alert(response);
                if(response==1)
                {
                    // Show modal with successfully created account
                    $('#createdAccount').show('slow');
                    $('#regForm')[0].reset();
                }
            }
        });
    });
});
</script>

<?php include 'footer.php'; ?>