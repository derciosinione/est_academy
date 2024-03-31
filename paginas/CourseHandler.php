<?php

session_start();

include 'ShowErrorDetails.php';

$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Erro no envio do formulário.";
    exit();
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

    print_r($errors);
//    exit();
    header("Location: courses.php?open-modal=add");
    exit();
}


echo "Name: $name <br> Category: $category <br> Price: $price <br> $description";

echo "Every thing is Ok";

//include 'UserService.php';
//
//if (empty($_POST['email']) || empty($_POST['password'])) {
//    $_SESSION['warning_message'] = "Email and password are required";
//    header("Location: login.php");
//    exit();
//}
//
//$email = $_POST['email'];
//$password = $_POST['password'];
//
//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $_SESSION['warning_message'] = "Invalid email format";
//    header("Location: login.php");
//    exit();
//}
//
//$userService = new userService();
//
//$myLogin = $userService->login($email, $password);
//
//if ($myLogin == null) {
//    $_SESSION['warning_message'] = "Invalid Credential";
//    header("Location: login.php");
//    exit();
//}
//
//$_SESSION['loggedUser'] = serialize($myLogin);
//
//if(isset($_SESSION['redirect_url'])){
//    $redirect_url = $_SESSION['redirect_url'];
//    unset($_SESSION['redirect_url']);
//
//    header("Location: $redirect_url");
//    exit();
//}
//
//header("Location: dashboard.php");
//exit();
