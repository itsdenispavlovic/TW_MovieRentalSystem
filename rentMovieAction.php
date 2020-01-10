<?php
include 'conn.php';

$uid = $_POST['uid'];
$mid = $_POST['mid'];

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$Sdate=date('Y-m-d',strtotime($startDate));
$Edate=date('Y-m-d',strtotime($endDate));
function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 15) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

}
$generatedCode = createRandomPassword();
try {
    // Add only unique code
    $verify = $conn->prepare("SELECT generatedCode FROM rentetMovies WHERE generatedCode=:generatedCode");
    $verify->bindParam(':generatedCode', $generatedCode, PDO::PARAM_STR);
    $verify->execute();
    if($verify->rowCount() > 0)
    {
        $generatedCode = createRandomPassword();
    }
    else
    {
        // verify daca sunt acelea
        $verifyMovie = $conn->prepare("SELECT * FROM rentetMovies WHERE uid=:uid AND mid=:mid");
        $verifyMovie->execute(array(
            ':uid' => $uid,
            ':mid' => $mid
        ));

        if($verifyMovie->rowCount() > 0)
        {
            // TODO
            // the movie has been already rented, don't add one more time!
            return false;
        }
        else
        {
            $statement = $conn->prepare("INSERT INTO rentetMovies(uid, mid, generatedCode, start, end) VALUES(:uid, :mid, :generatedCode, :start, :end)");
            $statement->execute(array(
                ':uid' => $uid,
                ':mid' => $mid,
                ':generatedCode' => $generatedCode,
                ':start' => $Sdate,
                ':end' => $Edate
            ));
            echo "Success!";
        }
        
    }
} catch (PDOException $e) {
    $e->getMessage();
}

?>