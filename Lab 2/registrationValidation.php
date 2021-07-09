<?php

    session_start();    // Resuming an existing session based on username and password identifiers passed through a POST request.

    $con = mysqli_connect("localhost", "root", "11121990bean", "lab2");   // Establishing a connection to the database.

    if($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);   // If connection fails, we present a message of the occurrence and the
    }                                                       // last connect error then terminate the current script

    $username = $_POST["username"];    // Submitted form data using the post method that are stored in $_POST superglobals are then assigned to their own respective variables
    $password = $_POST["password"];

    $_SESSION["username"] = $username;  // These variables are then assigned to their own $_SESSION superglobals
    $_SESSION["password"] = $password;

    $q1 = "SELECT * FROM registered_users WHERE username = '$username'";    // Sending a selection query to the database and places the resulting data into the $result variable

    $result = mysqli_query($con, $q1);

    $num = mysqli_num_rows($result);    // Gets the number of rows in a result and stores it in the variable $num.

    if($num >= 1)
    {
        $_SESSION["registrationMessage"] = "Sorry, username already taken.";    // If the number of rows in a result are greater than or equal to 1 (indicating that the username is already taken)
        header("location: lab2.php");                                           // we store a message in a $_SESSION variable to be displayed as an alert to that user and we relocate to the same page
    }
    else
    {
        $q2 = "INSERT INTO registered_users (username, password) VALUES ('" . $username . "','" . $password . "')";   // Else, we send an insert query to the database
        if($con->query($q2) === TRUE)
        {
            $_SESSION["registrationMessage"] = "You have successfully registered.";       // If that query connects with the database and is successful, we store a message in a $_SESSION variable
            header("Location: lab2.php");                                                 // to be displayed as an alert to that user and we relocate to the same page
        }
        else
        {
            header("Location: lab2.php");   // Else, we still relocate to the same page
        }

    }

    mysqli_close($con);   // Closes the connection to the database server that's associated with $con
?>
