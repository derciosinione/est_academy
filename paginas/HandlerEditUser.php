<?php

include 'ShowErrorDetails.php';
include 'UserService.php';
include_once 'Utils.php';
include_once 'Constants.php';
include 'helper.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

$userId = htmlspecialchars($_GET['id']);
$redirectUrl = "Location: user-detail.php?id=$userId";

if ($user->profileId != Constants::$adminId) {
    $errors[] = "Esta funcionalidade só é permitido para Administradores.";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado do usuario";
    exit();
}

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

    header($redirectUrl);
    exit();
}

$userService = new UserService();

$response = $userService->updateUserInfo(
    $userId,
    $name,
    $email,
    $email,
    $nif,
    $phoneNumber,
    $profileId,
    $birthDay);

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

    header($redirectUrl);
    exit();
}

$_SESSION['success_message'][] = "Usuario $name atualizado com sucesso";

header($redirectUrl);
exit();