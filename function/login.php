
<?php
include_once "../config/connection.php";

session_start();

$sql = "SELECT * FROM students WHERE password = '".md5($_POST['password'])."' AND email = '".$_POST['email']."' ";

$sqlData = mysqli_query($conn,$sql);

if(mysqli_num_rows($sqlData) > 0){
    
  $row = mysqli_fetch_assoc($sqlData);

  $_SESSION['loginId'] = $row['user_id'];
  $_SESSION['loggedIn'] = true;
  $_SESSION['success_message']= "logged in succesfully";

  header('Location: ../admin/dashboard.php');
  exit;
}else{

    $_SESSION['error_message']= "Invalid Email or Password";
    header('Location: ../signin.php');
    exit;
}


?>












