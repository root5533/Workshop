<?php
/**
 * Created by PhpStorm.
 * User: Dineth Kariyawasam
 * Date: 12/9/2017
 * Time: 6:14 AM
 */

class TOController extends Controller{

    public function index()
    {
        if (isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'TO') {
                $this->load_view('view_assigned_jobs');
            }
            else {
                $base = $GLOBALS['base_url'];
                header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Technical%20officer%20to%20continue");
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Technical%20officer%20to%20continue");
        }

    }

    public function load_view($view)
    {
        if (isset($_SESSION['user']) and $_SESSION['type'] == "TO") {
            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');

            if ($view == 'view_assigned_jobs') {
                $model = $this->model('JobModel');
                $result = $model->getAssignedJobs($_SESSION['user']);
                $data = array(
                    'table' => $result
                );
                $this->view('technical_officer/view_assigned_jobs',$data);
            }
            else {
                $this->view('technical_officer/close_jobs');
            }
        }
        else {
            $error['login_error'] = "Please login with Technical officer credentials to continue";
            $this->view('template/head');
            $this->view('login','',$error);
        }

    }

}