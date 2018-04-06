<?php

    $servername = "localhost";
    $username = "jleong8_jleong88";
    $password = "22331387";
    $dbname = "jleong8_missileAlert";
    
     try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
    }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

?>