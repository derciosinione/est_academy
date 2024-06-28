<?php

require_once "UserModel.php";

/**
 * @return userModel|null
 */
function getLoggedUser()
{
    if (!isset($_SESSION['loggedUser'])) {
        return null;
    }
    return unserialize($_SESSION['loggedUser']);
}

