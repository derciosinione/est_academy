<?php

include_once 'Utils.php';
include 'ShowErrorDetails.php';
include 'CourseService.php';
include_once 'Constants.php';

$loggedUser = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

$_SESSION['success_message'] = [];

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado da inscrição";
    exit();
}

$registrationId = htmlspecialchars($_GET['id']);
$redirectUrl = "Location: registrations.php";

if ($loggedUser->profileId == Constants::$student) {
    $errors[] = "Esta funcionalidade só é permitido para Administradores e Docentes";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

$courseService = new CourseService();

$response = $courseService->approveRegistration($registrationId);

if (!$response->success) {
    $_SESSION['error_message'][] = $response->errorMessage;
    header($redirectUrl);
    exit();
}

$_SESSION['success_message'][] = "Inscrição $registrationId aprovada com sucesso";
header("Location: registrations.php");
exit();