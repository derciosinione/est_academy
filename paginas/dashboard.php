<?php
/** @var string $currentFileName */
/** @var userModel $loggedUser */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="main-body.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>

<div class="board">

    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main>
        <!-- MAIN HEADER -->
        <div class="main-header">
            <div class="main-header-left">
                <div class="main-menu-option">
                    <i class="fas fa-bars menu-icon"></i>
                </div>
            </div>

            <div class="main-header-right">
                <div class="search-container">
                    <input placeholder="Search..." type="text">
                    <button class="btn-icon" type="submit"><i class="fas fa-search"></i></button>
                </div>

                <!-- Circular avatar -->
                <?php include_once 'circularAvatar.php' ?>

            </div>
        </div>

        <!-- MAIN BODY -->
        <div class="main-body">

            <div class="main-description">
                <h2>Dashboard</h2>
                <div>
                    <button onclick="toggleMoreOption()" style="width: 123px;">MAIS OPÇÕES</button>
                    <div class="more-option" id="more-option">
                        <p>Mais opções</p>
                        <hr>

                    </div>
                </div>
            </div>

            <div>
                <?php include "displayMessageIfExists.php" ?>

<!--                --><?php
//                require_once "UserModel.php";
//
//                if(isset($_SESSION['loggedUser'])){
//                    $loggedUser = unserialize($_SESSION['loggedUser']);
//
//                    echo "<h1>Logged User</h1>";
//                    echo "<h3>Id: $loggedUser->id</h3>";
//                    echo "<h3>Profile: $loggedUser->profileName</h3>";
//                    echo "<h3>Name: $loggedUser->name</h3>";
//                    echo "<h3>Email: $loggedUser->email</h3>";
//                    echo "<h3>birthDay: $loggedUser->birthDay</h3>";
//                    echo "<h3>phoneNumber: $loggedUser->phoneNumber</h3>";
//                    echo "<hr>";
//                }
//
//                ?>

            </div>
        </div>

    </main>
</div>

<script src="main.js"></script>
</body>
</html>