<?php 
    session_start();

    if(isset($_SESSION['email'])){
        session_unset();
        header("location:../login.php?logout");
    }else {
        header("location:../login.php");
    }

?>