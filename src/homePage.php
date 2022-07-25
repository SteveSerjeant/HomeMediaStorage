<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include_once ("dbconn.php");

$result = mysqli_query($conn, "SELECT * FROM mediaDetails");
$mediatypes = mysqli_query($conn, "SELECT * FROM mediaTypes");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel = "stylesheet" href="../css/mainPage.css">

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>

<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Home Media Storage</h1>
        <a href="addMedia.php"><i class="fa fa-plus-square"></i>Add to Library</a>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

</nav>
<div class="container">

    <div class="row header" style="text-align: center ; color:black">
        <h3>Media in Library</h3>
    </div>
    <table id="myTable" class="table table-striped">
        <thead>
        <tr>
            <th width="9%">Media ID</th>
            <th width="8%">Type ID</th>
            <th width="57%">Title</th>
            <th width="10%">Location</th>
            <th width="30%">Notes</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            while($res = mysqli_fetch_array($result)) {
                echo "<tr style='text-align: center'>";
                echo "<td bgcolor='' style='text-align: center'>".$res['mediaID']."</td>";
                echo "<td style='text-align: center'>".$res['typeID']."</td>";
                echo "<td style='text-align: left'>".$res['title']."</td>";
                echo "<td style='text-align: center'>".$res['location']."</td>";
                echo "<td style='text-align: left'>".$res['notes']."</td>";

            }

            ?>

        </tr>

        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#myTable').dataTable();
        });

    </script>

</div>

<div class="container">

    <div class="row header" style="text-align: left ; color:black">
        <h3>Media Types</h3>
    </div>
    <table class="table table-striped" style="width: 25%">
        <thead>
        <tr>
            <th style="text-align: center">Type ID</th>
            <th>Description</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            while($res = mysqli_fetch_array($mediatypes)) {
                echo "<tr style='text-align: center'>";
                echo "<td bgcolor='' style='text-align: center'>".$res['ID']."</td>";
                echo "<td style='text-align: left'>".$res['description']."</td>";


            }

            ?>

        </tr>

        </tbody>
    </table>

</div>

</body>
</html>