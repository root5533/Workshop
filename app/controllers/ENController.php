<?php

class ENController extends Controller {

    public function index() {
        if (isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'EN') {
                $data = $this->getStock();
                $this->view('template/head');
                $this->view('engineer/side_bar');
                $this->view('engineer/top_bar');
                $this->view('engineer/view_stock',$data);
            }
            else {
                $base = $GLOBALS['base_url'];
                header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Engineer%20to%20continue");
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Engineer%20to%20continue");
        }
//        $this->view('template/head');
//        $this->view('template/side_bar');
//        $this->view('template/top_bar');
//        $this->view('EN/assign');
    }

    public function load_view($view) {

        if (isset($_SESSION['user']) and $_SESSION['type'] == "EN") {
            $this->view('template/head');
            $this->view('engineer/side_bar');
            $this->view('engineer/top_bar');
            if ($view == "view_stock") {
                $data = $this->getStock();
                $this->view('engineer/view_stock', $data);
            }
            else if($view == "stock_request") {
                $this->view('engineer/stock_request');
            }
            else if($view == 'view_jobs') {
                $this->view('engineer/view_jobs');
            }
            else if($view == 'stock_view_jobs') {
                $this->view('engineer/stock_view_jobs');
            }
            else if($view == 'view_job_progress') {
                $this->view('engineer/view_job_progress');
            }
            else if($view == 'jobstatus_view') {
                $this->jobstatus_view();
            }
            else {
                $data = $this->getStock();
                $this->view('engineer/view_stock', $data);
            }
        }
        else {
            $error['login_error'] = "Please login with engineer credentials to continue";
            $this->view('template/head');
            $this->view('login','',$error);
        }
    }

    private function getStock() {
        $model = $this->model('StockModel');
        $result = $model->getStockAll();
        return $result;
    }

    public function jobstatus_view()
    {

        $model = $this->model('JobModel');
        $result1=$model-> status_view1();
        $result2=$model-> status_view2();
        $result3=$model-> status_view3();
        $result4=$model-> status_view4();
        $data = array(
            'table1' =>$result1,
            'table2'=>$result2,
            'table3'=>$result3,
            'table4'=>$result4
        );

        $this->view('engineer/head');
        $this->view('engineer/side_bar');
        $this->view('engineer/top_bar');
        $this->view('engineer/jobstatus_view',$data,[]);


    }



}