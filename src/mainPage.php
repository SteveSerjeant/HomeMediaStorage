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

//while ($res = mysqli_fetch_array($result))
//{
//    $mediaID = $res['MediaID'];
//    $typeID = $res['typeID'];
//    $title = $res['title'];
//    $location = $res['location'];
//    $notes = $res['notes'];
//
//}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel = "stylesheet" href="../css/mainPage.css">
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">-->

<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>-->

<!--    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<!--    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">-->
<!--    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>-->
<!--    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->

</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Home Media Storage</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Home Page</h2>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
<!--    <br>-->
<!--    <p>ID: --><?//=$_SESSION['id']?><!--.</p>-->

    <div class = "wrapper">
        <div class="container-fluid">

            <div class = "row">
                <table id="output" style="width: 100%; height: 20%; text-align: center">
                    <colgroup>
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 50%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 35%">
                    </colgroup>

                    <tr bgcolor="#afeeee" style="text-align: center">
                        <td style='text-align: center'>mediaID</td>
                        <td style='text-align: center'>typeID</td>
                        <td style='text-align: center'>Title</td>
                        <td style='text-align: center'>Location</td>
                        <td style='text-align: center'>Notes</td>
                    </tr>
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
                </table>
            </div>
        </div>
    </div>
</div>
<!--show main media list-->
<?php
//$sql = 'SELECT * FROM mediaDetails';
//$stmt = $conn->prepare($sql);
//$stmt->execute();
//$result = $stmt->get_result();
//
//if ($result->num_rows > 0){
//    while ($row = $result->fetch_assoc())
//    {
//        echo '<option value="' . $row["mediaID"] . '">' . $row["title"] . '</option>';
//    }
//}


?>
<!--<script src="../javascript/tablePages.js"></script>-->
<script>
    $(document).ready(function () {
        $('#output').dataTable();
    })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
</body>
</html>
