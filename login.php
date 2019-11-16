<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-8">
            <h3 class="text-center">Welcome back!</h3>
        <form id="loginF" style="border: 1px solid black; padding: 20px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <center>
            <button type="submit" id="loginB" class="btn btn-success">Login</button>
            <br /><br />
            <p class="text-align">Not a user yet? <a href="register.php">Become one of us</a></p>
        </center>
        </form>
        </div>
        <div class="col">
            
        </div>
    </div>

    <script>
    $(document).ready(() => {
        $('#loginB').click((e) => {
            e.preventDefault();

            $.ajax
            ({
                type: 'POST',
                url: 'loginState.php',
                data: $('#loginF').serialize(),
                success: function (response) {
                    // alert(response);
                    window.location.href = "index.php";
                }
            });
        });
    });
</script>
</div>

<?php include 'footer.php'; ?>