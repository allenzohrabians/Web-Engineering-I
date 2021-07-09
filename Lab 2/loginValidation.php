<?php

    session_start();    // Resuming an existing session based on username and password identifiers passed through a POST request

    $con = mysqli_connect("localhost", "root", "11121990bean");   // Establishing a connection to the database

    mysqli_select_db($con, "lab2");

    $username = $_POST["username"];   // Submitted form data using the post method that are stored in $_POST superglobals are then assigned to their own respective variables
    $password = $_POST["password"];

    $_SESSION["username"] = $username;    // These variables are then assigned to their own $_SESSION superglobals
    $_SESSION["password"] = $password;

    if($username == "Administrator" && $password == "asdfdsa")    // If the username and password match that of the Administrator
    {                                                             // we relocate to the specific admin page
        header("location: adminPage.php");
    }
    else
    {

        $sql = "SELECT * FROM registered_users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $sql);   // Else, we perform a select query to the database and store the resulting data into the $result variable

        $num = mysqli_num_rows($result);      // Gets the number of rows in a result and stores it in the variable $num

        if($num >= 1)
        {
            header("location: userHomePage.php");   // If the number of rows in a result are greater than or equal to 1 (indicating that the user entered a
        }                                           // username and password that match a listing in the database), we relocate to the user's home page
        else
        {
            $_SESSION["invalidLogin"] = "Sorry, you have entered an invalid username and/or password";    // Else, the username and/or password entries were invalid so we store a message in a $_SESSION variable
            header("location: lab2.php");                                                                 // to be displayed as an alert to that user and we relocate to the same page
        }

    }

    mysqli_close($con);   // Closes the connection to the database server that's associated with $con
?>
