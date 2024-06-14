<?php

session_start();
include 'ShowErrorDetails.php';
include 'helper.php';
include 'ShowErrorDetails.php';

include 'UserService.php';


$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;
$message = [];

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$birthDay = htmlspecialchars($_POST['birthDay']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

$errors = [];

if (empty($name)) {
    $errors[] = "O nome é um campo obrigatorio.";
}

if (empty($email)) {
    $errors[] = "O email é um campo obrigatorio.";
}

if (password_verify($password, $password)) {
    $errors[] = "As senhas introduzidas não conferem.";
}

if (count($errors) > 0) {
    $_SESSION['error_message'] = $errors;

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'birthDay' => $birthDay,
        'phoneNumber' => $phoneNumber,
        'password' => $password
    ];

    header("Location: signup.php");
    exit();
}


$avatarUrl = 'studentavatar.jpg';
$nif = '';

$userService = new UserService();

$response = $userService->createStudent(
    $name,
    $email,
    $nif,
    $birthDay,
    $phoneNumber,
    $password,
    $avatarUrl);

if (!$response->success){

    $_SESSION['error_message'][] = $response->errorMessage;

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'birthDay' => $birthDay,
        'phoneNumber' => $phoneNumber,
        'password' => $password
    ];

    header("Location: signup.php");
    exit();
}

makeLoginHelper($userService, $email, $password);
