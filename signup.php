

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <title>Document</title>
  </head>
  <body>  
                <?php
                $message = '';

                if(isset($_SESSION['message'])){
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']);

                }
                ?>   
      <div class="container" >
          <div class="row">
            <h1 class="text-center">REGISTER</h1>
                  <form class="row-md-3" method="post" action="/learn/function/add.php">

                        
                        <span class="input-group-text" id="basic-addon1"><?php if($message != ''){
                          echo $message;
                      } ?> </span>

                          
                          <div class="s">
                            <label for="name" >Name</label>
                            <br>
                            <input type="text" name="name" placeholder = "name" >
                            
                            </div>
                            <br>
                          <div class="col-md-6">
                              <label for="email">Email</label>
                              <br>
                              <input type="email" name="email" placeholder = "email">
                            
                            </div>
                                  <br>
                            <div class="col-md-6">
                              <label for="password">Password</label>
                              <br>
                              <input type="text" name="password" placeholder = "password">
                            </div>
                            <br>
                            <div class="col-md-6">
                              <label for="password">confirm_password</label>
                              <br>
                              <input type="password" name="confirm_password" placeholder = "confirm_password"> 
                            </div>
                                <br>

                            <div class="col-md-6">
                              <label for="gender">gender</label>
                              <br>
                              <input type="radio" name="gender" value="male">Male
                              <input type="radio" name="gender" value="female">Female
                              <br><br>
                            </div>

                          <div class="col-md-6">
                              <label for="dob">DOB</label>
                              <br>
                              <input type="date" name="dob" >
                          </div>
                                <br>
                          <div>
                            <input type="submit" value="submit">
                          </div>
                            <a href="signin.php">Go to Login</a>
                  </form>
          </div>
      </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>