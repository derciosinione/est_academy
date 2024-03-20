<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Services/mailService.php';
require __DIR__ . '/../../../vendor/autoload.php';


$from = "troy83@ethereal.email";
$destination = "derciosinione@gmail.com";
$subject = "Confirmação de cadastro";

$description = "Acabaste de ser adicionado como gerente na empresa Est Empregos, para acessar a plataforma clica no link abaixo:";
$redirectUrl = "http://localhost/web/est_empregos/App/Backend/Handlers/Test/adminTest.php";
$linkMessage = "clica aqui para configurar a palavra pass";

$mailInstance = new mailService();

$result = $mailInstance->sendEmail("Dercio Sinione",$destination,$subject,$description,$redirectUrl, $linkMessage);

//echo "Result: $result";

if ($result===true) {
    echo "Email enviado com sucesso";
} else {
    echo $result;
}
