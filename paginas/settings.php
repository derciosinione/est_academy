<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="settings.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <title>Settings</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
    <?php
        include_once 'SideBarMenu.php';
    ?>

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

            <?php include_once 'settings-aside.php' ?>

            <section>
                <h3 class="mt15 ml15 mb15">Informações Pessoais</h3>
                <div class="horizontal-line"></div>

                <div class="setting-container">

                    <div class="input-box">
                        <label>
                            Nome
                            <input placeholder="myacademy" type="text" name="name">
                        </label>

                        <label>
                            Email
                            <input placeholder="myacademy@gmail.com" type="text" name="email">
                        </label>

                        <label>
                            NIF
                            <input placeholder="000 000 000" type="text" name="nif">
                        </label>

                        <label>
                            Contacto
                            <input placeholder="+351 925 365 214" type="text" name="phoneNumber">
                        </label>

                        <label>
                            País
                            <input placeholder="Portugal" type="text" name="country">
                        </label>

                        <label>
                            Data de Nascimento
                            <input placeholder="12/06/2001" type="text" name="birthday">
                        </label>
                    </div>

                    <input onclick="" onsubmit="" class="mt30 save-info-btn" type="submit" value="SALVAR">

                </div>

            </section>

        </div>

    </main>
</div>
</body>
</html>