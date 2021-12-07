<?php 
    session_start();
    $empty_field = $registration_success = $too_short = $another_file = $registration_failed = $data_empty = '';

    if(isset($_REQUEST['empty_field'])){ 
        $empty_field = "You cannot leave any field empty !!!";
    }if(isset($_REQUEST['registration_success'])){
        $registration_success = "Registration Success !!!";
    }if(isset($_REQUEST['too_short'])){
        $too_short = "Phone number is too short !!!";
    }if(isset($_REQUEST['another_file'])){
        $another_file = "You can not upload others file !!!";
    }if(isset($_REQUEST['registration_failed'])){
        $registration_failed = "Registration Failed !!!";
    }if(isset($_REQUEST['data_empty'])){
        $data_empty = "Empty Table !!!";
    }if(isset($_SESSION['email'])){
        header("location:profile.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Registration</title>

    <!-- Favicon --> 
    <link rel="shortcut icon" href="images/meta-logo-24.png" type="image/x-icon">

    <!-- Seo Tag --> 
    <meta name="author" content="Md Shovon">
    <meta name="keywords" content="Html,Css,Bootstrap,Php,Mysql">
    <meta name="description" content="This is a simple login registration website">

    <!-- Css --> 
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>



    <section id="container">
        <div class="top-content">
            <h1>Registration Form</h1>
            <p style="color: red;">
                <?php
                    if(!empty($empty_field)) echo $empty_field;
                    if(!empty($too_short)) echo $too_short;
                    if(!empty($another_file)) echo $another_file;
                    if(!empty($registration_failed)) echo $registration_failed;
                    if(!empty($data_empty)) echo $data_empty;
                ?>
            </p>
            <p style="color: green;">
                <?php 
                    if(!empty($registration_success)) echo $registration_success;
                ?>
            </p>
        </div>
        <div class="bottom-content"> 
            <form action="assets/registration_core.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="form"> 
                <p>Name</p>
                <input type="text" name="name" maxlength="12"> <br><br>

                <p>Email</p>
                <input type="email" name="email"> <br><br>

                <p>Password</p>
                <input type="password" name="password" pattern="[A-Za-z0-9]{6,12}"> <br><br>

                <p>Phone</p>
                <input type="number" name="phone"> <br><br>

                <p id="gender">Gender</p>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Others"> Others <br><br>

                <p>Photo</p>
                <input type="file" name="doc"> <br><br>
                
                <p>Feedback</p>
                <textarea name="feedback" cols="40" rows="6"></textarea> <br><br>
                
                <input type="submit" name="btn" value="Submit">
                <input type="reset" name="btn2" value="Clear"> <br><br>

                <p class="last-text">If you are already registered, then you can go now login page &nbsp;
                    <a href="login.php">Login</a> 
                        &nbsp;
                    <a href="showData.php">Dbms</a>
                </p>
            </form>
        </div>
    </section>
    
</body>
</html>