<?php 
    session_start();
    include_once("database.php");


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];

            $showQuery = "select * from users where email='$email'";
            $runQuery = mysqli_query($connect,$showQuery);
            $count = mysqli_num_rows($runQuery);

            if($count == 0){
                header("location:../login.php?wrong_email");
            }else{
                $row = mysqli_fetch_assoc($runQuery);
                $oldPwd = $row['password'];
                $email = $row['email'];
                if(password_verify($password,$oldPwd)){
                    $_SESSION['email'] = $email;
                    header("location:../profile.php");
                }else{
                    header("location:../login.php?wrong_password");
                }
            }
            
        }
    }

?>