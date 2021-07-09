<!DOCTYPE HTML>

<?php

    session_start();    // Resuming an existing session based on username and password identifiers passed through a POST request

?>

<html>
    <head>
        <meta charset = "UTF-8">
        <title>Administrator Page</title>
        <style>
            table, td, th {
                            border-style: solid;
                            border-color: red;
                            color: purple;
                          }
        </style>
    </head>
    <body>
        <h2>Welcome, Administrator</h2>
        <table>
            <tbody>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
<?php

    $con = mysqli_connect("localhost", "root", "11121990bean", "lab2");    // Establishing a connection to the database

    if(! $con)
    {
        print("</tbody></table><p>Sorry, failed to connect to database</p>");
        print( mysqli_connect_error() );          // If the connection fails to take place, we close the table and leave a message for the user as well as print the
        print("</body></html>");                  // mysqli_connect_error function which returns a string description of the last connect error
        die();
    }                                             // We then use die() to terminate the current script

    $sql = "SELECT username, password from registered_users ORDER BY username ASC";
    $result = mysqli_query($con, $sql);          // Sending a select query to the database and places the resulting data into the $result variable

    while ($row = mysqli_fetch_row($result))    // Fetches one row of data from the result set and returns it as an enumerated array stored in $row
    {
        print("<tr><td>");
        print($row[0]);         // We then print the contents of the username and password columns
        print("</td><td>");     // from the database into a table for the Administrator
        print($row[1]);
        print("</td></tr>");
    }

    mysqli_close($con);    // Closes the connection to the database server that's associated with $con

?>

            </tbody>
        </table>
    </body>
</html>
