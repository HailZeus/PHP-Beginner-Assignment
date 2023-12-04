
<?php


    include_once "connection.php";

    session_start();

    if(!isset($_SESSION['loginId'])){
        $_SESSION['message']= "Unauthorized User";
        header('Location: /learn/signup.php');
        exit;
    }

    $message = '';

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

    }

            $userId = $_SESSION['loginId'];
            $sql = "SELECT * FROM students WHERE id = '$userId' LIMIT 1 ";
            $sqlData = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($sqlData);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <span class="input-group-text" id="basic-addon1"><?php if($message != ''){ echo $message;} ?> </span>
    <body>

     <nav class="navbar navbar-grey bg-primary">
            <div class="container-fluid">
            <button type="button" class="btn btn-danger"><a href="logout.php">Log Out</a></button>
            </div>
     </nav>
        
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date Of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['dob']?></td>
                    </tr>
                    
                </tbody>
            </table>

            

    </body>
</html>




