

    <div class="w3-container w3-padding-large">
    <h2 id="title" style="display: none;"><b>Assign Jobs</b></h2>

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



    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Maintenance Section - Assign Jobs</h3></div>
                        <div class="col-sm-8">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/assign_jobs" method="post">
                                <div class="form-group">
                                    <label for="id">Job ID</label>
                                    <input type="text" class="form-control" id="id" placeholder="Type here" name="id"
                                        <?php if (isset($data['id'])) {echo "value='"; print_r($data['id']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['id_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['id_error'] . "</div>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label for="supervisor">Supervisor</label>
                                    <input type="text" class="form-control" id="supervisor" placeholder="Type here" name="supervisor"
                                        <?php if (isset($data['supervisor'])) {echo "value='"; print_r($data['supervisor']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['supervisor_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['supervisor_error'] . "</div>";
                                    } ?>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="w3-button w3-teal" name="submit">Submit</button>
                                    <button type="reset" class="w3-button w3-teal">Reset Form</button>
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
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }

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

        //button active mode
        var page_title = document.getElementById("title").innerHTML;


        if(page_title.indexOf("View Jobs")>-1){
            document.getElementById("btn_view_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
        }
        else if(page_title.indexOf("View Stock")>-1){
            document.getElementById("btn_view_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
        }
        else if(page_title.indexOf("Assign Jobs")>-1){
            document.getElementById("btn_assign_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
        }
        else if(page_title.indexOf("Stock Request")>-1){
            document.getElementById("btn_stock_request").setAttribute("class","w3-bar-item w3-button w3-teal");
        }


    </script>