<?php

class LoginController extends Controller {

    public function index() {
        if(isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'SO') {
                $this->view('template/head');
                $this->view('system_operator/side_bar');
                $this->view('system_operator/top_bar');
                $this->view('system_operator/add_jobs');
            }
            if($_SESSION['type'] == 'EN') {
                $this->view('template/head');
                $this->view('engineer/side_bar');
                $this->view('engineer/top_bar');
                $this->view('engineer/view_jobs');
            }
            if($_SESSION['type'] == 'TO') {
                $this->view('template/head');
                $this->view('technical_officer/side_bar');
                $this->view('technical_officer/top_bar');
                $model = $this->model('JobModel');
                $result = $model->getAssignedJobs($_SESSION['user']);
                $data = array(
                    'table' => $result
                );
                $this->view('technical_officer/view_assigned_jobs',$data);
            }
            else {
                $this->view('template/head');
                $this->view('officer/side_bar');
                $this->view('template/top_bar');
                $this->view('officer/vehicle_entry');
            }
        }
        else {
            $this->view('template/head');
            $this->view('login');
        }

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
                    if ($type == "TO") {
                        header("location: $base/TOController");
                    }
                    if ($type == 'LO') {
                        header("location: $base/OfficerController");
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