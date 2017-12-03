<?php


class Controller
{
    public function __construct()
    {
        $GLOBALS['base_url'] = "/wshop/public";
        @session_start();
    }


    public function view($view, $data = [], $error = []) {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function db_connect() {
        $domain = 'localhost';
        $db_username = 'root';
        $db_password = 'root';
        $db = 'cmc';

        $dbc = mysqli_connect($domain,$db_username,$db_password,$db)
        or die(mysqli_connect_error());
        return $dbc;

    }

    public function db_close($dbc) {
        mysqli_close($dbc);
    }

}