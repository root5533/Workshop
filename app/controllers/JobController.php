<?php


class JobController extends Controller{

    public function open_job_entry() {

        if(isset($_POST['submit'])) {

            $id_vehicle = trim($_POST['vehicle']);
            $date = trim($_POST['date']);
            $description = trim($_POST['description']);
            $job_applicant = trim($_POST['job_applicant']);


            if (empty($id_vehicle)) {
                $error['id_vehicle_error'] = "*Please fill the vehicle registration no";
            }
            if (empty($description)) {
                $error['description_error'] = "*Please provide the job description";
            }
            if (isset($error) == FALSE) {
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'description' => $description,
                    'date' => $date,
                    'job_applicant' => $job_applicant,
                    'message' => 'ok'
                );
                $this->loadView($data);
//                $result = $model->so_insert($data);
//                $this->view("maintenance/test", $data , []);

            }
            else {
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'description' => $description,
                    'date' => $date,
                    'job_applicant' => $job_applicant
                );
                $this->loadView($data,$error);
            }
        }
        else {
            $this->loadView();
        }

    }

    public function insertJob() {
        if(isset($_POST['submit'])) {
            $model = $this->model('JobModel');
            $data = array(
                'id_vehicle' => $_POST['id_vehicle'],
                'description' => $_POST['description'],
                'date' => $_POST['date'],
                'job_applicant' => $_POST['job_applicant']
            );
            $result = $model->so_insert($data);
            $data['display'] = "Job successfully created";
            $this->loadView($data);
        }
        else {
            $this->loadView();
        }

    }

    public function view_job_entry() {

        if(isset($_POST['search'])) {
            $dbc = $this->db_connect();
            $search = trim($_POST['search']);
            $search_type = trim($_POST['search_type']);
//            $id = trim($_POST['id']);
//            $id_vehicle = trim($_POST['id_vehicle']);
//            $date = trim($_POST['date']);
//            $job_applicant = trim($_POST['job_applicant']);
//            $priority = trim($_POST['priority']);
//            $supervisor = trim($_POST['supervisor']);
//            $confirmation = trim($_POST['confirmation']);

            if (empty($id_vehicle)) {
                $error['id_vehicle_error'] = "*Please fill the vehicle registration no";
            }
            if (isset($error) == FALSE) {
                $model = $this->model('JobModel');
                $data = array(
                    'search' => $search,
                    'search_type' => $search_type
//                    'id_vehicle' => $id_vehicle,
//                    'date' => $date,
//                    'job_applicant' => $job_applicant,
//                    'priority' => $priority,
//                    'supervisor' => $supervisor,
//                    'confirmation' => $confirmation
                );

                $result = $model->so_view($data);
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
                elseif (is_array($result)){
//                    $data = array('message' => 'incoming');
                    $data = $result;
                }
                $this->view('system_operator/view_jobs',$data, []);
            }
            else {
                $data = array(
                    'search' => $search,
                    'search_type' => $search_type
//                    'id_vehicle' => $id_vehicle,
//                    'date' => $date,
//                    'job_applicant' => $job_applicant,
//                    'priority' => $priority,
//                    'supervisor' => $supervisor,
//                    'confirmation' => $confirmation
                );
                $this->view('system_operator/view_jobs', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/view_jobs');
        }

    }

    private function loadView($data=[],$error=[]) {
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('template/top_bar');
        $this->view('system_operator/add_jobs', $data, $error);
    }


}