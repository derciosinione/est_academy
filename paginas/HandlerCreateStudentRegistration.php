<?php
include 'ShowErrorDetails.php';
require_once 'CourseService.php';
include_once 'Utils.php';
include_once 'Constants.php';

$user = getLoggedUser();

if (!isset($_GET["courseId"])) {
    $_SESSION['404_message'] = "Informe o identificado do curso";
    header("Location: 404.php");
    exit();
}

if ($user==null){
    $_SESSION['warning_message'] = "Efetue login para inscrever-se no curso pretendido";
    header("Location: login.php");
    exit();
}

$courseId = $_GET["courseId"];

$courseService = new CourseService();

$response = $courseService->createStudentRegistration(
    $user->id,
    $courseId
);

if (!$response->success){
    $_SESSION['404_message'] = "Não foi possivel inscrever o aluno no curso, tente novamente!";
    header("Location: 404.php");
    exit();
}

$_SESSION['success_message'][] = "Aluno inscrito no curso com sucesso";

header("Location: registrations.php");
exit();
