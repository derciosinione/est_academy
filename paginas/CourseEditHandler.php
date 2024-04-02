<?php
include 'ShowErrorDetails.php';
require_once 'CourseService.php';
include_once 'Utils.php';
include_once 'Constants.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);


$courseId = htmlspecialchars($_GET['id']);
$redirectUrl = "Location: course-detail.php?id=$courseId";

//TODO: Buscar o perfil Aluno na base de dados e fazer a comparação
if ($user->profileId===Constants::$student){
    $errors[] = "Esta funcionalidade só é permitido para Administradores e Docentes.";
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado do curso";
    exit();
}

$creatorId = $user->id;
$name = htmlspecialchars($_POST['name']);
$category = htmlspecialchars($_POST['category']);
$price = htmlspecialchars($_POST['price']);
$description = htmlspecialchars($_POST['description']);
$maxStudent = htmlspecialchars($_POST['maxStudent']);
$imageUrl = 'coursebg.png';

$errors = [];

if (empty($name)) {
    $errors[] = "O nome do curso é um campo obrigatorio.";
}

if (empty($category) || $category < 0) {
    $errors[] = "Informe a categoria.";
}

if (empty($price) || $price < 0) {
    $price = 0;
}

if (count($errors) > 0) {
    $_SESSION['error_message'] = $errors;

    $_SESSION['form_data'] = [
        'name' => $name,
        'category' => $category,
        'price' => $price,
        'maxStudent' => $maxStudent,
        'description' => $description
    ];

    header($redirectUrl);
    exit();
}

$courseService = new CourseService();

$response = $courseService->update(
    $courseId,
    $creatorId,
    $name,
    $category,
    $price,
    $description,
    $maxStudent,
    $imageUrl
);

if (!$response->success){

    $_SESSION['error_message'][] = $response->errorMessage;

    $_SESSION['form_data'] = [
        'name' => $name,
        'category' => $category,
        'price' => $price,
        'maxStudent' => $maxStudent,
        'description' => $description
    ];
}

$_SESSION['success_message'][] = "Curso $name atualizado com sucesso";

header($redirectUrl);

exit();