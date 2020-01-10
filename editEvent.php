<?php
include 'conn.php';
$mid = $_POST['mid'];
$title = $_POST['title'];
$content = $_POST['content'];
$price = $_POST['price'];

try {
    $editStatement = $conn->prepare("UPDATE movies SET title=:title, content=:content, price=:price WHERE id=:mid");
    $editStatement->execute(array(
        ':title' => $title,
        ':content' => $content,
        ':price' => $price,
        ':mid' => $mid
    ));

    echo "SUCCESS";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>