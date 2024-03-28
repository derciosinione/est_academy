<?php

session_start();
$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;

include 'ShowErrorDetails.php';

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

$_SESSION['loggedUser'] = serialize($myLogin);

if(isset($_SESSION['redirect_url'])){
    $redirect_url = $_SESSION['redirect_url'];
    unset($_SESSION['redirect_url']);

    header("Location: $redirect_url");
    exit();
}

header("Location: dashboard.php");
exit();
