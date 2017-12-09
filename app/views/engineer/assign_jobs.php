

    <div class="w3-container w3-padding-large">



        <?php
        //////////////////////////////////////////////////////////////////////////////////
        //confirmation modal
        if (isset($data['message'])) {
            if ($data['message'] == 'ok') { ?>

                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <header class="w3-container w3-teal">
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Confirmation</h2>
                        </header>
                        <div class="w3-container w3-padding-large">
                            <div class="w3-container w3-padding-large">
                                <div class="col-sm-3">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li>Job ID<span style="float: right;"><b>:</b></span></li>
                                        <li>Supervisor<span style="float: right;"><b>:</b></span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-9">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li><?php echo $data['id']; ?></li>
                                        <li><?php echo $data['supervisor']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/updateJob" method="post">
                                <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                                <input type="hidden" value="<?php echo $data['supervisor']; ?>" name="supervisor">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal">Back to form</button>
                                <button type="submit" class="w3-button w3-teal" style="float: right;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById("id01").style.display="block";
                </script>


            <?php }
        }
        //////////////////////////////////////////////////////////////////////////////////
        ?>

        <?php
        //display result after confirmation
        if(isset($data['display'])) { ?>

            <div class="w3-panel w3-red">
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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Assign Jobs</h3></div>
                        <div class="col-sm-8">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/assign_jobs" method="post" autocomplete="off">

                                <ul class="w3-ul w3-margin-bottom">
                                    <li><h4>Job Details</h4></li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Applicant / Driver <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['driver']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Vehicle Number <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['vehicle']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Description <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['description']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Open Date <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['date']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li></li>
                                </ul>

                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <label for="supervisor">Supervisor to be Assigned</label>
                                    <input type="text" class="form-control" id="supervisor" placeholder="Type here" name="supervisor" style="width: 50%">
                                    <?php
                                    if(isset($error['supervisor_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['supervisor_error'] . "</h5></div>";
                                    } ?>
                                    <div id="superList" class="w3-container" style="padding: 0px;width: 50%;"></div>
                                </div>


                                <div class="form-group">
                                    <button type="reset" class="w3-button w3-teal w3-hover-gray">Reset Form</button>
                                    <button type="submit" class="w3-button w3-teal w3-hover-gray" name="submit" style="float: right; width: 25%;">Submit</button>
                                </div>
                            </form>
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
            </div>
        </div>
    </div>




    <script>

        document.getElementById("notifButton").addEventListener("click", loadDoc);

        load_notification();

        window.setInterval(test, 5000);


        $(document).ready(function() {
            $('#supervisor').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url:"<?php echo $GLOBALS['base_url']; ?>/EmployeeController/getEmployeeAuto",
                        method:"POST",
                        data:{query:query},
                        success:function(data) {
                            $('#superList').fadeIn(100);
                            $('#superList').html(data);
                        }
                    });
                }
                else {
                    $('#superList').fadeOut(100);
                }
            });
            $(document).on('click','#superList li',function() {
                if ($(this).text() != 'No match found') {
                    $('#supervisor').val($(this).text());
                    $('#superList').fadeOut(100);
                }
            });
        });




    </script>