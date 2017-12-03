<?php


class vehicle_model extends Controller {

    public function insert($data) {
        $dbc = $this->db_connect();
        //check for existing vehicle
        $query = "select * from vehicle where vehicle_registration_no='" . $data['reg_no'] . "' limit 1";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        print_r($result);
        if (mysqli_num_rows($result) > 0) {
            $result = 0; //existing driver -> 0
            return $result;
        }
        else {
            $query = "insert into vehicle(id_vehicle_diver,vehicle_type,vehicle_brand,vehicle_registration_no)" .
                "values('" . $data['id_driver'] . "', '" . $data['type'] . "', '" . $data['brand'] . "', '" . $data['reg_no'] . "')";
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