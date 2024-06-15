<?php

session_start();
include 'ShowErrorDetails.php';
include 'helper.php';
include 'ShowErrorDetails.php';

include 'UserService.php';

unset($_SESSION['form_data']);
unset($_SESSION['warning_message']);

$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;
$message = [];

$errors = [];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$birthDay = htmlspecialchars($_POST['birthDay']);
$password = htmlspecialchars($_POST['password']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);
$nif = htmlspecialchars($_POST['nif']);

$errors = userValidator($name, $email, $phoneNumber, $nif);

$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

if (empty($password)) {
    $errors[] = "Informe uma senha";
}

if ($password!==$confirmPassword) {
    $errors[] = "As senhas introduzidas não conferem";
}

if (count($errors) > 0) {
    $_SESSION['warning_message'] = $errors;

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'birthDay' => $birthDay,
        'phoneNumber' => $phoneNumber,
        'nif' => $nif,
        'password' => $password
    ];

    header("Location: signup.php");
    exit();
}

$avatarUrl = 'studentavatar.jpg';

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
        'password' => $password,
        'nif' => $nif,
    ];

    header("Location: signup.php");
    exit();
}

makeLoginHelper($userService, $email, $password);

