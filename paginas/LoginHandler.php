<?php

session_start();
$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include 'UserService.php';

if (!isset($_POST['email'], $_POST['password'])) {
    $_SESSION['warning_message'] = "Provide email and password";
    header("Location: /login.html");
    exit();
}

$userService = new userService();
$email = $_POST['email'];
$password = $_POST['password'];

$myLogin = $userService->login($email, $password);

if ($myLogin == null) {
    $_SESSION['warning_message'] = "Invalid Credential";
    header("Location: /login.html");
    exit();
}

$_SESSION['success_message'] = "You are logged in";

$_SESSION['loggedUser'] = serialize($myLogin);
header("Location: /adminTest.php");
exit();
