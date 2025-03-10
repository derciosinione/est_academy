<?php include_once 'RedirectLoggedUser.php'; ?>

<?php
$messages = [];

if (isset($_SESSION["warning_message"])) {
    $messages = $_SESSION['warning_message'];
    unset($_SESSION['warning_message']);
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
    <title>Login</title>
</head>
<body>

<div class="login-container">
    <div class="content">
        <nav>
            <a href="index.php"><span class="my-logo">My<span>Academy</span></span></a>
            <span>Don’t have an account? <a href="signup.php">Sign up!</a></span>
        </nav>

        <section>
            <form action="HandlerLogin.php" method="post">
                <h1>Welcome Back</h1>
                <p class="fz18">Login into your account</p>

                <?php if ($messages) { ?>
                    <div class="message-warning blue-color">
                        <?php
                        foreach ($messages as $message) echo "<p><b>*</b> $message </p>";
                        ?>
                    </div>
                <?php } ?>

                <div class="inputs">
                    <input type="text" placeholder="Email ou username" id="email" name="email">
                    <div class="password-div">
                        <input id="password" name="password" placeholder="Password" type="password">
                        <span class="toggle-password" onclick="togglePasswordVisibility()"><i
                                    class="fas fa-eye blackOpacity"></i></span>
                    </div>

                    <input type="submit" value="Login">
                </div>
            </form>
        </section>
    </div>

    <div class="bgImg">
        <img alt="" src="loginImg.png">
    </div>

    <script src="login.js"></script>
</div>
</body>
</html>