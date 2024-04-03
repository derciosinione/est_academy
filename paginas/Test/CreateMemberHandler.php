<?php

session_start();

require_once '../Services/UserService.php';

$_SESSION['success_message'] = null;
$_SESSION['warning_message'] = null;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nif = $_POST['nif'];
    $phoneNumber = $_POST['phoneNumber'];
    $birthDay = $_POST['birthDay'];

    $userService = new UserService();

    $response = $userService->createManager($name, $email, $nif, $birthDay, $phoneNumber);

    if ($response <= 0) {
        $_SESSION['warning_message'] = $response;
        header("Location: ../Test/CreateMemberTest.php");
        exit();
    }

    $_SESSION['success_message'] = "User criado com sucesso";

    header("Location: ../Handlers/Test/memberDetailTest.php?userId=$response");
    exit();
}
