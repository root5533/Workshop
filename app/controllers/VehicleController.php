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
            $type = trim($_POST['type']);
            $brand = trim($_POST['brand']);


            if (empty($id_vehicle)) {
                $error['id_vehicle_error'] = "*Please fill the vehicle registration no";
            }
            if (empty($id_driver)) {
                $error['id_driver_error'] = "*Please fill the driver name";
            }
            if (empty($type)) {
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
                $this->view('template/head');
                $this->view('system_operator/side_bar');
                $this->view('template/top_bar');
                $this->view('system_operator/add_vehicle',$data, []);
            }
            else {
                $this->view('template/head');
                $this->view('system_operator/side_bar');
                $this->view('template/top_bar');
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'id_driver' => $id_driver,
                    'type' => $type,
                    'brand' => $brand
                );
                $this->view('system_operator/add_vehicle', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/add_vehicle');
        }

    }

    public function add_vehicle_entry() {

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $id_vehicle = trim($_POST['id_vehicle']);
            $date = trim($_POST['date']);
            $time = trim($_POST['time']);


            if (empty($id_vehicle)) {
                $error['id_vehicle_error'] = "*Please provide the vehicle registration no";
            }
            if (empty($date)) {
                $error['date_error'] = "*Please provide the date";
            }
            if (empty($time)) {
                $error['time_error'] = "*Please provide the time";
            }
            if (isset($error) == FALSE) {
                $model = $this->model('VehicleModel');
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'date' => $date,
                    'time' => $time
                );

                $result = $model->so_insert_vehicle_entry($data);
//                $this->view("maintenance/test", $data , []);

                if ($result == 1) {
                    $data = array('message' => 'Vehicle Entry successfully added!');
                }
                elseif ($result == 2) {
                    $data = array('message' => 'Problem adding the vehicle entry!');
                }
                elseif ($result == 3) {
                    $data = array('message' => 'The vehicle is not in the database!');
                }
                $this->view('system_operator/vehicle_entry_records',$data, []);
            }
            else {
                $data = array(
                    'id_vehicle' => $id_vehicle,
                    'date' => $date,
                    'time' => $time
                );
                $this->view('system_operator/vehicle_entry_records', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('system_operator/vehicle_entry_records');
        }

    }

}