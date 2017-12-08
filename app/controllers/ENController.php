<?php

class ENController extends Controller {

    public function index() {
        if (isset($_SESSION['user'])) {
            if($_SESSION['type'] == 'EN') {
                $data = $this->getStock();
                $this->view('template/head');
                $this->view('engineer/side_bar');
                $this->view('engineer/top_bar');
                $this->view('engineer/view_stock',$data);
            }
            else {
                $base = $GLOBALS['base_url'];
                header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Engineer%20to%20continue");
            }
        }
        else {
            $base = $GLOBALS['base_url'];
            header("location: $base/LoginController/authenticate?login=Please%20login%20as%20a%20Engineer%20to%20continue");
        }
//        $this->view('template/head');
//        $this->view('template/side_bar');
//        $this->view('template/top_bar');
//        $this->view('EN/assign');
    }

    public function load_view($view) {

        if (isset($_SESSION['user']) and $_SESSION['type'] == "EN") {
            $this->view('template/head');
            $this->view('engineer/side_bar');
            $this->view('engineer/top_bar');
            if ($view == "view_stock") {
                $data = $this->getStock();
                $this->view('engineer/view_stock', $data);
            } else {
                $data = $this->getStock();
                $this->view('engineer/view_stock', $data);
            }
        }
        else {
            $error['login_error'] = "Please login with engineer credentials to continue";
            $this->view('template/head');
            $this->view('login','',$error);
        }
    }

    private function getStock() {
        $model = $this->model('StockModel');
        $result = $model->getStockAll();
        return $result;
    }

//    public function loadNotifications() {
//        if (isset($_POST["view"])) {
//            $connect = $this->db_connect();
//            if ($_POST["view"] != '') {
//                $update_query = "UPDATE engineercomments SET comment_status=1 WHERE comment_status=0";
//                mysqli_query($connect, $update_query) or die(mysqli_error($connect));
//            }
//            $query = "SELECT * FROM engineercomments ORDER BY comment_id DESC LIMIT 10";
//            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
//            $output = '';
//
//            if (mysqli_num_rows($result) > 0) {
//                while ($row = mysqli_fetch_array($result)) {
//                    $output .= '
//                        <li>
//                        <a href="#">
//                            <strong>' . $row["comment_subject"] . '</strong><br />
//                            <small><em><li>' . $row["comment_text"] . '</li></em></small>
//                        </a>
//                        </li>
//                        ';
//                }
//            } else {
//                $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
//            }
//
//            $query_1 = "SELECT * FROM engineercomments WHERE comment_status=0";
//            $result_1 = mysqli_query($connect, $query_1) or die(mysqli_error($connect));
//            $count = mysqli_num_rows($result_1);
//            $data = array(
//                'notification' => $output,
//                'unseen_notification' => $count
//            );
//
//            echo json_encode($data);
//        }
//    }

}