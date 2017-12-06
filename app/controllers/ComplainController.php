<?php


class ComplainController extends Controller{

    public function open_complain() {

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $complain_type = trim($_POST['complain_type']);
            $date = trim($_POST['date']);
            $description = trim($_POST['description']);
            $time = trim($_POST['time']);
            $address_line_1 = trim($_POST['address_line_1']);
            $address_line_2 = trim($_POST['address_line_2']);
            $address_line_3 = trim($_POST['address_line_3']);
            $address = $address_line_1 . ",".$address_line_2.",".$address_line_3;


            if (empty($complain_type)) {
                $error['complain_type_error'] = "*Please provide a complain type";
            }
            if (empty($description)) {
                $error['description_error'] = "*Please provide the job description";
            }
            if (empty($date)) {
                $error['date_error'] = "*Please provide the date";
            }
            if (empty($time)) {
                $error['time_error'] = "*Please provide the time";
            }
            if (empty(chop($address,","))) {
                $error['address_error'] = "*Please provide an address";
            }
            if (isset($error) == FALSE) {
                $model = $this->model('ComplainModel');
                $data = array(
                    'complain_type' => $complain_type,
                    'description' => $description,
                    'date' => $date,
                    'address' => $address,
                    'time' => $time
                );

                $result = $model->so_insert($data);
//                $this->view("maintenance/test", $data , []);

                if ($result == 1) {
                    $data = array('message' => 'The complaint added successful');
                }
                elseif ($result == 0) {
                    $data = array('message' => 'The complain is already registered');
                }
                elseif ($result == 2) {
                    $data = array('message' => 'Problem updating complain database');
                }
                elseif ($result == 3) {
                    $data = array('message' => 'The driver and vehicle both do not exist');
                }
                elseif ($result == 4) {
                    $data = array('message' => 'The driver does not exist');
                }
                elseif ($result == 5) {
                    $data = array('message' => 'The vehicle does not exist');
                }
                $this->view('system_operator/add_jobs',$data, []);
            }
            else {
                $data = array(
                    'complain_type' => $complain_type,
                    'description' => $description,
                    'date' => $date,
                    'address' => $address,
                    'time' => $time
                );
                $this->view('system_operator/add_complains', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/add_complains');
        }

    }

    public function view_complain() {

        if(isset($_POST['search'])) {
            $dbc = $this->db_connect();
            $search = trim($_POST['search']);
            $search_type = trim($_POST['search_type']);
            $description = trim($_POST['description']);
            $job_applicant = trim($_POST['job_applicant']);


            if (empty($search)) {
                $error['search_error'] = "*Please fill the vehicle registration no";
            }
            if (isset($error) == FALSE) {
                $model = $this->model('JobModel');
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'description' => $description,
                    'date' => $date,
                    'job_applicant' => $job_applicant
                );

                $result = $model->so_insert($data);
//                $this->view("maintenance/test", $data , []);

                if ($result == 1) {
                    $data = array('message' => 'Vehicle Registration Successful');
                }
                elseif ($result == 0) {
                    $data = array('message' => 'Vehicle is already registered');
                }
                elseif ($result == 2) {
                    $data = array('message' => 'Problem updating vehicle database');
                }
                elseif ($result == 3) {
                    $data = array('message' => 'The driver and vehicle both do not exist');
                }
                elseif ($result == 4) {
                    $data = array('message' => 'The driver does not exist');
                }
                elseif ($result == 5) {
                    $data = array('message' => 'The vehicle does not exist');
                }
                $this->view('system_operator/view_jobs',$data, []);
            }
            else {
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'description' => $description,
                    'date' => $date,
                    'job_applicant' => $job_applicant
                );
                $this->view('system_operator/view_jobs', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/view_jobs');
        }

    }


}