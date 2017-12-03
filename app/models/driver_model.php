<?php

class Driver_Model extends Controller {

    public function insert($data) {
        $dbc = $this->db_connect();
        //check for existing driver
        $query = "select * from driver where nic='" . $data['nic'] . "' limit 1";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        if (mysqli_num_rows($result) > 0) {
            $result = 0; //existing driver -> 0
            return $result;
        }
        else {
            $query = "insert into driver(name,nic,license,address,contact)" .
                "values('" . $data['name'] . "', '" . $data['nic'] . "', '" . $data['license'] . "', '" . $data['address'] . "', '" . $data['contact'] . "')";
            $result = mysqli_query($dbc, $query);
            if ($result) {
                $state = 1; //successful insert -> 1
            }
            else {
                $state = 2; // unsuccessful result -> 2
            }
            return $state;
            $this->db_close($dbc);
        }
    }




}