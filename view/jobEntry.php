<!DOCTYPE html>
<html>

<head>
    <title>Workshop Management System</title>
    <link rel="stylesheet" href="../css/formstyle.css" type="text/css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
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

<h3>Open Job Entry</h3>

<?php

require_once '../model/vehicle_func.php';
require_once '../model/job_func.php';

if (isset($_POST['submit'])) {
    addJobEntry($_POST);
}
else {
    $outform = true;
    $vehicle = null;
    $date = null;
    $job_type = null;
    $job_description = null;
    $applicant = null;
    $priority = null;

    if (isset($_POST['job_entry'])) {
        $vehicle = $_POST['vehicle'];
        $job_description = $_POST['job_description'];
        $applicant = $_POST['applicant'];
        $priority = $_POST['priority'];
        $outform = checkJob($_POST);
    }


    if ($outform == true) {
        echo
        "
        <div id='infoHolder'>
            <table>
                <form action='../view/jobEntry.php' method='post'>
                <tr>
                    <td>
                        <label>Vehicle Registration No.<br>(License Plate): </label>
                    </td>
                    <td>
                        <input type='text' list='vehicles_in' name='vehicle' required>
                        <datalist id='vehicles_in'>";

        $vehicles_in = getVehicleIn();
        while ($row = mysqli_fetch_array($vehicles_in)) {
            $vehicle_id = $row['id_vehicle'];
            $number_plate = $row['registration_no'];
            echo
            "<option value='$vehicle_id'>$number_plate</option>";
        }

        echo
                    "</datalist>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Detail about maintenance job : </label>
                    </td>
                    <td>
                        <textarea name='job_description' placeholder='Enter Job Details' cols='50' rows='3'>$job_description</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Name of applicant : </label>
                    </td>
                    <td>
                        <input type='text' name='applicant'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Job priority : </label>
                    </td>
                    <td>
                        <select name='priority' required>
                        <option value='high'>High</option>
                        <option value='normal' selected>Normal</option>
                        </select>
                    </td>
                </tr>
                
                <tr class='blank_row'>
                    <td colspan='2'>  </td>
                </tr>
                <tr>
                    <td>
                        <input type='submit' name='job_entry' value='Submit'>
                    </td>
                    <td>
                        <input type='reset' value='Reset Form'> 
                    </td>
                </tr>
        
            </table>";
    }
    else {
        $date = date('Y-m-d H:i:s', time());
        $license = getLicense($vehicle);

        echo
        "<div id='success'> 
        <p>Vehicle Registration Number : $license <br>
        Job Description : $job_description <br>
        Applicant Name : $applicant <br>
        Priority Level : $priority <br>
        Date : $date <br>
        <br> Add Job Entry ?
        </p>
        <form action='../view/jobEntry.php' method='post'>
        <input type='hidden' name='vehicle' value='$vehicle'>    
        <input type='hidden' name='job_description' value='$job_description'>
        <input type='hidden' name='applicant' value='$applicant'>
        <input type='hidden' name='priority' value='$priority'>
        <input type='hidden' name='date' value='$date'>
        <table align='center'>
        <tr>
            <td>
                <input type='submit' name='submit' value='Confirm'>
            </td>
            <td>
                <input type='button' onclick='goBack()' value='Back'>
            </td>
        </tr>   
        </table>
        </form>
        </div>";
    }
}
?>

<div class="footer">
    <p>Colombo Municipal Council Workshop</p>
    <p>Madampitiya Road, Colombo 10</p>
</div>

</body>