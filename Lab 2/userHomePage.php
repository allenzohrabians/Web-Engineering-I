<!DOCTYPE HTML>

<?php

    session_start();    // Resuming an existing session based on username and password identifiers passed through a POST request

?>

<html>
    <head>
        <meta charset = "UTF-8">
        <title>User Home Page</title>

        <style>


            .red    {
                      background-color: red;
                    }

            .green  {
                      background-color: green;
                    }

            .blue   {
                      background-color: blue;
                    }

            .yellow {
                      background-color: yellow;
                    }

            .purple {
                      background-color: purple;
                    }
        </style>
        <script type = "text/javascript">
            var currentBackground = 0;    // Global variables to represent the body of the page, the button that will generate up to five different background colors, and a variable
            var colorBtn;                 // set to 0 that will increment up to 5 for each background color change and then reset to 0 once the default background is restored
            var body;

            function buttonClicked()    // Called once the color change button is clicked
            {
                if(currentBackground == 0)
                {
                    body.classList.add("red");    // If the button is clicked while the default background is present then we add the attributes of the red class,
                    currentBackground = 1;        // setting the background to red and then reassigning the currentBackground variable to 1
                }
                else if(currentBackground == 1)
                {
                    body.classList.add("green");   // Else, if the button is clicked while the red background is present then we add the attributes of the green class
                    body.classList.remove("red");  // while removing the attributes of the red class, and then reassign the currentBackground variable to 2
                    currentBackground = 2;
                }
                else if(currentBackground == 2)
                {
                    body.classList.add("blue");     // Else, if the button is clicked while the green background is present then we add the attributes of the blue class
                    body.classList.remove("green"); // while removing the attributes of the green class, and then reassign the currentBackground variable to 3
                    currentBackground = 3;
                }
                else if(currentBackground == 3)
                {
                    body.classList.add("yellow");   // Else, if the button is clicked while the blue background is present then we add the attributes of the yellow class
                    body.classList.remove("blue");  // while removing the attributes of the blue class, and then reassign the currentBackground variable to 4
                    currentBackground = 4;
                }
                else if(currentBackground == 4)
                {
                    body.classList.add("purple");     // Else, if the button is clicked while the yellow background is present then we add the attributes of the purple class
                    body.classList.remove("yellow");  // while removing the attributes of the yellow class, and then reassign the currentBackground variable to 5
                    currentBackground = 5;
                }
                else if(currentBackground == 5)
                {
                    body.classList.remove("purple");  // Else, if the button is clicked while the purple background is present then we remove the attributes of the purple class
                    currentBackground = 0;            // and set the currentBackground variable to 0, restoring the default background color
                }

            }

            function init()   // The initial function is called when the window loads
            {
                colorBtn = document.getElementById("colorBtn");   // getElementById() retrieves an element with an ID that is identical
                body = document.getElementById("body");           // to the specified string and assigns it to an appropriately named variable

                colorBtn.addEventListener("click", buttonClicked);    	// Calls the buttonClicked function once the color change button is clicked
            }

            window.addEventListener("load", init);    // Executes once the full page comprised of the html and css has loaded

        </script>
    </head>
    <body id = "body">
        <h1>Welcome <?php echo $_SESSION["username"]; ?> </h1>    <!-- A welcome message with the use of a $_SESSION variable to display the logged in username.-->

        <br><br><br>

        <input id = "colorBtn" type = "button" value = "Change Color">

        <br><br><br>

        <a href = "lab2.php"> LOGOUT</a>
    </body>
</html>
