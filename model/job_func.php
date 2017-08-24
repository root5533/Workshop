<?php


require_once 'vehicle_func.php';

function checkJob($array) {
    echo "<div id='error'>";
    $complete = true;
    if (strlen(trim($array['vehicle'])) == 0) {
        echo "*Please enter valid Vehicle License No.";
        $complete= false;
    }
    if (strlen(trim($array['job_description'])) == 0) {
        echo "*Please enter valid job description";
        $complete= false;
    }
    if (strlen(trim($array['applicant'])) == 0) {
        echo "*Please enter valid applicant name";
        $complete= false;
    }
    echo "</div>";
    if ($complete == true) {
        return false;
    }
    else {
        return true;
    }
}

function addJobEntry ($array) {
    require_once 'dbconnect.php';
    $vehicle = $array['vehicle'];
    $job_description = $array['job_description'];
    $applicant = $array['applicant'];
    $priority = $array['priority'];
    $date = $array['date'];
    $dbc = openDB();
    $query = "insert into job_entry(id_vehicle,date,job_description,applicant,priority)
              values('$vehicle','$date','$job_description','$applicant','$priority')";
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    echo "<div id='success'> <p>Job Entry Added</p>";
    closeDB($dbc);
}

function getJobPending() {
    require_once 'dbconnect.php';
    $dbc = openDB();
    $query = "select id_job_entry,id_vehicle,date,job_description from job_entry";
    $result = mysqli_query($dbc,$query)
        or die(mysqli_error($dbc));
    while ($row = mysqli_fetch_array($result)) {
        $job_id = $row['id_job_entry'];
        $v_id = $row['id_vehicle'];
        $license = getLicense($v_id);
        $date = $row['date'];
        $desc = $row['job_description'];
        echo
        "<tr>
        <td align='center'>$job_id</td>
        <td align='center'>$date</td>
        <td align='center'>$license</td>
        <td align='center'>$desc</td>
        </tr>";
    }
    closeDB($dbc);
}