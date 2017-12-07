
    <div class="w3-container w3-padding-large">
        <?php if(isset($data['message'])) {
            echo "<h4>" . $data['message'] . "</h4>";
        }
        ?>
    </div>

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Electrical Section - Complaint Form</h3></div>
                        <div class="col-sm-8" style="padding-top: 10px;">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/ComplainController/open_complain" method="post">
                                <div class="form-group">
                                    <label for="complain_type">Complain Type</label>
                                    <input type="text" class="form-control" id="complain_type" placeholder="Type here" name="complain_type"
                                        <?php if (isset($data['complain_type'])) {echo "value='"; print_r($data['complain_type']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['complain_type_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['complain_type_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description">
                                    </textarea>
                                    <?php if(isset($error['description_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['description_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address_line_1" placeholder="Address Line 1" name="address_line_1"
                                        <?php if (isset($data['address_line_1'])) {echo "value='"; print_r($data['address_line_1']); echo "'";} ?>>
                                    <input type="text" class="form-control" id="address_line_2" placeholder="Address Line 2" name="address_line_2"
                                        <?php if (isset($data['address_line_2'])) {echo "value='"; print_r($data['address_line_2']); echo "'";} ?>>
                                    <input type="text" class="form-control" id="address_line_1" placeholder="Address Line 3" name="address_line_3"
                                        <?php if (isset($data['address_line_3'])) {echo "value='"; print_r($data['address_line_3']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['address_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['address_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input class="form-control" type="text" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("Y/m/d")?>" id="date" placeholder="Type here" name="date"
                                        <?php if (isset($data['date'])) {echo "value='"; print_r($data['date']); echo "'";} ?>>
                                    <?php if(isset($error['date_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['date_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input class="form-control" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("H:i")?>" type="text" id="time" placeholder="Type here" name="time"
                                        <?php if (isset($data['time'])) {echo "value='"; print_r($data['time']); echo "'";} ?>>
                                    <?php if(isset($error['time_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['time_error'] . "</div>";
                                    } ?>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="w3-button w3-teal" name="submit">Submit</button>
                                    <button type="reset" class="w3-button w3-teal">Reset Form</button>
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

    //button active mode
    var page_title = document.getElementById("title").innerHTML;


    if(page_title.indexOf("Add Jobs")>-1){
        document.getElementById("btn_add_jobs").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("View Jobs")>-1){
        document.getElementById("btn_view_jobs").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("Vehicle Entry Records")>-1){
        document.getElementById("btn_vehicle_entry_records").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("Add Complains")>-1){
        document.getElementById("btn_add_complains").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("View Complains")>-1){
        document.getElementById("btn_view_complains").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("Add Vehicle")>-1){
        document.getElementById("btn_add_vehicle").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }
    else if(page_title.indexOf("Add Driver")>-1){
        document.getElementById("btn_add_driver").setAttribute("class","w3-button w3-large w3-block w3-teal");
    }

</script>


</html>