<?php
/**
 * Created by PhpStorm.
 * User: tuanamith
 * Date: 10/7/17
 * Time: 11:00 AM
 */

class home extends Controller
{

    public function index() {
        if (isset($_SESSION['user'])) {
            $base = $GLOBALS['base_url'];
            if ($_SESSION['type'] == "SO") {
                header("location: $base/home/load_view/job");
                return;
            }
            if ($_SESSION['type'] == "EN") {
                header("location: $base/home/load_view/assign");
                return;
            }
        }
        $this->view('template/head');
        $this->view('login');
    }

    public function load_view($view) {
        if($view == 'job') {
            if (@$_SESSION['type'] != 'SO') {
                $error['login_error'] = "Please login as a System Operator to continue";
                $this->loginForm($error);
            }
            else {
                $this->view('template/head');
                $this->view('template/side_bar');
                $this->view('template/top_bar');
                $this->view('SO/job');
            }

        }
        if ($view == 'assign') {
            if (@$_SESSION['type'] != 'EN') {
                $error['login_error'] = "Please login as a Engineer to continue";
                $this->loginForm($error);
            }
            else {
                $this->view('template/head');
                $this->view('template/side_bar');
                $this->view('template/top_bar');
                $this->view('EN/assign');
            }
        }
    }

    private function loginForm($error) {
        $this->view('template/head');
        $this->view('login','',$error);
    }

}