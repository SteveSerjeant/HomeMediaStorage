<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'homemediastorage';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// isset() function will check if the data exists.
if (!isset($_POST['type'], $_POST['title'], $_POST['location'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
//test statements
$type = $con -> real_escape_string($_POST["type"]);
$title = $con -> real_escape_string($_POST["title"]);
$location = $con -> real_escape_string($_POST["location"]);
$notes = $con -> real_escape_string($_POST["notes"]);

//echo $type;
//echo "<br>";
//echo $title;
//echo "<br>";
//echo $location;
//echo "<br>";
//echo $notes;
//echo "<br>";

if ($stmt = $con->prepare('INSERT INTO mediaDetails (typeID, title, location, notes) VALUES (?,?,?,?)')){
    $stmt->bind_param('isss', $type, $title, $location, $notes);
//    $stmt->bind_param('isss', $_POST['type'], $_POST['title'], $_POST['location'], $_POST['notes']);
    $stmt->execute();
    echo "success!";
    //success alert
    header('Location: addMedia.php?err=' . base64_encode("saved"));

}
else {
    echo "save failed";
}


//$stmt = $con->prepare('INSERT INTO mediadetails (typeID, title, location, notes) VALUES (?,?,?,?)')
