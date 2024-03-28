<?php
global $currentFileName;
include 'ValidateLoggedUser.php';

/** @var string $currentFileName */
$activeSettingsPages = array("settings", "account-profile");
?>


<!-- SIDE BAR -->
<aside>
    <!-- SIDE BAR HEADER -->
    <div class="sidebar-header">
        <a href="index.html"><span>My<span>Academy</span></span></a>
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
                <a href="index.html">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-my-profile">
            <div class="avatar">
                <img alt=""
                     src="https://media.istockphoto.com/id/1416029563/pt/foto/metaverse-digital-cyber-world-technology-man-with-virtual-reality-vr-goggle-playing-ar.jpg?s=1024x1024&w=is&k=20&c=jXd5my_A3kSX2pJmtZXvcbC8KVI_vbxGgMZxCxUK6UA=">
            </div>

            <div class="user-information">
                <p class="blackOpacity smallText">Admin</p>
                <p class="bold blackText">Dércio Derone</p>
                <a href="account-profile.php" class="white-text-color"><button>Ver Perfil</button></a>
            </div>
        </div>
    </div>
</aside>