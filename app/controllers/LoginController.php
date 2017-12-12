<?php

class LoginController extends Controller {

    public function index() {
        if(isset($_SESSION['user'])) {
            $base = $GLOBALS['base_url'];
            if($_SESSION['type'] == 'SO') {
                header("location: ".$GLOBALS['base_url']."/SOController/");

            }
            if($_SESSION['type'] == 'EN') {
                header("location: $base/ENController");

            }
            if($_SESSION['type'] == 'TO') {
                header("location: $base/TOController");

            }
            if($_SESSION['type'] == 'LO') {
                header("location: $base/OfficerController");
            }
            if($_SESSION['type'] == 'SK') {
                header("location: $base/SKController");
            }
//            var_dump($_SESSION);
        }
        else {
            $this->view('template/head');
            $this->view('login');
        }

    }

    public function authenticate() {
//        var_dump($_SESSION);
        if (isset($_POST['submit'])) {
            if (empty(trim($_POST['user'])) or empty(trim($_POST['pwd']))) {
                $error['login_error'] = "Please enter your username and password";
            }
            else {
                $username = $_POST['user'];
                $password = $_POST['pwd'];
                $db = $this->db_connect();
                $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
                $result = mysqli_query($db,$query);
                if(mysqli_num_rows($result) > 0) {
                    $row = $result->fetch_assoc();
                    $type = $row['type'];
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['type'] = $type;
                    $base = $GLOBALS['base_url'];
                    if ($type == "SO") {
                        header("location: $base/SOController/");
                    }
                    if ($type == "EN") {
                        header("location: $base/ENController");
                    }
                    if ($type == "TO") {
                        header("location: $base/TOController");
                    }
                    if ($type == 'LO') {
                        header("location: $base/OfficerController");
                    }
                    if ($type == 'SK') {
                        header("location: $base/SKController");
                    }
                    return;
                }
                else {
                    $error['login_error'] = "Invalid username and password! Please try again";
                }
                var_dump($_SESSION);

            }
            $this->view('template/head');
            $this->view('login','',$error);

        }
        else {
            $this->view('template/head');
            $this->view('login');
        }

    }

    public function signout() {
        session_destroy();
        $base = $GLOBALS['base_url'];
        header("location: $base/LoginController/authenticate");
    }


}