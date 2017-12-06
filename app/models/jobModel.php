<?php

class jobModel extends Controller {

    public function insertJob($data) {
        $dbc = $this->db_connect();
        $query = "INSERT INTO jobentry(id_vehicle,description,job_applicant) VALUES('" .
            $data['number'] . "','" . $data['details'] . "','" . $data['applicant'] . "')";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        $comment_query = "INSERT INTO jobcomments(comment_subject,comment_text)" .
            "VALUES('Job Open " . $data['number'] . "','" . $data['details'] . "')";
        $result = mysqli_query($dbc,$comment_query);
    }

}