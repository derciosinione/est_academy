<?php
include_once 'RedirectNonLoggedUser.php';
include_once  'getCurrentUser.php';

function app_session_start()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

app_session_start();