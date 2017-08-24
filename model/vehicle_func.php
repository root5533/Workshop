<?php

require 'dbconnect.php';


function addVehicle($array) {

    $driver_id = $_POST['driver_id'];
    $vehicle_no = $_POST['vehicle_no'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];

    $complete = true;
    echo "<div id='error'>";
    if (strlen(trim($vehicle_no)) == 0) {
        echo "<p class='error'>*Please insert valid vehicle registration number</p>";
        $complete = false;
    }
    if (strlen(trim($brand)) == 0) {
        echo "<p class='error'>*Please insert valid vehicle brand</p>";
        $complete = false;
    }
    if (empty($driver_id)) {
        echo "<p class='error'>*Please select driver ID</p>";
        $complete = false;
    }
    if (empty($type)) {
        echo "<p class='error'>*Please select vehicle type</p>";
        $complete = false;
    }
    echo "</div>";

    if ($complete == true) {

        $query = "insert into vehicle(id_driver,registration_no,brand,type)
                  values('$driver_id','$vehicle_no','$brand','$type')";
        $dbc = openDB();
        $result = mysqli_query($dbc,$query)
            or die(mysqli_error($dbc));
        closeDB($dbc);
        echo "<div id='success'> <p>Vehicle registration successful</p> </div>";
        return false;
    }
    else {
        return true;
    }

}

function getVehicles() {
    $query = "select id_vehicle,registration_no from vehicle";
    $dbc = openDB();
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    closeDB($dbc);
    return $result;
}

function checkVehicleEntry($array) {
    $dbc = openDB();
    $vehicle_id = $array['vehicle'];
    if (strlen(trim($vehicle_id)) == 0) {
        echo "<div id='error'>";
        echo "<p class='error'>*Please enter valid vehicle registration </p>";
        echo "</div>";
        return true;
    }
    else {
//        $query = "insert into vehicle_entry_record(id_vehicle,entry_time)
//              values('$vehicle_id',NOW())";
//        $result = mysqli_query($dbc,$query)
//        or die(mysqli_error($dbc));
//        closeDB($dbc);
//        echo "Vehicle Entry Record Added!!";
        return false;
    }

}

function addVehicleEntry($array) {
    $dbc = openDB();
    $vehicle_id = $array['id'];
    $time = $array['datetime'];
    $query = "insert into vehicle_entry_record(id_vehicle,entry_time)
              values('$vehicle_id','$time')";
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    closeDB($dbc);
    echo "<div id='success'> <p>Vehicle Entry Record Added</p> </div>";
}

function getVehicleIn() {
    $query = "select vehicle.id_vehicle,vehicle.registration_no from vehicle,vehicle_entry_record
              where vehicle.id_vehicle = vehicle_entry_record.id_vehicle
              and vehicle_entry_record.vehicle_exit = 0";
    $dbc = openDB();
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    closeDB($dbc);
    return $result;
}

function getLicense($id) {
    $dbc = openDB();
    $query = "select registration_no from vehicle where id_vehicle = $id";
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    closeDB($dbc);
    $row = mysqli_fetch_array($result);
    return $row['registration_no'];
}