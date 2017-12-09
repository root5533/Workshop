<?php

class EmployeeModel extends Controller {

    public function getTONames() {
        $dbc = $this->db_connect();
        $query = "SELECT name,id,emp_id FROM employee WHERE type = 'TO' AND name LIKE '%" . $_POST['query'] . "%'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        $this->db_close($dbc);
        return $result;
    }

    public function checkTOExist($id) {
        $dbc = $this->db_connect();
        $query = "SELECT emp_id FROM employee WHERE emp_id='$id'";
        $result = mysqli_query($dbc,$query) or die($dbc);
        if (mysqli_num_rows($result) > 0) {
            return 1;
        }
        else {
            return 0;
        }
    }

}