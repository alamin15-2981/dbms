<?php 

    $host = "localhost";
    $dbUser = "Shovon";
    $dbPwd = "1213646441";
    $dbName = "dbms";

    $connect = mysqli_connect($host,$dbUser,$dbPwd,$dbName);

    if($connect == false){
        echo "<span style='color:red;'>Database connection Problem</span>";
    }


?>