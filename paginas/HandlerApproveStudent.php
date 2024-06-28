<?php

include_once 'Utils.php';
include 'ShowErrorDetails.php';
include 'UserService.php';
include_once 'Constants.php';

$loggedUser = getLoggedUser();

unset($_SESSION['error_message']);

$_SESSION['success_message'] = [];

if (!isset($_GET["studentId"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificador do aluno";
    exit();
}

$studentId = htmlspecialchars($_GET['studentId']);
$status = htmlspecialchars($_GET['status']);

$redirectUrl = "Location: students-detail.php?id=$studentId";

if ($loggedUser->profileId!=Constants::$adminId){
    $errors[] = "Esta funcionalidade só é permitido para Administradores";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

$userService = new UserService();

$response = $userService->handlerAdmitUser($studentId, !$status);

if (!$response->success){
    $_SESSION['error_message'][] = $response->errorMessage;
    header($redirectUrl);
    exit();
}

$_SESSION['success_message'][] = "Acesso alterado com sucesso!";
header($redirectUrl);

exit();