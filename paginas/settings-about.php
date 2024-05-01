<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.core.css">
    <link href="settings.css" rel="stylesheet">
    <title>Settings</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
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

            <div class="setting-aside">
                <div class="user-avatar">
                    <img class="img-cover"
                         src="https://images.unsplash.com/photo-1589156191108-c762ff4b96ab?q=80&w=3086&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="pl20 pr20 mt15 pb10">
                    <h3>Angela de Jesus Derone</h3>
                    <p class="blackOpacity mt5 smallText"><i class="fas fa-id-card"></i> Administrador</p>
                </div>

                <div class="horizontal-line"></div>

                <nav>
                    <ul>
                        <li><a href="settings.php">Conta</a></li>
                        <li><a href="settings-change-password.php">Senha</a></li>
                        <li class="active-settings-menu"><a href="settings-about.php">Sobre</a></li>
                        <li><a href="#">Usuários</a></li>
                        <li><a href="#">Categorias</a></li>
                        <li><a href="#">Estados</a></li>
                    </ul>
                </nav>

            </div>

            <section>

                <h3 class="mt15 ml10 mb15">Sobre Mim</h3>
                <div class="horizontal-line"></div>

                    <section id="descriptionEditorBox" class="setting-container">
                        <input type="hidden" id="descriptionContent" name="description">
                        <label>Descrição</label>
                        <div class="mt10">
                            <div id="descriptionEditor"></div>
                        </div>
                        <input onclick="" onsubmit="" class="mt30 save-info-btn center" type="submit" value="SALVAR">
                    </section>
            </section>

        </div>

    </main>
</div>

<?php require 'textEditorElement.php' ?>

</body>
</html>