<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Test</title>
</head>
<body>
    <?php include "displayMessageIfExists.php" ?>
    <form action="loginHandler.php" method="post">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required> <br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>