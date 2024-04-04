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
    <link href="user.css" rel="stylesheet">
    <title>Students</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main id="main">

        <div class="student-detail-header">
            <div class="user-detail-bg-image">
                <img src="studentdetail-background.png">
            </div>

            <div class="circular-avatar">
                <img src="studentavatar.jpg">
            </div>
        </div>

        <section class="student-detail-section">
            <div>
                <h3>Dercio Sinione Derone</h3>
                <p class="blackOpacity mt5"><i class="fas fa-book-reader"></i> Aluno</p>
            </div>

            <div class="student-detail-tab">
                <ul>
                    <li>
                        <a href="#">
                            <span>Perfil</span>
                        </a>
                        <div class="active-tab mt5"></div>
                    </li>
                    <li>
                        <a href="#">
                            <span>Inscrições</span>
                        </a>
                        <div class="active-tab mt5" hidden></div>
                    </li>
                </ul>
                <div class="line"></div>
            </div>

            <div class="student-detail-info">
                <div>
                    <div>
                        <label>NIF</label>
                        <span>525 652 356</span>
                    </div>

                    <div>
                        <label>Email</label>
                        <span>derciosinione@example.com</span>
                    </div>
                </div>

                <div>
                    <div>
                        <label>Contacto</label>
                        <span>+351 925 564 251</span>
                    </div>

                    <div>
                        <label>Data de Nascimento</label>
                        <span>12/04/2000</span>
                    </div>
                </div>

                <div>
                    <div>
                        <label>Status</label>
                        <span>Aprovado</span>
                    </div>

                    <div>
                        <label>Data de Cadastro</label>
                        <span>12/04/2000</span>
                    </div>
                </div>
            </div>

            <button class="mt30">ADMITIR</button>


        </section>
    </main>
</div>

<script src="main.js"></script>
</body>
</html>