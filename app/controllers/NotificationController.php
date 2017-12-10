<?php

class NotificationController extends Controller {

    public function openJob()
    {
        if (isset($_POST["view"])) {
            $connect = $this->db_connect();
            if ($_POST["view"] != '') {
                $update_query = "UPDATE engineercomments SET comment_status=1 WHERE comment_status=0";
                mysqli_query($connect, $update_query);
            }
            $query = "SELECT * FROM engineercomments ORDER BY comment_id DESC LIMIT 10";
            $result = mysqli_query($connect, $query);
            $output = '';

            if (mysqli_num_rows($result) > 0) {
                $base = $GLOBALS['base_url'];
                while ($row = mysqli_fetch_array($result)) {

                    $output .= "<li onclick=\"document.location = '$base/" . $row['get_request'] ."';\">" .
                        "<strong>" . $row['comment_subject'] . "</strong><br>" .
                        "<small><em>" . $row['comment_text'] . "</em></small>" .
                        "</li>" .
                        "</a>";
                }
            }
            else {
                $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
            }

            $query_1 = "SELECT * FROM engineercomments WHERE comment_status=0";
            $result_1 = mysqli_query($connect, $query_1) or die(mysqli_error($connect));
            $count = mysqli_num_rows($result_1);
            $data = array(
                'notification' => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

    public function getTONotifications() {
        if (isset($_POST["view"])) {
            $connect = $this->db_connect();
            if ($_POST["view"] != '') {
                $update_query = "UPDATE tocomments SET comment_status=1 WHERE comment_status=0";
                mysqli_query($connect, $update_query) or die(mysqli_error($dbc));
            }
            $query = "SELECT * FROM tocomments ORDER BY comment_id DESC LIMIT 10";
            $result = mysqli_query($connect, $query);
            $output = '';

            if (mysqli_num_rows($result) > 0) {
                $base = $GLOBALS['base_url'];
                while ($row = mysqli_fetch_array($result)) {
                    $output .= "<li onclick=\"document.location = '$base/" . $row['get_request'] ."';\">" .
                        "<strong>" . $row['comment_subject'] . "</strong><br>" .
                        "<small><em>" . $row['comment_text'] . "</em></small>" .
                        "</li>" .
                        "</a>";
                }
            }
            else {
                $output .= '<li>No Notification Found</li>';
            }

            $query_1 = "SELECT * FROM tocomments WHERE comment_status=0";
            $result_1 = mysqli_query($connect, $query_1) or die(mysqli_error($connect));
            $count = mysqli_num_rows($result_1);
            $data = array(
                'notification' => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

}