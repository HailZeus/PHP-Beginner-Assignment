<?php

    session_start();


    $message = '';

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

    }
?>
 <span class="input-group-text" id="basic-addon1"><?php if($message != ''){ echo $message;} ?> </span>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
       
    </head>
    <body>
        <h2  class="text-center">LOGIN</h2>
        <div class="container">
            
            <div class="mx-auto" style="width: 500px , border-color: blue;">
                <form action="/learn/function/login.php" method="post">

                    <div>
                        <label for="name">Email</label>
                        <br>
                        <input type="email" name="email" >
                    </div>



                    <div>
                        <label for="password">Password</label>
                        <br>
                        <input type="password" name="password" >
                    </div>
                    <br><br>

                    <button type="login" class="btn btn-primary">Login</button>

                    <a href="signup.php">Register new User</a>

                </form>
            </div>
        </div>


    </body>
</html>