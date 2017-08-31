<?php

session_start();

include '../model/dbconnect.php';
$dbc = openDB();

if(isset($_POST['submit'])) {



    $username = mysqli_real_escape_string($dbc, $_POST['username']);
    $password = mysqli_real_escape_string($dbc, $_POST['password']);


    //error handlers
    // check input are empty

    if (empty($password) || empty($username)) {
        header("location:login.php?login=empty");
        exit();

    } else {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($dbc, $sql);
        $resultcheck = mysqli_num_rows($result);

        if ($resultcheck < 1) {
            header("location:login.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //de-hashing the password
                $hashedpwdcheck = password_verify($password, $row['password']);

                if ($hashedpwdcheck == false) {
                    header("location:login.php?login=error");
                    exit();

                } elseif ($hashedpwdcheck == true) {
                    //log in the user here
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];

                    if ($row['user_type'] == 'admin') {
                        header("location:jobEntry.php");
                    }
                    if ($row['user_type'] == 'EN') {
                        header("location:vehicleEntry.php");
                    }

                    if ($row['user_type'] == 'SK') {
                        header("location:stockRequest.php");
                    }

                    if ($row['user_type'] == 'TO') {
                        header("location:stockrequest.php");
                    }

                    if ($row['user_type'] == 'SO') {
                        header("location:maintenance.php");
                    }
                }
            }
        }
    }
}else{
    header("location:login.php");
    exit();
}

?>