<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'homemediastorage';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//$stmt = $conn->prepare('SELECT passCode, email FROM accounts WHERE userID = ?');
//// In this case we can use the account ID to get the account info.
//$stmt->bind_param('i', $_SESSION['id']);
//$stmt->execute();
//$stmt->bind_result($password, $email);
//$stmt->fetch();
//$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel = "stylesheet" href="../css/mainPage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Home Media Storage</h1>
        <a href="mainPage.php"><i class="fas fa-arrow-left"></i>Back</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Profile Page</h2>
    <div>
        <p>Your account details are below:</p>
        <table>
            <tr>
                <td>Username:</td>
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>ID:</td>
                <td><?=$_SESSION['id']?></td>
            </tr>
            <tr>
                <td>Password:</td>
<!--                <td>--><?//=$password?><!--</td>-->
                <td><?=$_SESSION['password']?></td>
            </tr>
            <tr>
                <td>Email:</td>
<!--                <td>--><?//=$email?><!--</td>-->
                <td><?=$_SESSION['email']?></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
