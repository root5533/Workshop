<!DOCTYPE html>
<html>

<head>
    <title>Workshop Management System</title>
    <link rel="stylesheet" href="../css/formstyle.css" type="text/css">
</head>

<body>



<div id="topBar">
    <!-- <div id="searchBar">
        <label for="search">Search</label>
        <input type="text" name="search" title="Type any keyword to search the website" id="search" size="25">
    </div>
    -->
    <div id="loginBar">
        <button>Login</button>
    </div>
</div>


<div id="header">
    <img src="../images/cmc_logo.png" id="logo">
    <h1 id="headingWMS">Workshop Management System</h1>
    <h1 id="headingCMCW">Colombo Municipal Council Workshop</h1>
    <div id="navbar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="maintenance.php">Maintenance</a></li>
            <li><a href="">Equipement</a></li>
            <li><a href="">Electrical</a></li>
            <li><a href="">Production</a></li>
            <li><a href="">About</a></li>
        </ul>
    </div>
    <div id="navbar2">
        <ul>
            <li><a href="driverRegistration.php">Driver Registration</a></li>
            <li><a href="vehicleRegistration.php">Vehicle Registration</a></li>
            <li><a href="vehicleEntry.php">Vehicle Entry Record</a></li>
            <li><a href="jobEntry.php">Open Job Entry</a></li>
            <li><a href="">Assign Supervisor</a></li>
            <li><a href="">Stock Request</a></li>
            <li><a href="">Close Job Entry</a></li>
            <li><a href="">Issue Gatepass</a></li>
        </ul>
    </div>
</div>
<br>

<h3>Vehicle Registration</h3>

<?php

require_once '../model/vehicle_func.php';
require_once '../model/driver_func.php';

$outform = true;
$driver_id = null;
$vehicle_no = null;
$brand = null;
$type = null;

if (isset($_POST['add_vehicle'])) {

    $driver_id = $_POST['driver_id'];
    $vehicle_no = $_POST['vehicle_no'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $outform = addVehicle($_POST);
}

if ($outform == true) {
    echo
    "<div id='infoHolder'>
        <table>
            <form action='../view/vehicleRegistration.php' method='post'>
            <tr>
                <td>
                    <label>Vehicle Brand : </label>
                </td>
                <td>
                    <input type='text' name='brand' value='$brand' required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Vehicle Type : </label>
                </td>
                <td>
                    <select name='type' required>
                        <option value='car' selected>Car</option>
                        <option value='truck'>Truck</option>
                        <option value='bike'>Bike</option>
                        <option value='ambulance'>Ambulance</option>
                        <option value='tipper'>Tipper</option>
                        <option value='van'>Van</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Vehicle Owner : </label>
                </td>
                <td>
                    <input type='text' list='driver' name='driver_id' required>
                    <datalist id='driver'>";
                    $drivers = getDrivers();
                    while ($row = mysqli_fetch_array($drivers)) {
                        $value = $row['id_driver'];
                        $name = $row['name'];
                        echo
                        "<option value='$value'>$name</option>";
                    }
                echo
                "</datalist>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Vehicle Registration No. <br> (License Plate) </label>
                </td>
                <td>
                    <input type='text' name='vehicle_no' value='$vehicle_no' required>
                </td>
            </tr>            
            <tr class='blank_row'>
                <td colspan='2'>  </td>
            </tr>
            <tr>
                <td>
                    <input type='submit' name='add_vehicle' value='Register Vehicle'>
                </td>
                <td>
                    <input type='reset' value='Reset Form'> 
                </td>
            </tr>
    
        </table>";
}
?>

</div>

<div class="footer">
    <p>Colombo Municipal Council Workshop</p>
    <p>Madampitiya Road, Colombo 10</p>
</div>

</body>