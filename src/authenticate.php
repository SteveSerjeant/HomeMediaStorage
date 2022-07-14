<?php
session_start();



//connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'homemediastorage';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// check if data was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {

    exit('Please fill both the username and password fields!');
}

// Prepare our SQL to help prevent SQL injection.
if ($stmt = $conn->prepare('SELECT userID, passCode FROM users WHERE userName = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userID, $passCode);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $passCode)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $userID;
            //echo 'Welcome ' . $_SESSION['name'] . '!';
            header('Location: mainPage.php');
        } else {
            // Incorrect password
            echo 'Incorrect username and/or PASSWORD!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect USERNAME and/or password!';
    }


    $stmt->close();
}
?>
