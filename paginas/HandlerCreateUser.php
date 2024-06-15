<?php

include 'ShowErrorDetails.php';
include 'UserService.php';
include_once 'Utils.php';
include_once 'Constants.php';
include 'helper.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

$message = [];
$errors = [];

//TODO: Buscar o perfil Admin na base de dados e fazer a comparação
if ($user->profileId != Constants::$adminId) {
    $errors[] = "Esta funcionalidade só é permitido para Administradores.";
    $_SESSION['error_message'] = $errors;

    header("Location: create-user.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$redirectUrl = "Location: ";

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$birthDay = htmlspecialchars($_POST['birthDay']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);
$nif = htmlspecialchars($_POST['nif']);
$profileId = htmlspecialchars($_POST['profileId']);

$errors = userValidator($name, $email, $phoneNumber, $nif);

if (empty($profileId) || $profileId <= 0) {
    $errors[] = "Informe o perfil do usuario.";
}

if (count($errors) > 0) {
    $_SESSION['error_message'] = $errors;

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'birthDay' => $birthDay,
        'phoneNumber' => $phoneNumber,
        'profileId' => $profileId,
        'nif' => $nif
    ];

    header("Location: create-user.php");
    exit();
}

$avatarUrl = '';

switch ($profileId) {
    case Constants::$adminId:
        $redirectUrl .= "admin.php";
        $avatarUrl = 'docent-avatar1.jpg';
        break;
    case Constants::$instructor:
        $redirectUrl .= "instructors.php";
        $avatarUrl = 'docent-avatar.jpg';
        break;
    default:
        $redirectUrl .= "students.php";
        $avatarUrl = 'studentavatar.jpg';
}


$password = preg_replace('/\s+/', '', $nif);

$userService = new UserService();

$response = $userService->createUser(
    $name,
    $email,
    $nif,
    $birthDay,
    $phoneNumber,
    $password,
    $profileId,
    $avatarUrl);

if (!$response->success) {

    $_SESSION['error_message'][] = $response->errorMessage;

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'birthDay' => $birthDay,
        'phoneNumber' => $phoneNumber,
        'profileId' => $profileId,
        'nif' => $nif,
    ];

    header("Location: create-user.php");
    exit();
}

$_SESSION['success_message'][] = "Usuario $name criado com sucesso";

header($redirectUrl);
exit();