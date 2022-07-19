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

?>

<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <title>Home Page</title>

    <meta name="description" content="Bootstrap.">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body style="margin: 20px auto">
<div class="container">
    <div class="row header" style="text-align: center ; color:green">
        <h3>Media in Library</h3>
    </div>
    <table id="myTable" class="table table-striped">
        <thead>
        <tr>
            <th>Media ID</th>
            <th>Type ID</th>
            <th>Title</th>
            <th>Location</th>
            <th>Notes</th>
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

</body>



</html>
