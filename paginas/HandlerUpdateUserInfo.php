<?php
include 'ShowErrorDetails.php';
require_once 'UserService.php';
include_once 'Utils.php';
include_once 'Constants.php';

$user = getLoggedUser();

unset($_SESSION['form_data']);
unset($_SESSION['error_message']);

$redirectUrl = "Location: settings.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $errors[] = "Erro no envio do formulário.";
}

$loggedUserId = $user->id;
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$nif = htmlspecialchars($_POST['nif']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);
$birthday = htmlspecialchars($_POST['birthday']);

$errors = [];

if (empty($name)) {
    $errors[] = "O nome é um campo obrigatorio.";
}

if (empty($username)) {
    $username = null;
}

if (empty($email)) {
    $errors[] = "O email é um campo obrigatorio.";
}

if (!Constants::isValidDateFormat($birthday)) {
    $errors[] = "A data de nascimento deve estar no formato yyyy/mm/dd.";
}

if (count($errors) > 0) {
    $_SESSION['error_message'] = $errors;

    $_SESSION['form_data'] = [
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'nif' => $nif,
        'phoneNumber' => $phoneNumber,
        'birthday' => $birthday
    ];

    header($redirectUrl);
    exit();
}

$service = new UserService();

$response = $service->updateUserInfo($loggedUserId, $name, $username, $email, $nif, $phoneNumber, $birthday);

if (!$response->success){
    $_SESSION['error_message'][] = $response->errorMessage;
    $_SESSION['form_data'] = [
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'nif' => $nif,
        'phoneNumber' => $phoneNumber,
        'birthday' => $birthday
    ];

    header($redirectUrl);
    exit();
}

$user = $service->getUserById($loggedUserId);

if ($user!=null) $_SESSION['loggedUser'] = serialize($user);

$_SESSION['success_message'][] = "Informações atualizadas com sucesso.";

header($redirectUrl);

exit();