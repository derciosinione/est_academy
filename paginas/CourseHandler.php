<?php

include 'ShowErrorDetails.php';
require_once 'CourseService.php';
include_once 'Utils.php';
include_once 'Constants.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

//TODO: Buscar o perfil Aluno na base de dados e fazer a comparação
if ($user->profileId===Constants::$student){
    $errors[] = "Esta funcionalidade só é permitido para Administradores e Docentes.";
    $_SESSION['error_message'] = $errors;

    header("Location: courses.php?open-modal=add");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$name = htmlspecialchars($_POST['name']);
$category = htmlspecialchars($_POST['category']);
$price = htmlspecialchars($_POST['price']);
$description = htmlspecialchars($_POST['description']);

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
        'description' => $description
    ];

    header("Location: courses.php?open-modal=add");
    exit();
}



$creatorId = $user->id;
$imageUrl = 'coursebg.png';
$maxStudent = 30;




function createCourse()
{
    $courseService = new CourseService();

    $response = $courseService->create(
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
            'description' => $description
        ];

        header("Location: courses.php?open-modal=add");
        exit();
    }

    $_SESSION['success_message'][] = "Curso $name cadastrado com sucesso";

    header("Location: courses.php?id=$response->result&success=true");
    exit();
}

