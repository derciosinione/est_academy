<?php

session_start();
$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'UserService.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['warning_message'] = "Email and password are required";
    header("Location: login.php");
    exit();
}

$userService = new userService();
$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['warning_message'] = "Invalid email format";
    header("Location: login.php");
    exit();
}

$myLogin = $userService->login($email, $password);

if ($myLogin == null) {
    $_SESSION['warning_message'] = "Invalid Credential";
    header("Location: login.php");
    exit();
}

$_SESSION['success_message'] = "You are logged in";

$_SESSION['loggedUser'] = serialize($myLogin);
header("Location: dashboard.html");
exit();
