<?php

    session_start();


    if(isset($_SESSION['loggedIn'])){
        $_SESSION['error_message']= "Already Logged In";
        header('Location: ./admin/dashboard.php');
        exit;
    }

    $error = '';
    $success = '';

    if(isset($_SESSION['error_message'])){
        $error = $_SESSION['error_message'];
        unset($_SESSION['error_message']);

    }
    if(isset($_SESSION['success_message'])){
      $success = $_SESSION['success_message'];
      unset($_SESSION['success_message']);
    }
    
?>
  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
   
    <h2 class="text-center">LOGIN</h2>
    <div class="container">

        <div class="row">
     
            <form action="./function/login.php" method="post">
                
                <div class="col-md-6">
                    <?php if($success != ''){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php  echo $success; ?>
                        </div>
                    <?php } ?>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php  echo $error; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter Email">
                </div>



                <div class="col-md-6 pt-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter Password">
                </div>

                <div class="pt-3">
                    <button class="btn btn-primary" type="login" class="btn btn-primary">Login</button>
                    <a  class="text-decoration-none" href="signup.php">Register new User</a>

                </div>


            </form>
        </div>
    </div>


</body>

</html>