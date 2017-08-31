<?php
include_once '../model/dbconnect.php';

$dbc = openDB();

if(isset($_POST['submit'])){



    $username=mysqli_real_escape_string($dbc, $_POST['username']);
    $password=mysqli_real_escape_string($dbc, $_POST['pwd']);
    $type=mysqli_real_escape_string($dbc, $_POST['type']);

    //Error handlers
    //check for empty fields

    if(empty($username) || empty($password)){
        header("location:sign_up.php?sign_up=user name or password empty");
        exit();

    }else{
        //check if input characters valid
        if(!preg_match("/^[a-zA-Z]*$/",$username)){
            header("location:sign_up.php?sign_up=invalid letters");
            exit();

        }else{
            $sql="SELECT * FROM user WHERE username='$username'";
            $result=mysqli_query($dbc, $sql);
            $resultcheck=mysqli_num_rows($result);

            if($resultcheck > 0){
                header("location:sign_up.php?sign_up-user name not found");
                exit();

            }else{
                //hashing the password
                $hashedpwd=password_hash($password, PASSWORD_DEFAULT);

                //insert the user into database

                $sql="INSERT INTO user (username, password,user_type) VALUES ('$username', '$hashedpwd','$type');";
                mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
                header("location:sign_up.php");
                exit();

            }

        }

    }




}else{
    header("location:login.php");
    exit();
}

?>


