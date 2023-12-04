<?php

include_once "connection.php";

session_start();




if(!isset($_POST['name']) || empty($_POST['name'])){
    $_SESSION['message']= "Please enter your name ";
    header('Location: /learn/signup.php');
    exit;
}

if(!isset($_POST['email']) || empty($_POST['email'])){
    $_SESSION['message']= "Enter your email";
    header('Location: /learn/signup.php');
    exit;
}else{
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message']= "Enter your email";
        header('Location: /learn/signup.php');
        exit;
}
}

if(!isset($_POST['password']) || empty($_POST['password'])){
    $_SESSION['message']= "Enter password";
    header('Location: /learn/signup.php');
    exit;
}else{
    $password = $_POST['password'];
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $_SESSION['message']= "your password should contain 1 uppercase,1lowercase,1 special character,and atleast 8 characters";
        header('Location: /learn/signup.php');
        exit;
    }


    
    if($_POST['confirm_password'] != $password){
        $_SESSION['message']= "password did not match";
        header('Location: /learn/signup.php');
        exit;
    }

}


if(!isset($_POST['gender']) || empty($_POST['gender'])){
    $_SESSION['message']= "Select a gender";
    header('Location: /learn/signup.php');
    exit;
}

if(!isset($_POST['dob']) || empty($_POST['dob'])){
    $_SESSION['message']= "Please fill your date of birth";
    header('Location: /learn/signup.php');
    exit;
 }
 else{
    
    $currentYear = date('Y');

    $dobYear = date('Y', strtotime($_POST['dob']));

    $difference = $currentYear - $dobYear;

    if($difference < 18){
        $_SESSION['message']= "You are under age";
        header('Location: /learn/signup.php');
        exit;
    }
}

// select query
$sql = "SELECT * FROM students WHERE email = '".$_POST['email']."' LIMIT 1";

$userExist = mysqli_query($conn,$sql);

if(mysqli_num_rows($userExist) > 0)  {
    $_SESSION['message']= "User already exist";
    header('Location: /learn/signup.php');
    exit;
}

// Insert query

// $dob = date('Y-m-d', strtotime($_POST['dob']));

$sqlInsert = "INSERT INTO `students` (`name`,email,`password`,gender,dob) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['dob']."')";
// print_r($sqlInsert);die();

$inserted = mysqli_query($conn,$sqlInsert);

// print_r($inserted);die();

if($inserted){
    $_SESSION['message']= "Registered succesfully";
    header('Location: /learn/signin.php');
}


?>