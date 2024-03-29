<?php
global $currentFileName;
include 'RedirectNonLoggedUser.php';
require_once "UserModel.php";

/** @var string $currentFileName */
$activeSettingsPages = array("settings", "account-profile");

if(isset($_SESSION['loggedUser'])){
    /** @var userModel $loggedUser */
    $loggedUser = unserialize($_SESSION['loggedUser']);
}
?>


<!-- SIDE BAR -->
<aside>
    <!-- SIDE BAR HEADER -->
    <div class="sidebar-header">
        <a href="index.php"><span>My<span>Academy</span></span></a>
    </div>


    <!-- SIDE BAR MENU -->
    <div class="sidebar-menu">
        <ul <?php if ($currentFileName=='dashboard') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="dashboard.php">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>

        <ul <?php if ($currentFileName=='registrations') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="registrations.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Inscrições</span>
                </a>
            </li>
        </ul>

        <ul <?php if ($currentFileName=='courses') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="courses.php">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Cursos</span>
                </a>
            </li>
        </ul>

        <ul <?php if ($currentFileName=='students') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="students.php">
                    <i class="fas fa-user-graduate"></i>
                    <span>Alunos</span>
                </a>
            </li>
        </ul>

        <ul <?php if ($currentFileName=='instructors') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="instructors.php">
                    <i class="fas fa-user-tie"></i>
                    <span>Docentes</span>
                </a>
            </li>
        </ul>

        <ul <?php if ($currentFileName=='admin') echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="admin.php">
                    <i class="fas fa-user-shield"></i>
                    <span>Admin</span>
                </a>
            </li>
        </ul>

        <ul <?php if (in_array($currentFileName, $activeSettingsPages)) echo 'class="active-sidebar-menu"' ?>>
            <div class="active-sidebar-menu-line"></div>
            <li><a href="settings.php">
                    <i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>

        <ul>
            <div class="active-sidebar-menu-line"></div>
            <li>
                <a href="LogoutHandler.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-my-profile">
            <div class="avatar">
                <img alt=""
                     src="<?php echo $loggedUser->avatarUrl; ?>">
            </div>

            <div class="user-information">
                <p class="blackOpacity smallText"><?php echo $loggedUser->profileName ?></p>
                <p class="bold blackText"><?php echo $loggedUser->name ?></p>
                <a href="account-profile.php"><button>Ver Perfil</button></a>
            </div>
        </div>
    </div>
</aside>