<?php

if (isset($_SESSION['loggedUser'])) {
    $loggedUser = unserialize($_SESSION['loggedUser']);

    echo <<<HTML
        <div class="avatar">
            <img alt="" src="$loggedUser->avatarUrl">
        </div> 
HTML;

}