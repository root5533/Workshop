<?php

class DriverModel extends Controller {

    public function driverInsert($data) {
        $dbc = $this->db_connect();

        $query = "insert into driver(driver_name,driver_nic,license_no,address,contact_no)" .
            "values('" . $data['name'] . "', '" . $data['nic'] . "', '" . $data['license_no'] . "', '" . $data['address'] . "', '" . $data['contact_no'] . "')";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        if ($result) {
            $state = 1; //successful insert -> 1
        }
        else {
            $state = 2; // unsuccessful result -> 2
        }
        return $state;
        $this->db_close($dbc);


    }

    public function getDriverNames() {
        $dbc = $this->db_connect();
        $query = "SELECT driver_name FROM driver WHERE driver_name LIKE '%" . $_POST['query'] . "%'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

    public function getDriverNameFromReg() {
        $dbc = $this->db_connect();
        $query = "SELECT driver.driver_name FROM driver,vehicle WHERE driver.id = vehicle.id_driver AND vehicle.registration_no = '" . $_POST['query'] . "'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

}