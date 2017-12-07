<?php

class StockModel extends Controller {

    public function getStockItems() {
        $dbc = $this->db_connect();
        $query = "SELECT description,item_code FROM stock WHERE description LIKE '%" . $_POST['query'] . "%' OR item_code LIKE '%" . $_POST['query'] . "%'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

    public function getStockItemByCode() {
        $dbc = $this->db_connect();
        $query = "SELECT description,item_code,amount FROM stock WHERE item_code = '" . $_POST['query'] . "'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

    public function getStockAll() {
        $dbc = $this->db_connect();
        $query = "SELECT description,item_code,amount FROM stock";
        $result = mysqli_query($dbc,$query) or die($dbc);
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        $this->db_close($dbc);
        return $result;
    }

}