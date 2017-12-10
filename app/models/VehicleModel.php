<?php


class VehicleModel extends Controller {

    public function so_insert($data) {
        $dbc = $this->db_connect();
        //check for existing driver
        $string = $data['id_driver'];
        $query1 = "SELECT * FROM driver WHERE name LIKE '%$string%' LIMIT 5";
        $result1 = mysqli_query($dbc, $query1) or die(mysqli_error($dbc));
        if (mysqli_num_rows($result1) == 1) {
            while ($row = mysqli_fetch_array($result1)){
                $id = $row['id'];
            }
            $query = "insert into vehicle(id_driver,type,brand,registration_no)" .
                "values('" . $id . "', '" . $data['type'] . "', '" . $data['brand'] . "', '" . $data['id_vehicle'] . "')";
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
        else {
            if(mysqli_num_rows($result1) == 0){
                $state = 3; //driver does not exist -> 3
            }
            elseif (mysqli_num_rows($result1)>0){
//                $state = 4;
                $query2 = "SELECT name FROM driver WHERE name LIKE '%$string%' LIMIT 5";
                $result2 = mysqli_query($dbc, $query2) or die(mysqli_error($dbc));
                $result = mysqli_fetch_array($result2);
                return $result;
                $this->db_close($dbc);
            }
            return $state;
            $this->db_close($dbc);
        }
    }

    public function so_insert_vehicle_entry($data){
        $dbc = $this->db_connect();
        //check for existing vehicle
        $query2 = "select * from Vehicle where registration_no='" . $data['id_vehicle'] . "' limit 1";
        $result2 = mysqli_query($dbc, $query2) or die(mysqli_error($dbc));
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_array($result2)){
                $id = $row['id'];
            }
            $query = "insert into vehicleentryrecord(id_vehicle,date,time)" .
                "values('" . $id . "', '" . $data['date'] . "', '" . $data['time'] . "')";
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
        else {
            if(mysqli_num_rows($result2) <= 0){
                $state = 3; //The vehicle does not exist -> 3
            }
            return $state;
            $this->db_close($dbc);
        }
    }

    public function getVehicleNames() {
        $dbc = $this->db_connect();
        $query = "SELECT registration_no FROM vehicle WHERE registration_no LIKE '%" . $_POST['query'] . "%'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

    public function checkVehicle($id) {
        $dbc = $this->db_connect();
        $query = "SELECT vehicle.id FROM vehicle,vehicleentryrecord WHERE vehicle.registration_no = vehicleentryrecord.id_vehicle AND vehicle.registration_no='$id' AND vehicleentryrecord.leave_time IS NULL";
        $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        if(mysqli_num_rows($result) > 0) {
            return 0;
        }
        else {
            return 1;
        }
    }

    public function insertVehicleRecord() {
        $dbc = $this->db_connect();
        $query = "INSERT INTO vehicleentryrecord(id_vehicle,date) VALUES('" . $_POST['id'] . "','" . $_POST['date'] . "')";
        $result = mysqli_query($dbc,$query);
        if($result) {
            return 1;
        }
        else {
            return 0;
        }
    }
    public function checkVehicleEntry($id) {
        $dbc = $this->db_connect();
        $query = "SELECT vehicle.id FROM vehicle,vehicleentryrecord WHERE vehicle.registration_no = vehicleentryrecord.id_vehicle " .
            "AND vehicle.registration_no='$id' AND vehicleentryrecord.leave_time IS NULL";
        $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        if(mysqli_num_rows($result) > 0) {
            return mysqli_fetch_array($result);
        }
        else {
            return null;
        }
    }

    public function insertVehicleExitRecord() {
        $dbc = $this->db_connect();
        $query = "UPDATE vehicleentryrecord SET leave_time=".$_POST['date']." WHERE id=".$_POST['vehicle_entry_id'];
        $result = mysqli_query($dbc,$query);
        if($result) {
            return 1;
        }
        else {
            return 0;
        }
    }


}