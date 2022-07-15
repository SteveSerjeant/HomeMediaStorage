<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="../css/register.css" type="text/css">
    <!--    /*for navtop stylings*/-->
    <link rel = "stylesheet" href="../css/mainPage.css">

</head>
<body>
<nav class="navtop">
    <div>
        <h1>Home Media Storage</h1>
        <a href="index.php"><i class="fas fa-arrow-left"></i>Back</a>
        <a href="register.php"><i class="fa fa-refresh"></i>Refresh</a>

    </div>
</nav>
<div class="register">
    <h1>Register</h1>
    <form action="regComplete.php" method="post" autocomplete="off">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>


