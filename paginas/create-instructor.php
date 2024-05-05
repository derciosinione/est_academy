<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
    <title>Docentes</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main id="main">
        <!-- MAIN HEADER -->
        <div class="main-header">
            <div class="main-header-left">
                <div class="main-menu-option">
                    <i class="fas fa-bars menu-icon"></i>
                </div>
            </div>

            <div class="main-header-right">
                <!-- Circular avatar -->
                <?php include_once 'circularAvatar.php' ?>
            </div>
        </div>

        <!-- MAIN BODY -->
        <div class="main-body">

            <div class="main-description">
                <h2>Adicionar Docente</h2>
            </div>


            <div class="user-registration-form">
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

                <input onclick="" onsubmit="" class="mt30 large-btn" type="submit" value="SALVAR">

            </div>

        </div>

    </main>
</div>

<script src="main.js"></script>
</body>
</html>