<?php


class VehicleController extends Controller{

    public function add_vehicle() {

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $id_vehicle_1 = trim($_POST['id_vehicle_1']);
            $id_vehicle_2 = trim($_POST['id_vehicle_2']);
            $id_vehicle_3 = trim($_POST['id_vehicle_3']);
            $id_vehicle_4 = trim($_POST['id_vehicle_4']);
            $id_vehicle_5 = trim($_POST['id_vehicle_5']);
            $id_vehicle_6 = trim($_POST['id_vehicle_6']);
            $id_vehicle_7 = trim($_POST['id_vehicle_7']);
            $id_vehicle = $id_vehicle_1.$id_vehicle_2.$id_vehicle_3.$id_vehicle_4.$id_vehicle_5.$id_vehicle_6.$id_vehicle_7;
            $id_driver = trim($_POST['id_driver']);
            $brand = trim($_POST['brand']);
            $type = '';


            if (empty($id_vehicle) and strlen($id_vehicle) == 7) {
                $error['id_vehicle_error'] = "*Please fill the vehicle registration no";
            }
            if (empty($id_driver)) {
                $error['id_driver_error'] = "*Please fill the driver name";
            }
            if (isset($_POST['type'])) {
                $type = $_POST['type'];
            }
            else {
                $error['type_error'] = "*Please fill the vehicle type";
            }
            if (empty($brand)) {
                $error['brand_error'] = "*Please fill the vehicle brand";
            }
            if (isset($error) == FALSE) {
                $model = $this->model('VehicleModel');
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'id_driver' => $id_driver,
                    'type' => $type,
                    'brand' => $brand
                );

                $result = $model->so_insert($data);
//                $this->view("maintenance/test", $data , []);

                if ($result == 1) {
                    $data = array('message' => 'Vehicle successfully added!');
                }
                elseif ($result == 2) {
                    $data = array('message' => 'Problem adding the vehicle!');
                }
                elseif ($result == 3) {
                    $data = array('message' => 'The driver does not exist!');
                }
                elseif (is_array($result)){
                    $string = " ";
                    foreach ($result as &$value) {
                        $string .= $value;
                        $string .= ",";
                    }
                    $data = array('message' => 'There are more suggestions for driver name!','id_driver' => $string);
                }
                $this->loadView($data);
            }
            else {
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'id_driver' => $id_driver,
                    'type' => $type,
                    'brand' => $brand
                );
                $this->loadView($data,$error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->loadView();
        }

    }

    public function checkVehicleEntry() {

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $id = trim($_POST['vehicle']);
            $date = trim($_POST['date']);
            $driver = trim($_POST['driver']);

            $model = $this->model('VehicleModel');
            $result = $model->checkVehicle($id);

            $this->view('template/head');
            $this->view('officer/side_bar');
            $this->view('template/top_bar');

            if($result == 0) {
                $error['vehicle'] = "*Vehicle Number is incorrect or not registered or gatepass has not been issued";
            }

            if (empty($id)) {
                $error['vehicle'] = "*Please provide a vehicle registration no";
            }

            if (isset($error) == FALSE) {
                $data = array(
                    'id' => $id,
                    'date' => $date,
                    'driver' => $driver,
                    'message' => 'ok'
                );

                $this->view('officer/vehicle_entry',$data);

            }
            else {
                $this->view('officer/vehicle_entry', [], $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('officer/vehicle_entry');
        }

    }

    public function insertEntryRecord() {
        if(isset($_POST['submit'])) {
            $model = $this->model('VehicleModel');
            $result = $model->insertVehicleRecord();
            if($result == 1) {
                $data['display'] = "Added Vehicle Entry Record";
            }
            else {
                $data['display'] = "A problem occured with the database";
            }
            $this->view('template/head');
            $this->view('officer/side_bar');
            $this->view('template/top_bar');
            $this->view('officer/vehicle_entry',$data);

        }
    }

    public function getVehicleAuto() {
        if (isset($_POST['query'])) {
            $model = $this->model('VehicleModel');
            $result = $model->getVehicleNames();
            $output = "<ul class='w3-ul w3-hoverable'>";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<li>' . $row['registration_no'] . "</li>";
                }
            }
            else {
                $output .= "<li><i>No vehicle match above license plate</i></li>";
            }
            $output .= "</ul>";
            echo $output;
        }
    }

    private function loadView($data=[],$error=[]) {
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('template/top_bar');
        $this->view('system_operator/add_vehicle',$data, $error);
    }

    public function checkVehicleExit() {
        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $id = trim($_POST['vehicle']);
            $date = trim($_POST['date']);
            $driver = trim($_POST['driver']);
            $model = $this->model('VehicleModel');
            $result = $model->checkVehicleEntry($id);

            $model2 = $this->model('JobModel');
            $result2 = $model2->checkJobComplete($id);


            $this->view('template/head');
            $this->view('officer/side_bar');
            $this->view('template/top_bar');

            $vehicle_entry_id = null;

            if($result == 0) {
                $error['vehicle'] = "*There is no entry record of this vehicle";
            }
            else {
                $vehicle_entry_id = $result['id'];
            }

            if ($result2 == 0) {
                $error['vehicle'] = "*Jobs still pending for this vehicle";
            }

            if (empty($id)) {
                $error['vehicle'] = "*Please provide a vehicle registration no";
            }

            if (isset($error) == FALSE) {
                $data = array(
                    'id' => $id,
                    'date' => $date,
                    'driver' => $driver,
                    'vehicle_entry_id' => $vehicle_entry_id,
                    'message' => 'ok'
                );

                $this->view('officer/vehicle_record_exit',$data);
            }
            else {
                $this->view('officer/vehicle_record_exit', [], $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->checkSecureLO();
        }
    }

    public function insertExitRecord() {
        if(isset($_POST['submit'])) {
            $model = $this->model('VehicleModel');
            $result = $model->insertVehicleExitRecord();
            if($result == 1) {
                $data['display'] = "Vehicle Record Updated";
            }
            else {
                $data['display'] = "A problem occurred with the database";
            }
            $this->view('template/head');
            $this->view('officer/side_bar');
            $this->view('template/top_bar');
            $this->view('officer/vehicle_entry',$data);

        }
        else {
            $this->checkSecureLO();
        }
    }

    private function checkSecureLO() {
        if(isset($_SESSION['user'])) {
            if($_SESSION['type'] == "LO") {
                $this->view('template/head');
                $this->view('officer/side_bar');
                $this->view('template/top_bar');
                $this->view('officer/vehicle_entry');
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Logistic%20Officer%20to%20continue");
        }
    }

}