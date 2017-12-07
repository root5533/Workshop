<?php


class JobModel extends Controller{

    public function so_insert($data) {
        $dbc = $this->db_connect();
        //check for existing driver
        $string = $data['job_applicant'];
        $query1 = "SELECT * FROM driver WHERE driver_name LIKE '%$string%' LIMIT 1";
        $result1 = mysqli_query($dbc, $query1) or die(mysqli_error($dbc));
        //check for existing vehicle
        $query2 = "select * from vehicle where registration_no='" . $data['id_vehicle'] . "' limit 1";
        $result2 = mysqli_query($dbc, $query2) or die(mysqli_error($dbc));
        if (mysqli_num_rows($result1) > 0 and mysqli_num_rows($result2)>0) {
            while ($row1 = mysqli_fetch_array($result1)){
                $id_1 = $row1['id'];
            }
            while ($row2 = mysqli_fetch_array($result2)){
                $id_2 = $row2['id'];
            }
            $query = "insert into jobentry(id_vehicle,date,description,job_applicant)" .
                "values('" . $id_2 . "', '" . $data['date'] . "', '" . $data['description'] . "', '" . $id_1 . "')";
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
        else {
            if(mysqli_num_rows($result1)==0 and mysqli_num_rows($result2)==0){
                $state = 3; //vehicle and driver do not exist -> 3
            }
            elseif (mysqli_num_rows($result1)==0){
                $state = 4; //driver do not exist -> 4
            }
            elseif (mysqli_num_rows($result2)==0){
                $state = 5; //vehicle do not exist -> 5
            }
            return $state;
            $this->db_close($dbc);
        }
    }

    public function so_view($data) {
        $dbc = $this->db_connect();
        //check for existing driver
        $query1 = "select id,id_vehicle,date,description,job_applicant,priority,supervisor,confirmation from jobentry";
        $result1 = mysqli_query($dbc, $query1) or die(mysqli_error($dbc));
        $row1 = mysqli_fetch_assoc($result1);
        return $row1;
        $this->db_close($dbc);
        //check for existing vehicle
//        $query2 = "select id from Vehicle where registration_no='" . $data['id_vehicle'] . "' limit 1";
//        $result2 = mysqli_query($dbc, $query2) or die(mysqli_error($dbc));
//        if (mysqli_num_rows($result1) > 0 and mysqli_num_rows($result2)>0) {
//
//            $query = "insert into job_entry(id_vehicle,date,description,job_applicant)" .
//                "values('" . $data['id_vehicle'] . "', '" . $data['date'] . "', '" . $data['description'] . "', '" . $data['job_applicant'] . "')";
//            $result = mysqli_query($dbc, $query);
//            if ($result) {
//                $state = 1; //successful insert -> 1
//            }
//            else {
//                $state = 2; // unsuccessful result -> 2
//            }
//            return $state;
//            $this->db_close($dbc);
//        }
//        else {
//            if(mysqli_num_rows($result1)==0 and mysqli_num_rows($result2)==0){
//                $state = 3; //vehicle and driver do not exist -> 3
//            }
//            elseif (mysqli_num_rows($result1)==0){
//                $state = 4; //driver do not exist -> 4
//            }
//            elseif (mysqli_num_rows($result2)==0){
//                $state = 5; //vehicle do not exist -> 5
//            }
//            return $state;
//            $this->db_close($dbc);
//        }
    }

}