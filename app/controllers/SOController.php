<?php

class SOController extends Controller
{

    public function index()
    {
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('system_operator/top_bar');
        $this->view('system_operator/add_jobs');
    }

    public function load_view($view)
    {
        $this->view('template/head');
        $this->view('system_operator/side_bar');
        $this->view('system_operator/top_bar');

        if ($view == 'add_jobs') {
            $this->view('system_operator/add_jobs');
        } elseif ($view == 'view_jobs') {
            $this->view('system_operator/view_jobs');
        } elseif ($view == 'vehicle_entry_records') {
            $this->view('system_operator/vehicle_entry_records');
        } elseif ($view == 'add_complains') {
            $this->view('system_operator/add_complains');
        } elseif ($view == 'view_complains') {
            $this->view('system_operator/view_complains');
        } elseif ($view == 'add_vehicle') {
            $this->view('system_operator/add_vehicle');
        } elseif ($view == 'add_driver') {
            $this->view('system_operator/add_driver');
        } else {
            $this->view('system_operator/add_jobs');
        }
    }
}