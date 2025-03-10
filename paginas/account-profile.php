<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="main-body.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <title>Account Profile</title>
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

            <div>
                <?php include "displayMessageIfExists.php" ?>

                <?php
                /** @var userModel $loggedUser */

                require_once "UserModel.php";

                if (isset($_SESSION['loggedUser'])) {
                    $loggedUser = unserialize($_SESSION['loggedUser']);

                    echo "<h1>Logged User</h1>";
                    echo "<h3>Id: $loggedUser->id</h3>";
                    echo "<h3>Profile: $loggedUser->profileName</h3>";
                    echo "<h3>Name: $loggedUser->name</h3>";
                    echo "<h3>Email: $loggedUser->email</h3>";
                }
                ?>
            </div>
        </div>

    </main>
</div>

<script src="main.js"></script>
</body>
</html>