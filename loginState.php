<?php 
include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];


if($user->login($username, $password))
{
    echo 1;
}
else
{
    echo 2;
}
?>