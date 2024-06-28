<?php

include_once 'Utils.php';
include 'ShowErrorDetails.php';
include 'CourseService.php';
include_once 'Constants.php';

$loggedUser = getLoggedUser();

unset($_SESSION['error_message']);

$_SESSION['success_message'] = [];

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado do curso";
    exit();
}

$courseId = htmlspecialchars($_GET['id']);
$redirectUrl = "Location: course-detail.php?id=$courseId";

if ($loggedUser->profileId == Constants::$student) {
    $errors[] = "Esta funcionalidade só é permitido para Administradores e Docentes";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

$courseService = new CourseService();

$response = $courseService->delete($courseId, $loggedUser);

if (!$response->success) {
    $_SESSION['error_message'][] = $response->errorMessage;
    header($redirectUrl);
    exit();
}

$_SESSION['success_message'][] = "Curso $courseId eliminado com sucesso";
header("Location: courses.php");
exit();