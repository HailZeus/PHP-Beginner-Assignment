
<?php


include_once "../config/connection.php";

    session_start();

    if(!isset($_SESSION['loggedIn'])){
        $_SESSION['error_message']= "Unauthorized User";
        header('Location: ../signup.php');
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

    $userId = $_SESSION['loginId'];
    $sql = "SELECT * FROM students ";
    $sqlData = mysqli_query($conn,$sql);

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
                <h2> List Of Users  <a class="btn btn-primary ms-2" href="../function/logout.php">Log Out</a></h2>
               
            </div>
                

            <table class="table table-success table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($sqlData) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($sqlData)) {?>
                        <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><a href="./user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary">View User</a></td>
                        </tr>
                    <?php }
                    } else {
                    ?>
                    <tr>
                        <td colspan="3">No user found</td>
                    </tr>
                    <?php
                    }
                      
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>

            

    </body>
</html>




