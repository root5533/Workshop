<?php

class OfficerController extends Controller {

    public function index() {
        if (isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'LO') {
                $this->view('template/head');
                $this->view('officer/side_bar');
                $this->view('template/top_bar');
                $this->view('officer/vehicle_entry');
            }
            else {
                $base = $GLOBALS['base_url'];
                header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Logistic%20Officer%20to%20continue");
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Logistic%20Officer%20to%20continue");
        }
    }

    public function load_view($view) {
        if (isset($_SESSION['user']) and $_SESSION['type'] == "LO") {
            $this->view('template/head');
            $this->view('officer/side_bar');
            $this->view('template/top_bar');

            if ($view == 'vehicle_entry') {
                $this->view('officer/vehicle_entry');
            }
            if ($view == 'vehicle_record_exit') {
                $this->view('officer/vehicle_record_exit');
            }
            else {
                $this->view('officer/vehicle_entry');
            }
        }
        else {
            $error['login_error'] = "Please login with Technical officer credentials to continue";
            $this->view('template/head');
            $this->view('login','',$error);
        }

    }


}