<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

include "displayMessageIfExists.php" ?>

<h1>Add Member</h1>

<?php

require_once __DIR__ . "/../../Models/Users/UserModel.php";
/** @var userModel $loggedUser */

if (isset($_SESSION['loggedUser'])) {
    $loggedUser = unserialize($_SESSION['loggedUser']);
    echo "<h3>Email: $loggedUser->email</h3>";
    echo "<hr>";
}
?>

<form action="../CreateMemberHandler.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="nif">Nif:</label>
    <input type="text" id="nif" name="nif" required><br><br>

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" id="phoneNumber" name="phoneNumber" required><br><br>

    <label for="birthDay">Birth Day:</label>
    <input type="date" id="birthDay" name="birthDay" required><br><br>

    <input type="submit" value="Create Manager">
</form>

<a href="adminTest.php">Back</a>
<a href="membersTest.php">Ver Membros</a>
</body>
</html>