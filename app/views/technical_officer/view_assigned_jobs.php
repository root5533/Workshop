


    <div class="w3-container w3-padding-large">
        <h2 id="title" style="display: none;"><b>View Assigned Jobs</b></h2>

        <?php

        //confirmation modal
        if (isset($data['message'])) {
            if ($data['message'] == 'ok') { ?>

                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <header class="w3-container w3-teal">
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h3>Confirmation</h3>
                        </header>
                        <div class="w3-container w3-padding-large">
                            <div class="w3-container w3-padding-large">
                                <div class="col-sm-3">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li>Accept Job ID : <?php echo $data['id']; ?> ?</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/updateJobAccept" method="post">
                                        <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                                        <input type="hidden" value="<?php echo $data['username']; ?>" name="username">
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal" style="width: 30%;">Back</button>
                                        <button type="submit" class="w3-button w3-teal" style="float: right;width: 50%;" name="submit">Accept</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById("id01").style.display="block";
                </script>


            <?php }
        }

        ?>


        <?php
        //display result after confirmation
        if(isset($data['display'])) { ?>

            <div class="w3-panel w3-blue">
                <p><h4><?php echo $data['display']; ?></h4></p>
            </div>

        <?php }

        ?>

    </div>



    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Assigned jobs</h3></div>
<!--                        <form action="--><?php //echo $GLOBALS['base_url']; ?><!--/JobController/to_view_job_entry/--><?php //echo $_SESSION['user'];?><!--" method="post" id="form1">-->
<!--                            <div class="col-sm-12">-->
<!--                                <button type="submit" name="view" class="w3-button w3-teal">View Assigned Jobs</button>-->
<!--                            </div>-->
                        <?php
                        //display result after confirmation
                        if(isset($data['stock'])) { ?>

                            <div class="w3-panel">
                                <ul class="w3-ul w3-red">
                                    <li><b>Stock Items are still pending issue</b></li>
                                    <?php foreach ($data['stock'] as $row) { ?>
                                    <li><?php echo $row['stock_id'] . " : Quantity - " . $row['amount']; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>

                        <?php }

                        ?>
                            <div class="col-sm-12"">
                                    <!--search table-->
                                <table class="table" id="search_table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Vehicle Registration No</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Job Applicant</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if($data['table'] != null) {
                                        foreach ($data['table'] as $value) {
                                            echo " 
                                        <tr>
                                            <td>" . $value['id'] . "</td>
                                            <td>" . $value['registration_no'] . "</td>
                                            <td>" . $value['date'] . "</td>
                                            <td>" . $value['description'] . "</td>
                                            <td>" . $value['name'] . "</td>
                                            <td><a href='" . $GLOBALS['base_url'] . "/JobController/acceptJob/" . $value['id'] . "/" . $_SESSION['user'] . "' class=\"w3-bar-item w3-button w3-blue\">Accept</a></td>
                                        </tr> ";
                                        }
                                    }
                                    else {
                                        echo "<td colspan='5'>No jobs assigned</td>";
                                    }?>

                                    </tbody>
                                </table>
                            </div>
<!--                        </form>-->
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
            </div>
        </div>
    </div>




    <script>

        document.getElementById("notifButton").addEventListener("click", displayTONotification);

        loadTONotification();

        window.setInterval(loadTONotification, 8000);

    </script>