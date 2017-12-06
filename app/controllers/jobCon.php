<?php

class jobCon extends Controller {

    public function openJob() {

        if (isset($_POST['submit'])) {
            $data = array(
                'number' => trim($_POST['number']),
                'details' => trim($_POST['details']),
                'applicant' => trim($_POST['applicant'])
            );
            $jobModel = $this->model('jobModel');
            $jobModel->insertJob($data);
            $base = $GLOBALS['base_url'];
            header("location: $base/home/load_view/job");
        }

    }

}