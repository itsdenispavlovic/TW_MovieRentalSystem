<?php

// O sa scriu pas cu pas ce fac

// Includ conexiune cu baza de date
include 'conn.php';

if(isset($_SESSION['user']))
{
    $uid = $_SESSION['user'];
}


$target_dir = "images//";

if(!is_dir($target_dir))
{
    // daca nu exista, se creeaza
    mkdir($target_dir, 0755, true);
}

$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if($check !== false)
    {
        //echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if(file_exists($target_file))
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if($_FILES['fileToUpload']['size'] > 50000000)
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOK is set to 0 by an erro
if($uploadOk == 0)
{
    echo "Sorry, your file was not uploaded.";
}
else
{
    // If everything is ok, try to upload file
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
    {

        $movieImage = basename($_FILES['fileToUpload']['name']);

        $insertStatement = $conn->prepare("INSERT INTO movies(title, image, content, price) VALUES(:title, :image, :content, :price)");
        $insertStatement->execute(array(
            ':title' => $_POST['title'],
            ':image' => $movieImage,
            ':content' => $_POST['content'],
            ':price' => $_POST['price']
        ));

        echo 'INSERTED';
        header('Location: addmovie.php');
    }
    else
    {
        echo "Sorry, there was an erro uploading your file!";
    }
}
?>