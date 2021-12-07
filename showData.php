<?php 
    session_start();
    include_once("assets/database.php"); 
    $showQuery = "select * from users";
    $runQuery = mysqli_query($connect,$showQuery);

    $data = mysqli_num_rows($runQuery);
    if($data == 0) {
        header("location:index.php?data_empty");
    }if(isset($_SESSION['email'])){
        header("location:profile.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- title -->
    <title>Show Data</title>

    <!-- Favicon --> 
    <link rel="shortcut icon" href="images/meta-logo-24.png" type="image/x-icon">
  </head>
  <body>

  
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-borderless table-hover table-striped">
                    <thead class="bg-info">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Passsword</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Photo</th>
                            <th>Feedback</th>
                            <th>LocalTimeDate</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                           if($data > 0){
                                while($row = mysqli_fetch_assoc($runQuery)){ ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['photo'] ?></td>
                                        <td><?php echo $row['feedback'] ?></td>
                                        <td><?php echo $row['localTimeDate'] ?></td>
                                    </tr>
                            <?php } 

                           }
                        
                        ?>
                    </tbody>
                </table>
                <a href="index.php">Home</a>
            </div>
            </div>
        </div>
    </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

    



















 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>