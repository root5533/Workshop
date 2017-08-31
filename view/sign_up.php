<?php
session_start();

?>

    <html>

    <head>
        <title>User Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

    </head>

    <body>

    <div class="container">

        <div class="content">

            <form action="signup_action.php" method="POST">

                <div>
                    <label>User Name</label><br/>
                    <input type="text" name="username"><br/>
                </div>

                <br>

                <div>
                    <label>Password</label><br/>
                    <input type="password" name="pwd"><br/><br/>

                </div>

                <br>

                <div>
                    <label>User Type</label><br/>
                    <input type="text" name="type">
                    <select>
                        <option>EN</option>
                        <option>SK</option>
                        <option>TO</option>
                        <option>SO</option>

                    </select>
                </div>

                <br/>
                <div>

                    <input type="submit" name="submit" value="Register">

                </div>

            </form>

        </div>

    </div>

    </body>

    </html>

