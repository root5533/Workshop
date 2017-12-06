<?php


class VehicleModel extends Controller {

    public function so_insert($data) {
        $dbc = $this->db_connect();
        //check for existing driver
        $string = $data['id_driver'];
        $query1 = "SELECT * FROM driver WHERE driver_name LIKE '%$string%' LIMIT 5";
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
                $query2 = "SELECT name FROM driver WHERE driver_name LIKE '%$string%' LIMIT 5";
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

}