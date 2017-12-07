
    <div class="w3-container w3-padding-large">

        <?php

        //confirmation modal
        if (isset($data['message'])) {
            if ($data['message'] == 'ok') { ?>

                <div id="idModal" class="w3-modal">
                    <div class="w3-modal-content">
                        <header class="w3-container w3-teal">
                            <span onclick="document.getElementById('idModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Confirmation</h2>
                        </header>
                        <div class="w3-container w3-padding-large">
                            <div class="w3-container w3-padding-large">
                                <div class="col-sm-4">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li>Vehicle Registration Number<span style="float: right;"><b>:</b></span></li>
                                        <li>Job Applicant<span style="float: right;"><b>:</b></span></li>
                                        <li>Jop Open date & time<span style="float: right;"><b>:</b></span></li>
                                        <li>Description<span style="float: right;"><b>:</b></span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-8">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li><?php echo $data['id_vehicle']; ?></li>
                                        <li><?php echo $data['description']; ?></li>
                                        <li><?php echo $data['date']; ?></li>
                                        <li><?php echo $data['job_applicant']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/insertJob" method="post">
                                <input type="hidden" value="<?php echo $data['id_vehicle']; ?>" name="id_vehicle">
                                <input type="hidden" value="<?php echo $data['description']; ?>" name="description">
                                <input type="hidden" value="<?php echo $data['date']; ?>" name="date">
                                <input type="hidden" value="<?php echo $data['job_applicant']; ?>" name="job_applicant">
                                <button type="button" onclick="document.getElementById('idModal').style.display='none'" class="w3-button w3-teal">Back to form</button>
                                <button type="submit" class="w3-button w3-teal" style="float: right;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById("idModal").style.display="block";
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
                        <div class="w3-container w3-teal"> <h3>Job Entry Form</h3> </div>
                        <div class="col-sm-8" style="padding-top: 10px;">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/open_job_entry" method="post">
                                <div class="form-group">
                                    <label for="id_vehicle">Vehicle Registration Number</label>
                                    <input type="text" id="vehicle" name="vehicle" class="form-control" value="<?php if(isset($data['vehicle'])) { echo $data['vehicle'];} ?>" style="width: 25%;">
                                    <div class="w3-container" id="vehicleList" style="padding: 0px;width: 25%;"></div>
                                    <?php
                                    if(isset($error['id_vehicle_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['id_vehicle_error'] . "</h5></div>";
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="address">Job Applicant</label>
                                    <input class="form-control" type="text" id="job_applicant"  name="job_applicant" style="width: 50%;" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input class="form-control" type="text" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("Y / m / d     h:i:s a")?>"
                                           id="date" name="date"  style="width: 35%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="driver_license">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Type here" name="description"
                                        <?php if (isset($data['description'])) {echo "value='"; print_r($data['description']); echo "'";} ?>></textarea>
                                    <?php if(isset($error['description_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['description_error'] . "</h5></div>";
                                    } ?>
                                </div>

                                <div class="form-group ">
                                    <button type="reset" class="w3-button w3-teal w3-hover-gray">Reset Form</button>
                                    <button type="submit" class="w3-button w3-teal w3-hover-gray" name="submit" style="float: right; width: 25%;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 w3-border-left" style="min-height: 600px;">
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

    <!--    --><?php //require_once 'footer.php'; ?>

</div>
</body>



<script>

    $(document).ready(function() {
        $('#vehicle').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/VehicleController/getVehicleAuto",
                    method:"POST",
                    data:{query:query},
                    success:function(data) {
                        $('#vehicleList').fadeIn(1);
                        $('#vehicleList').html(data);
                    }
                });
            }
            else {
                $('#vehicleList').fadeOut(1);
            }
        });
        $(document).on('click','li',function() {
            if ($(this).text() != 'No vehicle match above license plate') {
                var query2 = $(this).text();
                $('#vehicle').val(query2);
                $('#vehicleList').fadeOut(1);
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/DriverController/getDriverFromReg",
                    method:"POST",
                    data:{query:query2},
                    success:function(data) {
                        $('#job_applicant').val(data);
                    }
                });
            }
        });
    });

</script>


</html>