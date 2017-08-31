<?php

session_start();

?>


<html>

<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>

<body>

<div class="container">

    <div class="content">

        <form action="login_action.php" method="POST">

            <div>
                <label>User Name</label><br/>
                <input type="text" name="username" ><br/>
            </div>

            <br/>

            <div>
                <label>Password</label><br/>
                <input type="password" name="password"><br/>
            </div>

            <br>

            <div>
                <td><input type="submit" name="submit" value="Log In">
            </div>

        </form>



</body>



</html>