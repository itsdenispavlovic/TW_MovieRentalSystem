<?php include 'conn.php'; 
if(isset($_SESSION['user']))
{
    $uid = $_SESSION['user'];
}
else
{
    $uid = 0;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Movie Rental System</title>
    <style>
    .dropdown-menu
    {
        position: absolute !important;
        right: 200px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"><?php echo ($user->isLoggedin()) ? $user->getUsername($uid) : "Guest"; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"><?php echo ($user->isLoggedin() && $user->isAdmin($uid)) ? "ADMIN" : ""; ?></a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="index.php">Movie Rental System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                <?php if($user->isLoggedin()){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="moviesRented.php">Movies Rented</a>
                </li>
                <?php if($user->isLoggedin() && $user->isAdmin($uid)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ($user->isLoggedin() && $user->isAdmin($uid)) ? "addmovie.php" : ""; ?>"><?php echo ($user->isLoggedin() && $user->isAdmin($uid)) ? "All Movies" : ""; ?></a>
                </li>
                <?php } ?>
                <?php } ?>
                <li class="nav-item">
                <?php echo (!$user->isLoggedin()) ? "<a class='nav-link' href='login.php' >Login</a>" : "<a class='nav-link' href='logout.php' >Logout</a>"; ?>
                </li>
            </ul>
        </div>
    </nav>
    <br>