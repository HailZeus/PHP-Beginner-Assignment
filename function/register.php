<?php

include_once "../config/connection.php";

session_start();

if(!isset($_POST['username']) || empty($_POST['username'])){
    $_SESSION['error_message']= "Please enter your username ";
    header('Location: ../signup.php');
    exit;
}

if(!isset($_POST['email']) || empty($_POST['email'])){
    $_SESSION['error_message']= "Enter your email";
    header('Location: ../signup.php');
    exit;
}else{
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message']= "Enter your email";
        header('Location: ../signup.php');
        exit;
}
}

if(!isset($_POST['password']) || empty($_POST['password'])){
    $_SESSION['error_message']= "Enter your password";
    header('Location: ../signup.php');
    exit;
}else{
    $password = $_POST['password'];
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $_SESSION['error_message']= "your password should contain 1 uppercase,1lowercase,1 special character,and atleast 8 characters";
        header('Location: ../signup.php');
        exit;
    }
    
    if($_POST['confirm_password'] != $password){
        $_SESSION['error_message']= "password did not match";
        header('Location: ../signup.php');
        exit;
    }

}


// select query
$sql = "SELECT * FROM students WHERE email = '".$_POST['email']."' LIMIT 1";

$userExist = mysqli_query($conn,$sql);

if(mysqli_num_rows($userExist) > 0)  {
    $_SESSION['error_message']= "User already exist";
    header('Location: ../signup.php');
    exit;
}

// Insert query

// $dob = date('Y-m-d', strtotime($_POST['dob']));

$sqlInsert = "INSERT INTO `students` (`username`,email,`password`) VALUES('".$_POST['username']."','".$_POST['email']."','".md5($_POST['password'])."')";
// print_r($sqlInsert);die();

$inserted = mysqli_query($conn,$sqlInsert);

// print_r($inserted);die();

if($inserted){
    $_SESSION['success_message']= "Registered succesfully";
    header('Location: ../signin.php');
}


?>