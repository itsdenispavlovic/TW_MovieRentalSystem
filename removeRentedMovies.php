<?php 
include 'conn.php';
$mid = $_POST['mid'];
$uid = $_SESSION['user'];

// verificam daca exista filmul
$selectMovie = $conn->prepare("SELECT * FROM rentetMovies WHERE mid=:mid AND uid=:uid");
$selectMovie->bindParam(':uid', $uid, PDO::PARAM_INT);
$selectMovie->bindParam(':mid', $mid, PDO::PARAM_INT);
$selectMovie->execute();

if($selectMovie->rowCount() > 0)
{
    // if exist then we can remove it
    $removeMovie = $conn->prepare("DELETE FROM rentetMovies WHERE mid=:mid AND uid=:uid");
    $removeMovie->bindParam(':uid', $uid, PDO::PARAM_INT);
    $removeMovie->bindParam(':mid', $mid, PDO::PARAM_INT);
    $removeMovie->execute();
    echo "Removed";
}
?>