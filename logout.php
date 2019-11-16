<?php
include 'conn.php';

if($user->logout($_SESSION['user']))
{
    header('Location: index.php');
}
?>