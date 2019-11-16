<?php 
include 'conn.php';

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


if($user->createAccount($fullname, $username, $email, $password))
{
    echo 1;
}
else
{
    echo 2;
}
?>