<?php
global $currentFileName, $loggedUser;
?>

<div class="setting-aside">
    <div class="user-avatar">
        <img class="img-cover" src="<?php echo $loggedUser->avatarUrl; ?>" alt="">
    </div>
    <div class="pl20 pr20 mt15 pb10">
        <h3><?php echo $loggedUser->name; ?></h3>
        <p class="blackOpacity mt5 smallText"><i class="fas fa-id-card"></i> <?php echo $loggedUser->profileName; ?></p>
    </div>

    <div class="horizontal-line"></div>
    <nav>
        <ul>
            <li <?php if ($currentFileName == 'settings') echo 'class="active-settings-menu"' ?>><a href="settings.php">Conta</a>
            </li>
            <li <?php if ($currentFileName == 'settings-change-password') echo 'class="active-settings-menu"' ?>><a
                        href="settings-change-password.php">Senha</a></li>
            <li <?php if ($currentFileName == 'settings-about') echo 'class="active-settings-menu"' ?>><a
                        href="settings-about.php">Sobre</a></li>

            <?php
            if ($loggedUser->profileId == Constants::$adminId) {
                ?>
                <li><a href="#">Usuários</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Estados</a></li>
            <?php } ?>
        </ul>
    </nav>

</div>