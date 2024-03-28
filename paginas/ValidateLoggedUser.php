<?php
session_start();

if(!isset($_SESSION['loggedUser'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    $_SESSION['warning_message'] = "You need to log in to access the administrative panel";
    header("Location: login.php");
    exit();
}

global $currentFileName;

$currentFileName = strtolower(trim(str_replace('.php', '', basename($_SERVER['SCRIPT_NAME']))));
$currentFileName = str_replace('.html', '', $currentFileName);

if ($currentFileName==='login' || $currentFileName==='signup'){
    header("Location: dashboard.php");
    exit();
}