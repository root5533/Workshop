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

<h3>Driver Registration</h3>

<?php

require_once '../model/driver_func.php';

$outform = true;
$name = null;
$nic = null;
$license = null;
$address = null;
$contact = null;

if (isset($_POST['add_driver'])) {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $license = $_POST['license'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $outform = addDriver($_POST);
}

if ($outform == true) {
    echo
    "
    <div id='infoHolder'>
        <table>
            <form action='../view/driverRegistration.php' method='post'>
            <tr>
                <td>
                    <label>Driver Name : </label>
                </td>
                <td>
                    <input type='text' name='name' value='$name' required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>NIC : </label>
                </td>
                <td>
                    <input type='text' name='nic' value='$nic'>
                </td>
            </tr>
            <tr>
                <td>
                    <label>License Number : </label>
                </td>
                <td>
                    <input type='text' name='license' value='$license' required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Address : </label>
                </td>
                <td>
                    <input type='text' name='address' value='$address' required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Contact : </label>
                </td>
                <td>
                    <input type='text' name='contact' value='$contact' required>
                </td>
            </tr>
            <tr class='blank_row'>
                <td colspan='2'>  </td>
            </tr>
            <tr>
                <td>
                    <input type='submit' name='add_driver' value='Submit'>
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