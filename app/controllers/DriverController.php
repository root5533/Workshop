<?php


class DriverController extends Controller{

    public function add_driver() {

        if(isset($_POST['submit'])) {
            $dbc = $this->db_connect();
            $name = trim($_POST['name']);
            $nic_1 = trim($_POST['nic_1']);
            $nic_2 = trim($_POST['nic_2']);
            $nic_3 = trim($_POST['nic_3']);
            $nic_4 = trim($_POST['nic_4']);
            $nic_5 = trim($_POST['nic_5']);
            $nic_6 = trim($_POST['nic_6']);
            $nic_7 = trim($_POST['nic_7']);
            $nic_8 = trim($_POST['nic_8']);
            $nic_9 = trim($_POST['nic_9']);
            $nic_10 = trim($_POST['nic_10']);
            $nic = $nic_1.$nic_2.$nic_3.$nic_4.$nic_5.$nic_6.$nic_7.$nic_8.$nic_9.$nic_10;
            $license_no_1 = trim($_POST['license_no_1']);
            $license_no_2 = trim($_POST['license_no_2']);
            $license_no_3 = trim($_POST['license_no_3']);
            $license_no_4 = trim($_POST['license_no_4']);
            $license_no_5 = trim($_POST['license_no_5']);
            $license_no_6 = trim($_POST['license_no_6']);
            $license_no_7 = trim($_POST['license_no_7']);
            $license_no_8 = trim($_POST['license_no_8']);
            $license_no_9 = trim($_POST['license_no_9']);
            $license_no = $license_no_1.$license_no_2.$license_no_3.$license_no_4.$license_no_5.$license_no_6.$license_no_7.$license_no_8.$license_no_9;
            $address_line_1 = trim($_POST['address_line_1']);
            $address_line_2 = trim($_POST['address_line_2']);
            $address_line_3 = trim($_POST['address_line_3']);
            $address = $address_line_1 . ",".$address_line_2.",".$address_line_3;
            $contact_no = trim($_POST['contact_no']);


            if (empty($name)) {
                $error['name_error'] = "*Please fill name";
            }
            if (empty($nic)) {
                $error['nic_error'] = "*Please fill nic";
            }
            elseif ($nic_10!='V'){
                $error['nic_error'] = "*The last character should be V";
            }
            if (empty($license_no)) {
                $error['license_no_error'] = "*Please fill the license no";
            }
            elseif (ctype_alpha($license_no_1) == FALSE){
                $error['license_no_error'] = "*The first character of license no should be alphabetic";
            }
            if (empty(chop($address,","))) {
                $error['address_error'] = "*Please fill the address";
            }
            if (empty($contact_no)) {
                $error['contact_no_error'] = "*Please fill the contact no";
            }
            elseif (!is_numeric($contact_no)){
                $error['contact_no_error'] = "*The contact no should be in integers";
            }


            if (isset($error) == FALSE) {
                $model = $this->model('DriverModel');
                $data = array(
                    'name' => $name,
                    'nic' => $nic,
                    'license_no' => $license_no,
                    'address' => $address,
                    'contact_no' => $contact_no,
                    'message' => 'ok'
                );

//                $result = $model->so_insert($data);
//
//                if ($result == 1) {
//                    $data = array('message' => 'ok');
//                }
//                elseif ($result == 2) {
//                    $data = array('message' => 'Problem adding the driver!');
//                }
                $this->view('template/head');
                $this->view('system_operator/side_bar');
                $this->view('template/top_bar');
                $this->view('system_operator/add_driver',$data, []);
            }
            else {
                $this->view('template/head');
                $this->view('system_operator/side_bar');
                $this->view('template/top_bar');
                $data = array(
                    'name' => $name,
                    'nic' => $nic,
                    'license_no' => $license_no,
                    'address' => $address,
                    'contact_no' => $contact_no
                );
                $this->view('system_operator/add_driver', $data, $error);
            }
            $this->db_close($dbc);
        }
        else {
            $this->view('template/head');
            $this->view('system_operator/side_bar');
            $this->view('template/top_bar');
            $this->view('system_operator/add_driver');
        }

    }

    public function insertDriver() {
        $data = array (
            'name' => $_POST['name'],
            'nic' => $_POST['nic'],
            'license_no' => $_POST['license_no'],
            'address' => $_POST['address'],
            'contact_no' => $_POST['contact_no']
        );
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('template/top_bar');
        $model = $this->model('DriverModel');
        $result = $model->driverInsert($data);
        if ($result == 1) {
            $data = array('display' => 'Driver Inserted Successfully');
        }
        elseif ($result == 2) {
            $data = array('display' => 'Problem adding the driver! Troubleshoot the database');
        }
        $this->view('system_operator/add_driver',$data, []);

    }

    public function getDriverAuto() {
        if (isset($_POST['query'])) {
            $model = $this->model('DriverModel');
            $result = $model->getDriverNames();
            $output = "<ul class='w3-ul w3-hoverable'>";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<li>' . $row['name'] . "</li>";
                }
            }
            else {
                $output .= "<li><i>No driver found</i></li>";
            }
            $output .= "</ul>";
            echo $output;
        }
    }

    public function getDriverFromReg() {
        if (isset($_POST['query'])) {
            $model = $this->model('DriverModel');
            $result = $model->getDriverNameFromReg();
            $row = mysqli_fetch_array($result);
            $output = $row['name'];
            echo $output;
        }
    }

}