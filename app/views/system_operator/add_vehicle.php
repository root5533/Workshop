

    <div class="w3-container w3-padding-large">
        <?php
        if (isset($data['message'])) {
            echo "<div class='w3-panel w3-blue'> <h4>" . $data['message'] . "</h4></div>";
        } ?>
    </div>

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"> <h3>Vehicle Registration</h3> </div>
                        <div class="col-sm-8 w3-padding-large">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/VehicleController/add_vehicle" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="id_driver">Driver Name</label>
                                    <input type="text" class="form-control" id="driver" placeholder="Type here" name="id_driver" style="width: 50%;"
                                        <?php if (isset($data['id_driver'])) {echo "value='"; print_r($data['id_driver']); echo "'";} ?>>
                                    <div id="driverList" class="w3-container" style="padding: 0px;width: 50%;"></div>
                                    <?php
                                    if(isset($error['id_driver_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['id_driver_error'] . "</h5></div>";
                                    } ?>

                                </div>
                                <div class="form-group">
                                    <label for="type">Vehicle Type</label>
                                    <select type="text" class="form-control" id="type" placeholder="Type here" name="type" style="width: 30%;"
                                        <?php if (isset($data['type'])) {echo "value='"; print_r($data['type']); echo "'";} ?>>
                                        <option disabled selected value="0"> -- select an option -- </option>
                                        <option value="lorry">Lorry</option>
                                        <option value="garbage truck">Garbage Truck</option>
                                        <option value="fire truck">Fire Truck</option>
                                        <option value="crane">Crane</option>
                                        <option value="bulldozer">Bulldozer</option>
                                        <option value="excavator">Excavator</option>
                                        <option value="road roller">Road Roller</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <?php
                                    if(isset($error['type_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['type_error'] . "</h5></div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Vehicle brand</label>
                                    <input class="form-control" type="text" id="brand" placeholder="Type here" name="brand" style="width: 30%;"
                                        <?php if (isset($data['brand'])) {echo "value='"; print_r($data['brand']); echo "'";} ?>>
                                    <?php if(isset($error['brand_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['brand_error'] . "</h5></div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="id_vehicle">Vehicle Registration Number</label>
                                    <table class="w3-table" style="width: 70%;">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_1" placeholder="" name="id_vehicle_1" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_1'])) {echo "value='"; print_r($data['id_vehicle_1']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_2" placeholder="" name="id_vehicle_2" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_2'])) {echo "value='"; print_r($data['id_vehicle_2']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_3" placeholder="" name="id_vehicle_3" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_3'])) {echo "value='"; print_r($data['id_vehicle_3']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_4" placeholder="" name="id_vehicle_4" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_4'])) {echo "value='"; print_r($data['id_vehicle_4']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_5" placeholder="" name="id_vehicle_5" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_5'])) {echo "value='"; print_r($data['id_vehicle_5']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_6" placeholder="" name="id_vehicle_6" size="1" maxlength="1" onkeyup="validatePassKey(this)"
                                                    <?php if (isset($data['id_vehicle_6'])) {echo "value='"; print_r($data['id_vehicle_6']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="vehicle_id_7" placeholder="" name="id_vehicle_7" size="1" maxlength="1"
                                                    <?php if (isset($data['id_vehicle_7'])) {echo "value='"; print_r($data['id_vehicle_7']); echo "'";} ?>>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                    if(isset($error['id_vehicle_error'])) {
                                        echo "<div class='w3-panel w3-red'><h5>" . $error['id_vehicle_error'] . "</h5></div>";
                                    } ?>
                                </div>


                                <div class="form-group">
                                    <button type="reset" class="w3-button w3-teal w3-hover-gray">Reset Form</button>
                                    <button type="submit" class="w3-button w3-teal w3-hover-gray" name="submit" style="float: right; width: 25%;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 w3-border-left" style="min-height: 800px;">
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
        $('#driver').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/DriverController/getDriverAuto",
                    method:"POST",
                    data:{query:query},
                    success:function(data) {
                        $('#driverList').fadeIn(1);
                        $('#driverList').html(data);
                    }
                });
            }
            else {
                $('#driverList').fadeOut();
            }
        });
        $(document).on('click','li',function() {
            if ($(this).text() != 'No driver found') {
                $('#driver').val($(this).text());
                $('#driverList').fadeOut(1);
            }
        });
    });




</script>


</html>