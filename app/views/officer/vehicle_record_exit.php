<div class="w3-container w3-padding-large">

    <?php

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
                                    <li>Vehicle<span style="float: right;"><b>:</b></span></li>
                                    <li>Exit Date & Time<span style="float: right;"><b>:</b></span></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <ul style="list-style-type: none" class="w3-ul">
                                    <li><?php echo $data['id']; ?></li>
                                    <li><?php echo $data['date']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <form action="<?php echo $GLOBALS['base_url']; ?>/VehicleController/insertExitRecord" method="post">
                            <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                            <input type="hidden" value="<?php echo $data['date']; ?>" name="date">
                            <input type="hidden" value="<?php echo $data['vehicle_entry_id']; ?>" name="vehicle_entry_id">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal">Back to form</button>
                            <button type="submit" class="w3-button w3-teal" style="float: right;" name="submit">Confirm Exit Record</button>
                        </form>
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

        <div class="w3-panel w3-blue w3-margin">
            <p><h4><?php echo $data['display']; ?></h4></p>
        </div>

    <?php }

    ?>
</div>



<div class="w3-row-padding">
    <div class="w3-container w3-margin-bottom">
        <div class="w3-container w3-white w3-padding-large">
            <div class="row-content">
                <div class="w3-container w3-teal w3-margin-bottom"><h3>Record Vehicle Exit</h3></div>
                <div class="col-sm-12" style="padding-top: 10px;">
                    <form action=<?php echo $GLOBALS['base_url'] . "/VehicleController/checkVehicleExit"; ?> method="post" autocomplete="off">

                        <div class="form-group">
                            <label for="id_vehicle">Vehicle Registration/License Number</label>
                            <input type="text" id="vehicle" name="vehicle" class="form-control" value="<?php if(isset($data['vehicle'])) { echo $data['vehicle'];} ?>" style="width: 25%;">
                            <div class="w3-container" id="vehicleList" style="padding: 0px;width: 25%;"></div>
                            <?php
                            if(isset($error['vehicle'])) {
                                echo "<div class='w3-panel w3-red' style='width: 25%;'><h5>" . $error['vehicle'] . "</h5></div>";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="address">Job Applicant</label>
                            <input class="form-control" type="text" id="job_applicant"  name="driver" style="width: 30%;" readonly>
                        </div>

                        <div class="form-group">
                            <label for="date">Exit Date & Time</label>
                            <input class="form-control" type="text" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d H:i:s")?>"
                                   id="date" name="date"  style="width: 20%;" readonly>
                        </div>

                        <div class="form-group w3-margin-top">
                            <button type="reset" class="w3-button w3-teal">Reset Form</button>
                            <button type="submit" class="w3-button w3-teal" name="submit" style="margin-left: 100px;">Add Record</button>
                        </div>

                    </form>
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