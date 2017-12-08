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

    public function addStockItemTableRows(){

        if(isset($_POST['add_rows'])){



            $rows = trim($_POST['rows']);

            $data = array('rows' => $rows);

            $this->view('engineer/head');
            $this->view('engineer/side_bar');
            $this->view('engineer/top_bar');
            $this->view('engineer/stock_request',$data,[]);

        }else{

            $this->view('engineer/head');
            $this->view('engineer/side_bar');
            $this->view('engineer/top_bar');
            $this->view('engineer/stock_request');

        }
    }

}