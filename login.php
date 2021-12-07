<?php 
    session_start();
    $wrong_email = $wrong_password = $logout = '';

    if(isset($_REQUEST['wrong_email'])){ 
        $wrong_email = "You have submitted wrong gmail !!!";
    }if(isset($_REQUEST['wrong_password'])){
        $wrong_password = "You have submitted wrong password !!!";
    }if(isset($_SESSION['email'])){
        header("location:profile.php");
    }if(isset($_REQUEST['logout'])){
        $logout = "Logout Successfully !!!";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Login</title>

    <!-- Favicon --> 
    <link rel="shortcut icon" href="images/meta-logo-24.png" type="image/x-icon">

    <!-- Seo Tag --> 
    <meta name="author" content="Md Shovon">
    <meta name="keywords" content="Html,Css,Php,Mysql">
    <meta name="description" content="This is a simple login registration website">

    <!-- Css --> 
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>



    <section id="container">
        <div class="top-content">
            <h1>Login Form</h1>
            <p style="color: red;">
                <?php
                    if(!empty($wrong_email)) echo $wrong_email;
                    if(!empty($wrong_password)) echo $wrong_password;
                ?>
            </p>
            <p style="color: green;">
                <?php
                    if(!empty($logout)) echo $logout;
                ?>
            </p>
        </div>
        <div class="bottom-content"> 
            <form action="assets/login_core.php" method="POST" autocomplete="off" class="form"> 

                <p>Email</p>
                <input type="email" name="email" required> <br><br>

                <p>Password</p>
                <input type="password" name="password" pattern="[A-Za-z0-9]{6,12}" required> <br><br>
                
                <input type="submit" name="btn" value="Submit">
                <input type="reset" name="btn2" value="Clear"> <br><br>

                <p class="last-text">If you are not registered, then you can go now Registration page <a href="index.php">Registration</a></p>
            </form>
        </div>
    </section>
    
</body>
</html>