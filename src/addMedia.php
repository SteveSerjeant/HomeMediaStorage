<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include_once ("dbconn.php");

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "saved") {echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>SUCCESS:</strong>      Entry Saved</div>";}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/addMedia.css" type="text/css">
    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel = "stylesheet" href="../css/mainPage.css">

</head>

<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Home Media Storage</h1>
        <a href="homePage.php"><i class="fas fa-arrow-left"></i>Back</a>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2 style="text-align: center">Add to Library</h2>
</div>

<div class="register">
    <h1>Add to Library</h1>
    <form action="saveMedia.php" method="post" autocomplete="off">

        <label for="type">
            <i class="fas fa-id-card"></i>
        </label>
        <select id="selecttype" type="text" name="type"style="width: 310px; height: 50px;">
            <option value = "1">DVD Film</option>
            <option value = "2">DVD Boxset</option>
            <option value = "3">CD Single</option>
            <option value = "4">CD Album</option>
            <option value = "5">CD Boxset</option>
            <option value = "6">LP</option>
            <option value = "7">7" Single</option>
            <option value = "8">7" Double A</option>
            <option value = "9">7" EP</option>
            <option value = "10">12"</option>
        </select>


        <label for="title">
            <i class="fa fa-file"></i>
        </label>
        <input type="text" name="title" placeholder="Title" id="title" required>

        <label for="location">
            <i class="fa fa-map-marker"></i>
        </label>
        <input type="text" name="location" placeholder="Location" id="location" required>

        <label for="notes">
            <i class="fa fa-info"></i>
        </label>
        <input type="text" name="notes" placeholder="Notes" id="notes">

        <input type="submit" value="Save">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="../javascript/for-alerts.js"></script>

</body>
