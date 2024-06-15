<?php

session_start();
$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;
$message = [];

include 'ShowErrorDetails.php';
include 'helper.php';

include 'UserService.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['warning_message'][] = "Email and password are required";
    header("Location: login.php");
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $_SESSION['warning_message'][] = "Invalid email format";;
//     header("Location: login.php");
//    exit();
//}

$userService = new UserService();

makeLoginHelper($userService, $email, $password);
