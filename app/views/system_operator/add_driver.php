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
                                <li>Driver Name<span style="float: right;"><b>:</b></span></li>
                                <li>NIC<span style="float: right;"><b>:</b></span></li>
                                <li>License Number<span style="float: right;"><b>:</b></span></li>
                                <li>Address<span style="float: right;"><b>:</b></span></li>
                                <li>Contact No.<span style="float: right;"><b>:</b></span></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <ul style="list-style-type: none" class="w3-ul">
                                <li><?php echo $data['name']; ?></li>
                                <li><?php echo $data['nic']; ?></li>
                                <li><?php echo $data['license_no']; ?></li>
                                <li><?php echo $data['address']; ?></li>
                                <li><?php echo $data['contact_no']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <form action="<?php echo $GLOBALS['base_url']; ?>/DriverController/insertDriver" method="post">
                        <input type="hidden" value="<?php echo $data['name']; ?>" name="name">
                        <input type="hidden" value="<?php echo $data['nic']; ?>" name="nic">
                        <input type="hidden" value="<?php echo $data['license_no']; ?>" name="license_no">
                        <input type="hidden" value="<?php echo $data['address']; ?>" name="address">
                        <input type="hidden" value="<?php echo $data['contact_no']; ?>" name="contact_no">
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

        ?>

        <?php
        //display result after confirmation
        if(isset($data['display'])) { ?>

        <div class="w3-panel w3-teal">
            <p><h3><?php echo $data['display']; ?></h3></p>
        </div>

        <?php }

        ?>
    </div>


<!--    main body content-->

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Driver Registration</h3></div>
                        <div class="col-sm-8">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/DriverController/add_driver" method="post">
                                <div class="form-group">
                                    <label for="name">Driver Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Type here" name="name"
                                        <?php if (isset($data['name'])) {echo "value='"; print_r($data['name']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['name_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['name_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="nic">NIC</label>
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="nic_1" placeholder="" name="nic_1" size="1" maxlength="1" onkeyup="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_1'])) {echo "value='"; print_r($data['nic_1']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_2" placeholder="" name="nic_2" size="1" maxlength="1" onkeypress="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_2'])) {echo "value='"; print_r($data['nic_2']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_3" placeholder="" name="nic_3" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_3'])) {echo "value='"; print_r($data['nic_3']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_4" placeholder="" name="nic_4" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_4'])) {echo "value='"; print_r($data['nic_4']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_5" placeholder="" name="nic_5" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_5'])) {echo "value='"; print_r($data['nic_5']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_6" placeholder="" name="nic_6" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_6'])) {echo "value='"; print_r($data['nic_6']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_7" placeholder="" name="nic_7" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_7'])) {echo "value='"; print_r($data['nic_7']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_8" placeholder="" name="nic_8" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_8'])) {echo "value='"; print_r($data['nic_8']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_9" placeholder="" name="nic_9" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_9'])) {echo "value='"; print_r($data['nic_9']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nic_10" placeholder="" name="nic_10" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['nic_10'])) {echo "value='"; print_r($data['nic_10']); echo "'";} ?>>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                    if(isset($error['nic_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['nic_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="license_no">License No</label>
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_1" placeholder="" name="license_no_1" size="1" maxlength="1" onkeyup="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_1'])) {echo "value='"; print_r($data['license_no_1']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_2" placeholder="" name="license_no_2" size="1" maxlength="1" onkeypress="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_2'])) {echo "value='"; print_r($data['license_no_2']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_3" placeholder="" name="license_no_3" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_3'])) {echo "value='"; print_r($data['license_no_3']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_4" placeholder="" name="license_no_4" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_4'])) {echo "value='"; print_r($data['license_no_4']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_5" placeholder="" name="license_no_5" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_5'])) {echo "value='"; print_r($data['license_no_5']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_6" placeholder="" name="license_no_6" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_6'])) {echo "value='"; print_r($data['license_no_6']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_7" placeholder="" name="license_no_7" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_7'])) {echo "value='"; print_r($data['license_no_7']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_8" placeholder="" name="license_no_8" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_8'])) {echo "value='"; print_r($data['license_no_8']); echo "'";} ?>>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="license_no_9" placeholder="" name="license_no_9" size="1" maxlength="1" onchange="ValidatePassKey(this)"
                                                    <?php if (isset($data['license_no_9'])) {echo "value='"; print_r($data['license_no_9']); echo "'";} ?>>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                    if(isset($error['license_no_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['license_no_error'] . "</div>";
                                    }
                                    if(isset($error['license_no_1_uppercase_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['license_no_1_uppercase_error'] . "</div>";
                                    }
                                    if(isset($error['license_no_1_alphabetic_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['license_no_1_alphabetic_error'] . "</div>";
                                    }
                                     ?>
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
                                    <label for="contact_no">Contact No</label>
                                    <table>
                                        <tr>
                                            <td style="padding-right: 8px">
                                                <p>+94</p>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="contact_no" placeholder="Type here" name="contact_no" maxlength="9"
                                                    <?php if (isset($data['contact_no'])) {echo "value='"; print_r($data['contact_no']); echo "'";} ?>>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                    if(isset($error['contact_no_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['contact_no_error'] . "</div>";
                                    } ?>
                                </div>



                                <div class="form-group">
                                    <button type="reset" class="w3-button w3-teal">Reset Form</button>
                                    <button type="submit" class="w3-button w3-teal" name="submit" style="float: right;">Submit</button>
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
</body>



<script>
    //button active mode

    function ValidatePassKey(tb) {
//        if (tb.maxLength >= 1){
//            document.getElementById(tb.id + 1).focus();
//        }
        var txtbox1 = document.getElementById("1");
        var txtbox2 = document.getElementById("2");
        var txtbox3 = document.getElementById("3");
        var txtbox4 = document.getElementById("4");
        var txtbox5 = document.getElementById("5");
        var txtbox6 = document.getElementById("6");
        var txtbox7 = document.getElementById("7");
        var txtbox8 = document.getElementById("8");
        var txtbox9 = document.getElementById("9");

        if(txtbox1.length==txtbox1.maxLength){
            txtbox2.focus();
        }

    }

</script>


</html>