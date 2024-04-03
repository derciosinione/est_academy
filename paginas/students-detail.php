<?php
include_once 'Utils.php';
include 'ShowErrorDetails.php';
require_once 'UserService.php';

$service = new UserService();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
    <title>Students</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main id="main">
        <!-- MAIN HEADER -->


        <!-- MAIN BODY -->
        <div class="main-body">

            <div class="main-description">
                <h2>Alunos</h2>
                <div>
                    <button class="more-option-btn" onclick="toggleMoreOption()">MAIS OPÇÕES</button>
                    <div class="more-option" id="more-option">
                        <p>Mais opções</p>
                        <hr>
                        <div>
                            <input id="situation1" name="situation" type="checkbox"> <label
                                for="situation1">Inativos</label>
                        </div>
                        <div>
                            <input id="situation2" name="situation" type="checkbox"> <label
                                for="situation2">Aprovados</label>
                        </div>

                        <div>
                            <input id="situation3" name="situation" type="checkbox"> <label for="situation3">Aguardando
                            aprovação</label>
                        </div>

                        <div class="mt10 more-option-buttons">
                            <button class="red-color" onclick="">Cancelar</button>
                            <button class="" onclick="">Aplicar filtro</button>
                        </div>
                    </div>
                </div>
            </div>

            <h1>Student detail</h1>
        </div>

    </main>
</div>

<script src="main.js"></script>
</body>
</html>