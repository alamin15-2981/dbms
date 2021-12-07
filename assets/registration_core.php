<?php 

    include_once("database.php");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['phone']) && isset($_REQUEST['gender']) && isset($_FILES['doc']) && isset($_REQUEST['feedback'])){

            function validate($data){
                $data = htmlspecialchars($data);
                $data = ltrim($data);
                $data = stripslashes($data);
                return $data;
            }
    
    
            $fileName = uniqid().$_FILES['doc']['name'];
            $fileTmpName = $_FILES['doc']['tmp_name'];
            $fileType = $_FILES['doc']['type'];

            if($fileType == 'image/jpg' || $fileType == 'image/png' || $fileType == 'image/jpeg'){
                move_uploaded_file($fileTmpName,"../uploads/$fileName");
            }else {
                header("location:../index.php?another_file");
                exit();
            }
    
            $name = validate($_REQUEST['name']);
            $email = validate($_REQUEST['email']);
            $password = validate($_REQUEST['password']);
            $phone = validate($_REQUEST['phone']);
            $gender = validate($_REQUEST['gender']);
            $feedback = stripslashes(ltrim($_REQUEST['feedback']));
            $password = password_hash($password,PASSWORD_BCRYPT);
    
            $numLength = strlen($phone);
            if($numLength < 11){
                header("location:../index.php?too_short");
                exit();
            }
    
            $insertQuery = "insert into users(name,email,password,phone,gender,photo,feedback) values ('$name','$email','$password','$phone','$gender','$fileName','$feedback')";
    
            $runQuery = mysqli_query($connect,$insertQuery);
    
            if($runQuery){
                header("location:../index.php?registration_success");
            }else {
                header("location:../index.php?registration_failed");
            }

        }else {
            header("location:../index.php?empty_field");
        }

    }


?>