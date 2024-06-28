<?php //include_once 'RedirectLoggedUser.php'; ?>

<?php
session_start();

$messages = [];

if (isset($_SESSION["warning_message"])) {
    $messages = $_SESSION['warning_message'];
    unset($_SESSION['warning_message']);
}

$name = $email = $birthDay = $phoneNumber = $nif = $password = '';

if (isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
    $name = $formData['name'];
    $email = $formData['email'];
    $birthDay = $formData['birthDay'];
    $phoneNumber = $formData['phoneNumber'];
    $nif = $formData['nif'];
    $password = $formData['password'];
    unset($_SESSION['form_data']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
    <title>Sign Up</title>

</head>
<body>

<div class="login-container">

    <div class="bgImg">
        <img alt="" src="signupImg.png">
    </div>
    <div class="content">
        <nav>
            <a href="index.php"><span class="my-logo">My<span>Academy</span></span></a>
            <span>have an account? <a href="login.php">Sign in!</a></span>
        </nav>

        <section>
            <form action="HandlerCreateStudent.php" method="post">
                <h1 class="fz27">Get Started With My Academy </h1>
                <p class="fz18 blackOpacity">Getting started is easy</p>

                <!-- Messages -->
                <?php if ($messages) { ?>
                    <div class="message-warning blue-color">
                        <?php
                        foreach ($messages as $message) echo "<p><b>*</b> $message </p>";
                        ?>
                    </div>
                <?php } ?>

                <div class="inputs">
                    <input id="name" name="name" placeholder="Nome Completo" type="text"
                           value="<?php echo htmlspecialchars($name); ?>">
                    <input id="email" name="email" placeholder="Email" type="email"
                           value="<?php echo htmlspecialchars($email); ?>">
                    <input id="phoneNumber" name="phoneNumber" placeholder="Contacto" type="text"
                           value="<?php echo htmlspecialchars($phoneNumber); ?>">
                    <input id="nif" name="nif" placeholder="NIF" type="text"
                           value="<?php echo htmlspecialchars($nif); ?>">
                    <input id="birthDay" name="birthDay" type="date" value="<?php echo htmlspecialchars($birthDay); ?>">
                    <div class="password-div">
                        <input id="password" name="password" placeholder="Password" type="password"
                               value="<?php echo htmlspecialchars($password); ?>">
                        <span class="toggle-password" onclick="togglePasswordVisibility()"><i
                                    class="fas fa-eye blackOpacity"></i></span>
                    </div>

                    <div class="password-div">
                        <input id="confirm-password" name="confirmPassword" placeholder="Confirmar Password"
                               type="password">
                        <span class="toggle-password" onclick="toggleConfirmPasswordVisibility()"><i
                                    class="fas fa-eye blackOpacity"></i></span>
                    </div>

                    <input type="submit" value="Criar Conta">
                </div>
            </form>


        </section>
    </div>


    <script src="login.js"></script>
</div>
</body>
</html>