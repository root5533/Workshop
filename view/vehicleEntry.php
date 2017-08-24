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
            <li><a href="">Maintenance</a></li>
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

<h3>Vehicle Entry Record</h3>

<?php

require_once '../model/vehicle_func.php';

if (isset($_POST['submit'])) {
    addVehicleEntry($_POST);
}

else {
    $outform = true;
    $vehicle = null;
    $time = null;

    if (isset($_POST['vehicle_entry'])) {
        $vehicle = $_POST['vehicle'];
        $outform = checkVehicleEntry($_POST);
    }


    if ($outform == true) {
        echo
        "<div id='infoHolder'>
        <table>
            <form action='../view/vehicleEntry.php' method='post'>
            <tr>
                <td>
                    <label>Vehicle Registration No. <br> (License Plate): </label>
                </td>
                <td>
                    <input type='text' name='vehicle' list='vehicles'>
                    <datalist id='vehicles'>";
        $vehicles = getVehicles();
        while ($row = mysqli_fetch_array($vehicles)) {
            $vehicle_id = $row['id_vehicle'];
            $number_plate = $row['registration_no'];
            echo
            "<option value='$vehicle_id'>$number_plate</option>";
        }
        echo
        "</datalist>
                </td>
            </tr>
                       
            <tr class='blank_row'>
                <td colspan='2'>  </td>
            </tr>
            <tr>
                <td>
                    <input type='submit' name='vehicle_entry' value='Submit'>
                </td>
                <td>
                    <input type='reset' value='Reset Form'> 
                </td>
            </tr>
    
        </table>";
    } else {
        $id = $_POST['vehicle'];
        $now = date('Y-m-d H:i:s', time());;
        $license = getLicense($id);
        echo
        "<div id='success'>
        <p>
        Vehicle Registration Number : $license <br>
        Time and Date of Entry : $now <br> <br>
        Add this entry ? <br>
        <div>
        <form method='post' action='../view/vehicleEntry.php'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='datetime' value='$now'>
            <table align='center'>
                <tr>
                    <td>
                        <input type='submit' name='submit' value='Yes'>
                    </td>
                    <td>
                        <button onclick='goBack()'>No</button>
                    </td>
                </tr>
            </table>   
        </form>
        </div>
        </p>";
    }
}
?>

</div>

<div class="footer">
    <p>Colombo Municipal Council Workshop</p>
    <p>Madampitiya Road, Colombo 10</p>
</div>

</body>