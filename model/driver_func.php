<?php

require_once 'dbconnect.php';

function addDriver($array) {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $license = $_POST['license'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $complete = true;
    echo "<div id='error'>";
    if (strlen(trim($name)) == 0) {
        echo "<p class='error'>*Please insert valid name</p>";
        $complete = false;
    }
    if (strlen(trim($nic)) == 0 || strlen(trim($nic)) != 10) {
        echo "<p class='error'> *Please insert valid NIC </p>";
        $complete = false;
    }
    if (strlen(trim($license)) == 0) {
        echo "<p class='error'> *Please insert valid license number </p>";
        $complete = false;
    }
    if (strlen(trim($address)) == 0) {
        echo "<p class='error'> *Please insert valid address </p>";
        $complete = false;
    }
    if (strlen(trim($contact)) < 7) {
        echo "<p> *Please insert valid contact number</p>";
        $complete = false;
    }
    echo "</div>";
    if ($complete == true) {
        $dbc = openDB();
        $query = "insert into driver(name,nic,driving_license,address,contact)
                  values('$name','$nic','$license','$address','$contact')";
        $result = mysqli_query($dbc,$query)
            or die(mysqli_error($dbc));
        echo "<div id='success'> <p>Driver registration successful</p> </div> <br>";
        return false;
        closeDB($dbc);
    }
    else {
        return true;
    }

}

function getDrivers() {
    $dbc = openDB();
    $query = "select id_driver,name from driver";
    $drivers = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    closeDB($dbc);
    return $drivers;
}