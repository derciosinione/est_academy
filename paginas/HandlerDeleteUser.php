<?php

include 'ShowErrorDetails.php';
include 'UserService.php';
include_once 'Utils.php';
include_once 'Constants.php';
include 'helper.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado do usuario";
    exit();
}

$userId = htmlspecialchars($_GET['id']);
$redirectUrl = "Location: user-detail.php?id=$userId";

if ($user->profileId!=Constants::$adminId){
    $errors[] = "Esta funcionalidade só é permitido para Administradores.";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

$userService = new UserService();

$user = $userService->getUserById($userId);

if (!$user) {
    $_SESSION['404_message'] = "Usuário não encontrado";
    header("Location: 404.php");
    exit();
}

$redirectUrl = "Location: ";

switch ($user->profileId) {
    case Constants::$adminId:
        $redirectUrl .= "admin.php";
        break;
    case Constants::$instructor:
        $redirectUrl .= "instructors.php";
        break;
    default:
        $redirectUrl .= "students.php";
}

$response = $userService->deleteUser($userId);

if (!$response->success){
    $_SESSION['error_message'][] = $response->errorMessage;
    $redirectUrl = "Location: user-detail.php?id=$userId";
    header($redirectUrl);
    exit();
}

$userName = $user->name;

$_SESSION['success_message'][] = "Usuario $userName eliminado com sucesso";

header($redirectUrl);
exit();