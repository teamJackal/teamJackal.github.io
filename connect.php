<?php

    $servername = "mysqldb.cilyvfny7hgw.us-east-2.rds.amazonaws.com";
    $username = "herm8888";
    $password = "23320144";
    $dbname = "414jackal";
    
     try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
    }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

?>
