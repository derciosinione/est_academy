<?php
include 'ShowErrorDetails.php';
require_once 'UserService.php';
include_once 'Utils.php';
include_once 'Constants.php';

$user = getLoggedUser();

unset($_SESSION['error_message']);

$redirectUrl = "Location: settings-change-password.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$loggedUserId = $user->id;
$email = $user->email;
$currentPassword = htmlspecialchars($_POST['currentPassword']);
$newPassword = htmlspecialchars($_POST['newPassword']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

$errors = [];

if (empty($currentPassword)) {
    $errors[] = "Informe a senha atual.";
}

if (empty($newPassword)) {
    $errors[] = "Informe a nova senha.";
}

if (strlen($newPassword) < 6) {
    $errors[] = "A nova senha deve ter pelo menos 6 caracteres.";
}

if ($newPassword != $confirmPassword) {
    $errors[] = "A senha de confirmação é diferente da nova senha.";
}

if (count($errors) > 0) {
    $_SESSION['error_message'] = $errors;

    header($redirectUrl);
    exit();
}

$service = new UserService();

$response = $service->changePassword($email, $currentPassword, $newPassword, $confirmPassword);

if (!$response->success) {
    $_SESSION['error_message'][] = $response->errorMessage;
    header($redirectUrl);
    exit();
}

$_SESSION['success_message'][] = "Informações atualizadas com sucesso.";

header($redirectUrl);
exit();