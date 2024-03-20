<?php

session_start();
if (isset($_SESSION["success_message"])){
    echo "<div>{$_SESSION['success_message']}</div>";
    unset($_SESSION['success_message']);
}
else if (isset($_SESSION["warning_message"])){
    echo "<div>{$_SESSION['warning_message']}</div>";
    unset($_SESSION['warning_message']);
}