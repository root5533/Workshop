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


<div id="success">
	<h3>Maintenance Department</h3>
	<p>Pending Job Tasks</p>
    <table align="center">
        <tr>
            <td align="center">Job Entry ID</td>
            <td align="center">Job Entry <br> Open Date </td>
            <td align="center">Vehicle Registration No.</td>
            <td align="center">Job Description</td>
        </tr>

        <?php
        require_once '../model/job_func.php';
        getJobPending();
        ?>
    </table>

</div>

<div class="footer">
	<p>Colombo Municipal Council Workshop</p>
	<p>Madampitiya Road, Colombo 10</p>
</div>

</body>
































</html>

