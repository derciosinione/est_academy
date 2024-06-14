<?php
session_start();

include 'ShowErrorDetails.php';
require_once 'UserService.php';

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$birthDay = htmlspecialchars($_POST['birthDay']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

echo "Sign Up";

return;

