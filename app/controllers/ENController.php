<?php

class ENController extends Controller {

    public function index() {
        $data = $this->getStock();
        $this->view('template/head');
        $this->view('engineer/side_bar');
        $this->view('engineer/top_bar');
        $this->view('engineer/view_stock',$data);
    }

    public function load_view($view) {
        $this->view('template/head');
        $this->view('engineer/side_bar');
        $this->view('engineer/top_bar');
        if ($view == "view_stock") {
            $data = $this->getStock();
            $this->view('engineer/view_stock',$data);
        }
        else {
            $data = $this->getStock();
            $this->view('engineer/view_stock',$data);
        }
    }

    private function getStock() {
        $model = $this->model('StockModel');
        $result = $model->getStockAll();
        return $result;
    }



}