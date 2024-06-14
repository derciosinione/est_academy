<?php

/**
 * @param UserService $userService
 * @param string $email
 * @param string $password
 * @return void
 */
function makeLoginHelper(UserService $userService, string $email, string $password)
{
    $login = $userService->login($email, $password);

    if ($login == null) {
        $_SESSION['warning_message'][] = "Invalid Credential";
        header("Location: login.php");
        exit();
    }

    $_SESSION['loggedUser'] = serialize($login);

    if (isset($_SESSION['redirect_url'])) {
        $redirect_url = $_SESSION['redirect_url'];
        unset($_SESSION['redirect_url']);

        header("Location: $redirect_url");
        exit();
    }

    header("Location: dashboard.php");
    exit();
}
