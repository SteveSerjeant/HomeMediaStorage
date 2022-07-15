

<!DOCTYPE html>
<html>
	<head>
        <title>Home Media</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/index.css" type="text/css">
        <!--    /*for alert messages*/-->
        <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">
        <!--    /*for navtop stylings*/-->
        <link rel = "stylesheet" href="../css/mainPage.css">

	</head>
	<body>
    <?php

    $error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
    if ($error == "wrongPassword") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Credentials</div>";}

    $error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
    if ($error == "wrongUsername") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Credentials</div>";}

    $error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
    if ($error == "registered") {echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>REGISTRATION SUCCESSFUL:</strong>      You Can Now Login</div>";}

    include "functions.php";
    ?>
    <nav class="navtop">
        <div>
            <h1>Home Media Storage</h1>
            <a href="register.php"><i class="fa fa-registered"></i>To Register</a>
        </div>
    </nav>
    <div class="login">
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../javascript/for-alerts.js"></script>

    </body>
</html>