
<?php
include_once "connection.php";

session_start();


$sql = "SELECT * FROM students WHERE password = '".$_POST['password']."' AND email = '".$_POST['email']."' ";

$sqlData = mysqli_query($conn,$sql);



if(mysqli_num_rows($sqlData) > 0){
    
  $row = mysqli_fetch_assoc($sqlData);

  $_SESSION['loginId'] = $row['id'];
  $_SESSION['logedIn'] == true;
  $_SESSION['message']= "logged in succesfully";

  header('Location: /learn/function/dashboard.php');

}else{

    $_SESSION['message']= "Invalid Email or Password";

    header('Location: /learn/signin.php');

}


?>












