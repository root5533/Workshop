<?php
/**
 * Created by PhpStorm.
 * User: tuanamith
 * Date: 10/7/17
 * Time: 11:00 AM
 */

class home extends Controller
{

    public function index() {
//        $this->view('production/index');
//        $model = $this->model('index');
        $this->view('template/head');
//        $this->view('template/side_bar');
//        $this->view('template/top_bar');
        $this->view('login');
//        $this->view('SO/job');
//        $this->view('template/footer');
    }

    public function load_view($view) {
        if($view == 'job') {
            $this->view('template/head');
            $this->view('template/side_bar');
            $this->view('template/top_bar');
            $this->view('SO/job');
        }
        if ($view == 'assign') {
            $this->view('template/head');
            $this->view('template/side_bar');
            $this->view('template/top_bar');
            $this->view('EN/assign');
        }
//        elseif ($view == 'electrical') {
//            $this->view('electrical/index');
//        }
//        elseif ($view == 'equipment') {
//            $this->view('equipment/index');
//        }
//        else {
//            $this->view('home/index');
//        }
    }

}