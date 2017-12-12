<?php

class StockController extends Controller {

    public function getStockAuto() {
        if (isset($_POST['query'])) {
            $model = $this->model('StockModel');
            $result = $model->getStockItems();
            $output = "<ul class='w3-ul w3-hoverable'>";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<li>' . $row['description'] . " : " . $row['item_code'] . "</li>";
                }
            }
            else {
                $output .= "<li><i>No items match</i></li>";
            }
            $output .= "</ul>";
            echo $output;
        }
    }

    public function getStockItem() {
        if (isset($_POST['query'])) {
            $model = $this->model('StockModel');
            $result = $model->getStockItemByCode();
            $row = mysqli_fetch_array($result);
            $output = 
                "<div class='w3-quarter w3-container'>
                    <header class='w3-container w3-blue'>
                        <h1> " . $row['amount'] . " <span style='font-size: small'>Available</span> </h1>
                    </header>
                    <div class='w3-container w3-light-grey'>
                        <h5>" . $row['description'] . " : " . $row['item_code'] . "</h5>
                    </div>
                </div>";
            echo $output;
        }
    }

    public function stock_request_view($job_id,$stock='',$amount='',$error=[]) {
        $model = $this->model('JobModel');
        $result = $model->getJobDetails($job_id);
        $model2 = $this->model('StockModel');
        $result2 = $model2->getJobStock($job_id);
        $row = mysqli_fetch_array($result);
        $msg = '';
        $display = '';
//        if ($state == 1) {
//            $display = "There was a problem in making the request";
//        }
        if ($stock != '' AND $amount != '') {
            $msg = 'ok';
        }
        $data = array(
            'vehicle' => $row['registration_no'],
            'driver' => $row['name'],
            'description' => $row['description'],
            'date' => $row['date'],
            'id' => $job_id,
            'supervisor' => $row['supervisor'],
            'message' => $msg,
            'stock' => $stock,
            'amount' => $amount,
            'display' => $display,
            'requested' => $result2
        );

        $this->view('template/head');
        $this->view('engineer/side_bar');
        $this->view('engineer/top_bar');
        $this->view('engineer/stock_request',$data,$error);

    }

    public function addStockItem(){
        if(isset($_POST['submit'])) {
            $stock = trim($_POST['stock']);
            $amount = trim($_POST['amount']);
            $id = $_POST['jobid'];
            $stock_id = substr($stock,-5);
            if (empty($amount) or $amount <= 0) {
                $error['amount'] = "*Please insert an amount greater than 0";
            }
            $model = $this->model('StockModel');
            $result = $model->checkStock($stock_id);
            if ($result == 0 or empty($stock)) {
                $error['stock'] = "*Please insert a valid stock item $stock_id";
            }

            if (isset($error) == FALSE) {
                $this->stock_request_view($id,$stock,$amount);
            }
            else {
                $this->stock_request_view($id,'','',$error);
            }
        }
        else {
            header('location: ' . $GLOBALS['base_url'] . '/ENController/load_view/stock_view_jobs');
        }
    }

    public function insertStockRequest() {
        if(isset($_POST['submit'])) {
            $data = array(
                'stock' => substr(trim($_POST['stock']),-5),
                'amount' => trim($_POST['amount']),
                'id' => $_POST['id']
            );
            $model = $this->model('StockModel');
            $result = $model->insertJobStock($data);
            $id = $data['id'];
            $this->stock_request_view($id);
        }
        else {
            header('location: ' . $GLOBALS['base_url'] . '/ENController/load_view/stock_view_jobs');
        }
    }

    public function checkJobStock($id){

        $model = $this->model('StockModel');
        $result = $model->getJobStockAvailability($id);
        $data = array(
            'id' => $id,
            'jobstock' => $result
        );
        $this->view('store_keeper/head');
        $this->view('store_keeper/side_bar');
        $this->view('store_keeper/top_bar');
        $this->view('store_keeper/stock_issue_view',$data);

    }

    public function updateStock($id){

        $model = $this->model('StockModel');
        $resultUpdate = $model->updateStock($id);

//        if($result==1){
//            $data = array('display' => 'Stock issue complete!');
//        } elseif ($result==2){
//            $data = array('display' => 'Problem updating stock database!');
//        }

        $this->view('store_keeper/head');
        $this->view('store_keeper/side_bar');
        $this->view('store_keeper/top_bar');
        $model = $this->model('StockModel');
        $result = $model->getLimitedStock();
        $this->view('store_keeper/view_stock',$result);
    }

}