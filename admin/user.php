
<?php


include_once "../config/connection.php";

    session_start();

    if(!isset($_SESSION['loggedIn'])){
        $_SESSION['error_message']= "Unauthorized User";
        header('Location: ../signup.php');
        exit;
    }

    if(!isset($_GET['id'])){
        $_SESSION['error_message']= "Invalid User";
        header('Location: ./dashboard.php');
        exit;
    }

    $userId = $_GET['id'];
    $sql = "SELECT * FROM students WHERE user_id = '$userId' LIMIT 1";
    $sqlData = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($sqlData)
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
    </head>

    
    <body class="container">

            <div class="py-4 text-center">
                <h2> User Detail  
                   </h2>
               
            </div>

            <div class="py-4">
                
            
                <div>
                    <label class="fw-bold">ID</label>
                    <p><?php echo $row['user_id'] ?></p>
                </div>
                <div>
                    <label class="fw-bold">Name</label>
                    <p><?php echo $row['username'] ?></p>
                </div>
                <div>
                    <label class="fw-bold">Email</label>
                    <p><?php echo $row['email'] ?></p>
                </div>
                <div>
                    <label class="fw-bold">Password</label>
                    <p><?php echo $row['password'] ?></p>
                </div>
                <div>
                <a class="btn btn-primary" href="./dashboard.php">Back to Dashboard</a>
                </div>
               
            </div>

    </body>
</html>




