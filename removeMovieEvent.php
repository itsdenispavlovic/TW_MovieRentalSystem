<?php 
include 'conn.php';
$mid = $_POST['mid'];


// verificam daca exista filmul
$selectMovie = $conn->prepare("SELECT * FROM movies WHERE id=:mid");
$selectMovie->bindParam(':mid', $mid, PDO::PARAM_INT);
$selectMovie->execute();

if($selectMovie->rowCount() > 0)
{
    // if exist then we can remove it
    $removeMovie = $conn->prepare("DELETE FROM movies WHERE id=:mid");
    $removeMovie->bindParam(':mid', $mid, PDO::PARAM_INT);
    $removeMovie->execute();
    echo "Movie removed";
}
?>