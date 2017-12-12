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
                'job_applicant' => $_POST['job_applicant'],
                'user' => $_SESSION['user']
            );
            $result = $model->so_insert($data);
            $data['display'] = "Job successfully created";
            header('location: ' . $GLOBALS['base_url'] . '/SOController/load_view/add_job?msg=Job%20successfully%20created');
        }
        else {
            $this->loadView();
        }
    }

    public function view_job_entry() {

        if(isset($_POST['submit'])) {
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

            function validateDate($date, $format = 'Y-m-d H:i:s')
            {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;
            }

            if(isset($_POST['search'])){
                switch ($search_type) {
                    case 'id':
                        if(is_numeric($search)){
                            break;
                        }elseif (empty($search)){
                            break;
                        }else{
                            $error['search_error']="*Enter a number";
                        };
                        break;
                    case 'id_vehicle':
                        if(is_numeric($search)){ $error['search_error']="*Enter a valid vehicle registration no";};
                        break;
                    case 'date':
                        if(validateDate($search, 'd/m/Y')){
                            break;
                        }elseif (validateDate($search, 'Y-m-d')){
                            break;
                        }elseif (validateDate($search, 'Y/m/d')){
                            break;
                        }else{
                            $error['search_error']="*Enter a valid date";
                        };
                        break;
                    case 'job_applicant':
                        if(is_numeric($search)){ $error['search_error']="*Enter a name";};
                        break;
                    default:
                        break;
                }
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

                $data = $model->so_view($data);

                if (is_null($data)) {
                    $data = array('display' => 'No match found!');
                }

                $this->view('system_operator/head');
                $this->view('system_operator/side_bar');
                $this->view('system_operator/top_bar');
                $this->view('system_operator/view_jobs',$data,[]);
//                $this->view("maintenance/test", $data , []);


//                elseif ($result == 0) {
//                    $data = array('message' => 'Vehicle is already registered');
//                }
//                elseif ($result == 2) {
//                    $data = array('message' => 'Problem updating vehicle database');
//                }
//                elseif ($result == 3) {
//                    $data = array('message' => 'The driver and vehicle both do not exist');
//                }
//                elseif ($result == 4) {
//                    $data = array('message' => 'The driver does not exist');
//                }
//                elseif ($result == 5) {
//                    $data = array('message' => 'The vehicle does not exist');
//                }

            }
            else {
                $data = array(
                    'search' => $search,
                    'search_type' => $search_type,
//                    'id_vehicle' => $id_vehicle,
//                    'date' => $date,
//                    'job_applicant' => $job_applicant,
//                    'priority' => $priority,
//                    'supervisor' => $supervisor,
//                    'confirmation' => $confirmation
                );

                $this->view('system_operator/head');
                $this->view('system_operator/side_bar');
                $this->view('system_operator/top_bar');
                $this->view('system_operator/view_jobs', [], $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/head');
            $this->view('system_operator/side_bar');
            $this->view('system_operator/top_bar');
            $this->view('system_operator/view_jobs');
        }

    }

    public function getJobAuto($state=0) {
        if (isset($_POST['query'])) {
            $model = $this->model('JobModel');
            $result = $model->getJobs($state);
//            $output = "<ul class='w3-ul w3-hoverable'>";
            $output =
                "<tr class='w3-teal'>" .
                    "<th>Job Applicant</th>" .
                    "<th>Vehicle Registration No.</th>" .
                    "<th>Description</th>" .
                    "<th>User</th>" .
                "</tr>";

            $base = $GLOBALS['base_url'];
            if (mysqli_num_rows($result) > 0) {
                if ($state == 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $output .=
                            "<tr onclick=\"document.location = '$base/JobController/pass_job_id/" . $row['jobid'] . "';\">" .
                            "<td>" . $row['name'] . "</td>" .
                            "<td>" . $row['registration_no'] . "</td>" .
                            "<td>" . $row['description'] . "</td>" .
                            "<td>" . $row['user'] . "</td>" .
                            "</tr>";
                    }
                }
                else if ($state == 1) {
                    while ($row = mysqli_fetch_array($result)) {
                        $output .=
                            "<tr onclick=\"document.location = '$base/StockController/stock_request_view/" . $row['jobid'] . "';\">" .
                            "<td>" . $row['name'] . "</td>" .
                            "<td>" . $row['registration_no'] . "</td>" .
                            "<td>" . $row['description'] . "</td>" .
                            "<td>" . $row['user'] . "</td>" .
                            "</tr>";
                    }
                }

            }
            else {
                $output .=
                    "<tr>" .
                        "<td colspan='4'>No items match</td>" .
                    "</tr>";
            }
            $output .= "</table>";
            echo $output;
        }
    }

    private function loadView($data=[],$error=[]) {
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('system_operator/top_bar');
        $this->view('system_operator/add_jobs', $data, $error);
    }



    //job search from view_jobs form
    public function engineer_view_job_entry() {

        if(isset($_POST['submit'])) {
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

            function validateDate($date, $format = 'Y-m-d H:i:s')
            {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;
            }

            if(isset($_POST['search'])){
                switch ($search_type) {
                    case 'id':
                        if(is_numeric($search)){
                            break;
                        }elseif (empty($search)){
                            break;
                        }else{
                            $error['search_error']="*Enter a number";
                        };
                        break;
                    case 'id_vehicle':
                        if(is_numeric($search)){ $error['search_error']="*Enter a valid vehicle registration no";};
                        break;
                    case 'date':
                        if(validateDate($search, 'd/m/Y')){
                            break;
                        }elseif (validateDate($search, 'Y-m-d')){
                            break;
                        }elseif (validateDate($search, 'Y/m/d')){
                            break;
                        }else{
                            $error['search_error']="*Enter a valid date";
                        };
                        break;
                    case 'job_applicant':
                        if(is_numeric($search)){ $error['search_error']="*Enter a name";};
                        break;
                    default:
                        break;
                }
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

                $data = $model->engineer_view($data);

                if (is_null($data)) {
                    $data = array('display' => 'No match found!');
                }

                $this->view('engineer/head');
                $this->view('engineer/side_bar');
                $this->view('engineer/top_bar');
                $this->view('engineer/view_jobs',$data,[]);
//                $this->view("maintenance/test", $data , []);


//                elseif ($result == 0) {
//                    $data = array('message' => 'Vehicle is already registered');
//                }
//                elseif ($result == 2) {
//                    $data = array('message' => 'Problem updating vehicle database');
//                }
//                elseif ($result == 3) {
//                    $data = array('message' => 'The driver and vehicle both do not exist');
//                }
//                elseif ($result == 4) {
//                    $data = array('message' => 'The driver does not exist');
//                }
//                elseif ($result == 5) {
//                    $data = array('message' => 'The vehicle does not exist');
//                }





            }
            else {
                $data = array(
                    'search' => $search,
                    'search_type' => $search_type,
//                    'id_vehicle' => $id_vehicle,
//                    'date' => $date,
//                    'job_applicant' => $job_applicant,
//                    'priority' => $priority,
//                    'supervisor' => $supervisor,
//                    'confirmation' => $confirmation
                );

                $this->view('engineer/head');
                $this->view('engineer/side_bar');
                $this->view('engineer/top_bar');
                $this->view('engineer/view_jobs',[],$error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('engineer/head');
            $this->view('engineer/side_bar');
            $this->view('engineer/top_bar');
            $this->view('engineer/view_jobs');
        }

    }

    public function assign_jobs(){

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $id = trim($_POST['id']);
            $supervisor = trim($_POST['supervisor']);
            $emp = substr($supervisor,-4);
            $model = $this->model('EmployeeModel');
            $result = $model->checkTOExist($emp);
            if ($result == 0) {
                $error['supervisor_error'] = "*Supervisor does not exist";
            }
            if(empty($supervisor)){
                $error['supervisor_error'] = "*Enter the supervisor name you wish to assign";
            }
            if (isset($error) == FALSE) {

                $data = array(
                    'id' => $id,
                    'supervisor' => $emp,
                    'message' => 'ok'
                );

                $this->pass_job_id($id,$emp);
            }
            else {
                $this->pass_job_id($id,'',$error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->loadEngineerView('view_jobs');
        }
    }

    public function pass_job_id($job_id,$sup_id='',$error=[]){

        $model = $this->model('JobModel');
        $result = $model->getJobDetails($job_id);
        $result2 = $model->checkSupervisor($job_id);
        print_r($result2);
        $exist = '';
        if($result2) {
            $exist = $result2;
        }

        $row = mysqli_fetch_array($result);
        $msg = '';
        if($sup_id != '') {
            $msg = 'ok';
        }
        $data = array(
            'vehicle' => $row['registration_no'],
            'driver' => $row['name'],
            'description' => $row['description'],
            'date' => $row['date'],
            'id' => $job_id,
            'supervisor' => $sup_id,
            'message' => $msg,
            'exist' => $exist
        );

        $this->loadEngineerView('assign_jobs',$data,$error);

    }

//    public function stock_request_view($job_id,$error=[]) {
//        $model = $this->model('JobModel');
//        $result = $model->getJobDetails($job_id);
//        $row = mysqli_fetch_array($result);
//        $msg = '';
//        $data = array(
//            'vehicle' => $row['registration_no'],
//            'driver' => $row['name'],
//            'description' => $row['description'],
//            'date' => $row['date'],
//            'id' => $job_id,
//            'supervisor' => $row['supervisor'],
//            'message' => $msg
//        );
//
//        $this->loadEngineerView('stock_request',$data,$error);
//    }

    public function updateJob(){

        $data = array(
            'id' => $_POST['id'],
            'supervisor' => $_POST['supervisor']
        );

        $model = $this->model('JobModel');
        $result = $model->update_job($data);
        if ($result == 1) {
//            $data = array('display' => 'Supervisor assigned successfully!');
            $id = $_POST['id'];
            header('location: '.$GLOBALS['base_url'].'/StockController/stock_request_view/'.$id);
        }
        elseif ($result == 2) {
            $data = array('display' => 'There was a problem updating the database');
            $this->loadEngineerView('view_jobs',$data);
        }



    }


    public function acceptJob($job_id,$user){
        if ($job_id != '' and $user != '') {
            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $model = $this->model('StockModel');
            $result = $model->checkStockReceived($job_id);
            $model2 = $this->model('JobModel');
            $result2 = $model2->getAssignedJobs($_SESSION['user']);
            $data['id'] = $job_id;
            $data['username'] = $user;
            $data['table'] = $result2;
            if ($result == 1) {
                $data['message'] = 'ok';
            }
            else {
                $data['stock'] = $result;
            }
            $this->view('technical_officer/view_assigned_jobs',$data);
        }
    }

    public function closeJob($job_id,$user){

        if($job_id != '' and $user != '') {
            $data['id'] = $job_id;
            $data['username'] = $user;
            $data['message'] = 'ok';
            $model = $this->model('JobModel');
            $result = $model->getAcceptedJobs($user);
            $data['table'] = $result;
            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $this->view('technical_officer/close_jobs',$data);
        }
    }

    public function updateJobAccept(){

        if(isset($_POST['submit'])) {
            $data = array(
                'id' => $_POST['id'],
                'username' => $_POST['username']
            );
            $model = $this->model('JobModel');
            $result = $model->updateStatus($data);

            if($result == 1){
                $display = "Job accepted";
            }
            else {
                $display = "Job status update unsuccessful";
            }

            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');

            $model = $this->model('JobModel');
            $result = $model->getAssignedJobs($_SESSION['user']);
            $data = array(
                'display' => $display,
                'table' => $result
            );
            $this->view('technical_officer/view_assigned_jobs',$data);
        }

    }

    public function updateCloseJob(){

        if(isset($_POST['submit'])) {
            $data = array(
                'id' => $_POST['id'],
                'username' => $_POST['username']
            );
            $model = $this->model('JobModel');
            $result = $model->updateJobClose($data);

            if($result == 1){
                $display = "Job Closed!";
            }
            else {
                $display = "Job status update unsuccessful";
            }
            $model = $this->model('JobModel');
            $result = $model->getAcceptedJobs($_SESSION['user']);
            $data = array(
                'display' => $display,
                'table' => $result
            );
            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $this->view('technical_officer/close_jobs',$data);

        }
        else {
            $this->loadCloseJobs();
        }
    }

    public function getAcceptedJobs($user){

        $data = array('username' => $user);

        $model = $this->model('JobModel');
        $result = $model->getAcceptedJobs($data);

        if ($result==1) {

            $error['empty_error'] = "There are no ongoing jobs yet!";

            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $this->view('technical_officer/close_jobs',[],$error);

        } else {
            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $this->view('technical_officer/close_jobs',$result,[]);
        }


    }

    public function to_view_job_entry($user) {

        if(isset($_POST['view'])){

            $data = array('username' => $user);

            $model = $this->model('JobModel');
            $result = $model->to_view($data);

            if ($result==1) {
                $error['empty_error'] = "There are no ongoing jobs yet!";

                $this->view('template/head');
                $this->view('technical_officer/side_bar');
                $this->view('technical_officer/top_bar');
                $this->view('technical_officer/view_assigned_jobs',[],$error);
            } else {
                $this->view('template/head');
                $this->view('technical_officer/side_bar');
                $this->view('technical_officer/top_bar');
                $this->view('technical_officer/view_assigned_jobs',$result,[]);
            }
        } else{

            $this->view('template/head');
            $this->view('technical_officer/side_bar');
            $this->view('technical_officer/top_bar');
            $this->view('technical_officer/view_assigned_jobs');

        }

    }



    private function loadViewAssignJobs($data=[],$error=[]){
        $this->view('template/head');
        $this->view('technical_officer/side_bar');
        $this->view('technical_officer/top_bar');

        $this->view('technical_officer/view_assigned_jobs', $data, $error);
    }

    private function loadCloseJobs($data=[],$error=[]){
        $this->view('template/head');
        $this->view('technical_officer/side_bar');
        $this->view('technical_officer/top_bar');
        $this->view('technical_officer/close_jobs', $data, $error);
    }

    private function loadEngineerView($location='view_stock',$data=[],$error=[]) {
        $this->view('engineer/head');
        $this->view('engineer/side_bar');
        $this->view('engineer/top_bar');
        $this->view("engineer/$location",$data,$error);
    }


}