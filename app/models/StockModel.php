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

    public function checkStock($id) {
        $dbc = $this->db_connect();
        $query = "SELECT item_code FROM stock WHERE item_code='$id'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        if (mysqli_num_rows($result) > 0) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function insertJobStock($data) {
        $dbc = $this->db_connect();
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO jobstock VALUES('" . $data['id'] . "','" . $data['stock'] . "','" . $date . "','" . $data['amount'] . "',0)";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

        $subject = "New Stock Request for " . $data['stock'];
        $text = "Quantity : " . $data['amount'] . "<br>Job ID : " . $data['id'] ;
        $get = "/Controller/function/parameter";

        $comment_query = "INSERT INTO storecomments(comment_subject,comment_text,get_request) VALUES('$subject','$text','$get')";

        $result2 = mysqli_query($dbc,$comment_query) or die(mysqli_error($dbc));

        if ($result) {
            $state = 1; //successful insert -> 1
        }
        else {
            $state = 0; // unsuccessful result -> 2
        }
        $this->db_close($dbc);
        return $state;

    }

    public function getJobStock($id) {
        $dbc = $this->db_connect();
        $query = "SELECT * FROM jobstock WHERE job_id = '$id'";
        $result = mysqli_query($dbc,$query);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
        }
        else {
            $data = null;
        }
        return $data;
    }

    public function checkStockReceived($id) {
        $dbc = $this->db_connect();
        $query = "SELECT stock_id,amount FROM jobstock WHERE job_id='$id' AND issue=0";
        $result = mysqli_query($dbc,$query);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
        }
        else {
            $data = 1;
        }
        return $data;
    }

}