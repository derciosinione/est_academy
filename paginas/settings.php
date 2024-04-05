<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
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
                        <li class="active-settings-menu"><a href="#">Conta</a></li>
                        <li><a href="#">Senha</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Usuários</a></li>
                        <li><a href="#">Categorias</a></li>
                        <li><a href="#">Estados</a></li>
                    </ul>
                </nav>

            </div>

            <section>
                User info section
            </section>

        </div>

    </main>
</div>
</body>
</html>