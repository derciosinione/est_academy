<?php

$messages = [];
$color = 'blue-color';

if (isset($_SESSION["success_message"])) {
    $messages = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
} else if (isset($_SESSION["warning_message"])) {
    $messages = $_SESSION['warning_message'];
    unset($_SESSION['warning_message']);
} else if (isset($_SESSION["error_message"])) {
    $messages = $_SESSION['error_message'];
    $color = "red-color";
    unset($_SESSION['error_message']);
}

if (empty($messages)) return;

?>

<div class="message-box <?php echo $color ?>" id="message-box">
    <i class="fas fa-times close-message-box" onclick="hideMessageBox()"></i>
    <section>
        <?php
        foreach ($messages as $message) echo "<p><b>*</b> $message </p>";
        ?>
    </section>
</div>

