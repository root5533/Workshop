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

<h3>Stock Request</h3>

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
?>
<div id="infoHolder">
<table id="request_table">
        <form action="stock_request.php" method="POST" id="stock_request_form_2" onsubmit="return validateStockRequestForm()">
            <tr class="top_pane">
                <td class="col1"></td>
                <td class="col1">
                    <label for="compNum">Job ID</label>
                    <input type="textbox" name="job_id" id="jobidtextbox" size="8">
                </td>
                <td class="col1"></td>
            </tr>
            <tr class="middle_pane">
                <td class="col1"></td>
                <td class="col1">

                        <table id="stock_request_table">
                            <tr>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>
                                    <input list="row11" size="5" name="item_code">
                                        <datalist id="row11">
                                            <?php require "../model/stock_func.php"; getStockItemCode($conn); ?>
</datalist>
</td>
<td><input type="text" size="25" id="row12" name="description"></td>
<td><input type="text" size="4" id="row13" name="amount"></td>
</tr>
</table>

</td>
<!--            <td class="col1">-->
<!--                <button onclick="addTableRows()">Add</button>-->
<!--                <button onclick="deleteTableRows()">Delete</button>-->
<!--            </td>-->
</tr>
</form>
<tr class="button_panel_1">
    <td class="col1"></td>
    <td class="col1">
        <input type="submit" value="Send Request" class="stock_request_button" form="stock_request_form_2" name="send_stock_request">
        <button onclick="clearAllText()" class="stock_request_button">Reset</button>
        <button class="stock_request_button">Cancel</button>
    </td>
    <td class="col1"></td>
</tr>
<tr class="button_panel_2">
    <td class="col1"></td>
    <td class="col1">
        <button onclick="addTableRows()" class="stock_request_button">Add Item</button>
        <button onclick="deleteTableRows()" class="stock_request_button">Delete Item</button>
    </td>
    <td class="col1"></td>
</tr>
</table>
if ($outform == true) {
    echo
    "";

}
?>

</div>

<div class="footer">
    <p>Colombo Municipal Council Workshop</p>
    <p>Madampitiya Road, Colombo 10</p>
</div>

</body>