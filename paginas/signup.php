<?php include_once 'RedirectLoggedUser.php' ?>

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

            <form action="dashboard.php" method="post">
                <h1 class="fz27">Get Started With My Academy </h1>
                <p class="fz18 blackOpacity">Getting started is easy</p>

                <div class="inputs">
                    <input id="name" name="name" placeholder="Nome Completo" type="text">
                    <input id="email" name="email" placeholder="Email" type="email">
                    <input id="phoneNumber" name="email" placeholder="Contacto" type="text">
                    <input id="" name="email" placeholder="Contacto" type="text">
                    <input id="birthDay" name="birthDay" type="date">


                    <div class="password-div">
                        <input id="password" name="password" placeholder="Password" type="password">
                        <span class="toggle-password" onclick="togglePasswordVisibility()"><i
                                class="fas fa-eye blackOpacity"></i></span>
                    </div>

                    <div class="password-div">
                        <input id="confirm-password" name="confirm-password" placeholder="Confirmar Password"
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