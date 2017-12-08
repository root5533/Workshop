<?php

class LoginController extends Controller {

    public function index() {
        $this->view('template/head');
        $this->view('login');
    }

    public function authenticate() {
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
                    return;
                }
                else {
                    $error['login_error'] = "Invalid username and password! Please try again";
                }

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