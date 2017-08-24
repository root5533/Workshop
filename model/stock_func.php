<?php

    include "connect.php";

    //get stock item codes to data list
    function getStockItemCode($conn) {
        $query = "select stock_item_code,stock_item_description from stock";
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

        while ($row = mysqli_fetch_array($result)) {
            $item_code = $row['stock_item_code'];
            $description = $row['stock_item_description'];
            echo "<option value='$item_code'>$description</option>";
        }
    }

    //send the stock request
    function sendStockRequest($array,$conn) {
        $id_stock_request_item = $_POST['item_code'];
        $stock_request_item_amount = $_POST['amount'];
        $request_description = $_POST['description'];
        $job_entry_id = $_POST['job_id'];


        $query1 = "insert into job_entry_has_stock_request(job_entry_id) values('$job_entry_id')";
        $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
        $query2 = "select stock_request_id from job_entry_has_stock_request where job_entry_id='$job_entry_id'";
        $result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result2)) {
            $id_stock_request = $row['stock_request_id'];
        }
        $query3 = "insert into stock_request(id_stock_request,id_stock_request_item,stock_request_item_amount,request_description) values('$id_stock_request','$id_stock_request_item','$stock_request_item_amount','$request_description')";
        $result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));

    }


?>