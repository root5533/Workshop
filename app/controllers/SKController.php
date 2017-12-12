<?php
/**
 * Created by PhpStorm.
 * User: Dineth Kariyawasam
 * Date: 12/9/2017
 * Time: 5:41 AM
 */

class SKController extends Controller{

    public function index()
    {
        if (isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'SK') {
                $this->view('template/head');
                $this->view('store_keeper/side_bar');
                $this->view('store_keeper/top_bar');
                $model = $this->model('StockModel');
                $result = $model->getLimitedStock();
                $this->view('store_keeper/view_stock',$result);
            }
            else {
                $base = $GLOBALS['base_url'];
                header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Store%20Keeper%20to%20continue");
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Store%20Keeper%20to%20continue");
        }

    }

    public function load_view($view)
    {
        if (isset($_SESSION['user']) and $_SESSION['type'] == "SK") {
            $this->view('template/head');
            $this->view('store_keeper/side_bar');
            $this->view('store_keeper/top_bar');

            if ($view == 'view_stock') {
                $model = $this->model('StockModel');
                $result = $model->getLimitedStock();
                $this->view('store_keeper/view_stock',$result,[]);
            }
            elseif ($view == 'stock_issue'){
                $model = $this->model('JobModel');
                $result = $model->getAllAssignedJobs();
                $this->view('store_keeper/stock_issue',$result,[]);
            }
            elseif ($view == 'requisitions'){
                $this->view('store_keeper/requisitions');
            }
            else {
                $model = $this->model('StockModel');
                $result = $model->getLimitedStock();
                $this->view('store_keeper/view_stock',$result);
            }
        }
        else {
            $error['login_error'] = "Please login with Store keeper credentials to continue";
            $this->view('template/head');
            $this->view('login','',$error);
        }

    }

}