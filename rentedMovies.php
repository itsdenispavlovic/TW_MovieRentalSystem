<?php
    include 'conn.php';
    $movieID = $_POST['mid'];
    try
    {
        //'11/18/2019'
        $getDates = $conn->prepare("SELECT * FROM rentetMovies WHERE mid = :mid");
        $getDates->bindParam(':mid', $movieID, PDO::PARAM_INT);
        $getDates->execute();

        $datess = $getDates->fetchAll();

        $ocupate = array();

        foreach($datess as $gDates)
        {
            $ddd = date('m/d/Y', strtotime($gDates[start]));
            array_push($ocupate, $ddd);
            
        }
        print_r(json_encode($ocupate));
    } catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>