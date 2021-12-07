<?php 
    session_start();
    if(empty($_SESSION['email'])){
        header("location:login.php");
        exit();
    }

    include_once("assets/database.php");

    $email = $_SESSION['email'];

    $showQuery = "select * from users where email='$email'";
    $runQuery = mysqli_query($connect,$showQuery);

    $row = mysqli_fetch_assoc($runQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Profile</title>

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
            <h1>Profile Page</h1>
        </div>
        <div class="bottom-content"> 
            <figure>
                <img src="uploads/<?php echo $row['photo'] ?>" alt="profile image">
                <figcaption>Profile Photo</figcaption>
            </figure>
            <div class="content">
                <h1>Name: <?php echo $row['name'] ?></h1>
                <h3>Gender: <?php echo $row['gender'] ?></h3>
                <h4>Phone: <?php echo $row['phone'] ?></h4>
                <p style="margin-top:10px;"><strong>Feedback:</strong> 
                <?php echo $row['feedback'] ?>
                </p>
                <a style="margin-top: 10px;" href="assets/logout_core.php">Logout</a>
            </div>
        </div>
    </section>
    
</body>
</html>