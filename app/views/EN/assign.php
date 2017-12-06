<!DOCTYPE>

<html>

<!--    <div class="w3-container w3-padding-large">-->
<!--        <h2 id="title"></h2>-->
<!---->
<!--        --><?php
//        if (isset($data['message'])) {
//            echo "<h4 style='color: green;'>" . $data['message'] . "</h4>";
//        } ?>
<!--    </div>-->

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom w3-padding-small">
            <div class="col-md-9 col-sm-12">

                <div class="col-sm-10">
                    <div id="openJob" class="w3-container job">
                        <form action=<?php echo $GLOBALS['base_url'] . "/maintenance/driver_registration" ?> method="post">
                            <h3>Assign Supervisor to Open Job</h3>
                            <div class="form-group">
                                <label for="name">Job Entry</label>
                                <input type="text" class="form-control" id="name" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <label for="NIC">Select employee to be assigned</label>
                                <input class="form-control" type="text" id="nic" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <button type="button" class="w3-button w3-teal">Submit</button>
                                <button type="button" class="w3-button w3-teal">Reset Form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 w3-border-left"  style="min-height: 800px;">
                <button type="button" class="w3-button w3-block" id="notifButton">
                    <h3 style="margin: 0px;text-align: center;">
                        Notification
                        <span class="label label-pill label-danger count" style="border-radius:10px;margin-left: 5px;" id="count"></span>
                    </h3>
                </button>
                <ul class="w3-ul w3-large w3-hoverable" style="margin-top: 10px; display: none;" id="notification">
                </ul>
            </div>
        </div>

<!--    --><?php //require_once 'footer.php'; ?>

</div>
</body>

<script>

    document.getElementById("notifButton").addEventListener("click", loadDoc);

    load_notification();

    window.setInterval(test, 5000);

</script>




</html>