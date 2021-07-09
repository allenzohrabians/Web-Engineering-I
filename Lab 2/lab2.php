<!DOCTYPE HTML>

<?php

    session_start();    // Starting a new session based on username and password identifiers passed through a POST request

?>

<html>
    <head>
        <meta charset = "UTF-8">
        <title>Login and Registration Page</title>

        <style>
            body  {
                    background-size:cover;
                    background-position: center;
                  }

            #loginDiv {
                        max-width: 700px;
                        float: none;
                        margin: 150px auto;
                      }

            #registerDiv  {
                            max-width: 700px;
                            float: none;
                            margin: 150px auto;
                          }
        </style>

        <script type = "text/javascript">

            var regAlert = '<?php echo $_SESSION["registrationMessage"];?>'     // Global variables storing the values of the $_SESSION superglobals for
            var invalidLogin = '<?php echo $_SESSION["invalidLogin"];?>'        // alert messages directed to the user upon attempts to login or register

            if(regAlert != "")
            {
                alert(regAlert);
                <?php
                    $_SESSION["registrationMessage"] = "";          // If the registration alert variable is not empty and contains either of the values that indicate success
                ?>                                                  // or failure, then we send that alert to the user and then set that session variable to empty
            }

            if(invalidLogin != "")
            {
                alert(invalidLogin);
                <?php
                    $_SESSION["invalidLogin"] = "";               // If the invalid login variable is not empty and contains the invalid login message, then we send that alert
                ?>                                                // to the user and then set that session variable to empty
            }

        </script>

    </head>
    <body>
        <div id = "loginDiv">
            <h2>User Login</h2>
            <form method = "post" action = "loginValidation.php">

                <label>Username:</label>
                <input type = "text" name = "username" class = "form-control" required>

                <br><br><br>

                <label>Password:</label>
                <input type = "password" name = "password" class = "form-control" required>

                <br><br><br>

                <button id = "loginButton" type = "submit">Login</button>

            </form>
        </div>

        <div id = "registerDiv">
            <h2>Registration</h2>
            <form method = "post" action = "registrationValidation.php">

                <label>Username:</label>
                <input type = "text" name = "username" class = "form-control" required>

                <br><br><br>

                <label>Password:</label>
                <input type = "password" name = "password" class = "form-control" required>

                <br><br><br>

                <button id = "registerButton" type = "submit">Register</button>

            </form>
        </div>
    </body>
</html>
