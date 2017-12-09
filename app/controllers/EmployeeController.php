<?php

class EmployeeController extends Controller {

    public function getEmployeeAuto() {
        if (isset($_POST['query'])) {
            $model = $this->model('EmployeeModel');
            $result = $model->getTONames();
            $output = "<ul class='w3-ul w3-hoverable'>";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<li>' . $row['name'] . " : " . $row['emp_id'] . "</li>";
                }
            }
            else {
                $output .= "<li><i>No match found</i></li>";
            }
            $output .= "</ul>";
            echo $output;
        }
    }

}