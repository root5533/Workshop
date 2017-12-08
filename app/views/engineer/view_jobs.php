


    <div class="w3-container w3-padding-large">
        <h2 id="title" style="display: none;"><b>View Jobs</b></h2>

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
                                <div class="col-sm-4">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li>Vehicle Registration No<span style="float: right;"><b>:</b></span></li>
                                        <li>Date<span style="float: right;"><b>:</b></span></li>
                                        <li>Description<span style="float: right;"><b>:</b></span></li>
                                        <li>Job Applicant<span style="float: right;"><b>:</b></span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-8">
                                    <ul style="list-style-type: none" class="w3-ul">
                                        <li><?php echo $data['id_vehicle']; ?></li>
                                        <li><?php echo $data['date']; ?></li>
                                        <li><?php echo $data['description']; ?></li>
                                        <li><?php echo $data['job_applicant']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/insertJob" method="post">
                                <input type="hidden" value="<?php echo $data['id_vehicle']; ?>" name="id_vehicle">
                                <input type="hidden" value="<?php echo $data['date']; ?>" name="date">
                                <input type="hidden" value="<?php echo $data['description']; ?>" name="description">
                                <input type="hidden" value="<?php echo $data['job_applicant']; ?>" name="job_applicant">
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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Maintenance Section - View Job Entries</h3></div>
                        <div class="col-sm-12">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/engineer_view_job_entry" method="post">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="search">Search Keyword</label>
                                        <input type="search" class="form-control" id="id_vehicle" placeholder="Type here" name="search"
                                            <?php if (isset($data['search'])) {echo "value='"; print_r($data['search']); echo "'";} ?>>
                                        <?php
                                        if(isset($error['search_error'])) {
                                            echo "<div class='' style='color: indianred'>" . $error['search_error'] . "</div>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Search Type</label>
                                        <select class="form-control" id="search_type" name="search_type">
                                            <option value="id">ID</option>
                                            <option value="id_vehicle">Vehicle Registration No</option>
                                            <option value="date">Date</option>
                                            <option value="job_applicant">Job Applicant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="w3-button w3-teal" name="submit">Search</button>
                                    </div>
                                </div>




                                <!--search table-->
                                <table class="table" id="search_table" style="display: none">
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
                                    <?php if(!isset($data['display'])){ foreach ($data as $value){
                                        echo " 
                                        <tr>
                                            <td>".$value['id']."</td>
                                            <td>".$value['registration_no']."</td>
                                            <td>".$value['date']."</td>
                                            <td>".$value['description']."</td>
                                            <td>".$value['name']."</td>
                                            <td><a href='".$GLOBALS['base_url']."/JobController/pass_job_id/".$value['id']."' class=\"w3-bar-item w3-button w3-blue\">Accept</a></td>
                                        </tr> ";}}?>

                                    </tbody>
                                </table>
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

//        var url = window.location.href;
//
//        if(url.indexOf("view_job_entry")>-1){
//            document.getElementById("search_table").style.display = "table";
//        }
//
//        //button active mode
//        var page_title = document.getElementById("title").innerHTML;
//
//
//        if(page_title.indexOf("View Jobs")>-1){
//            document.getElementById("btn_view_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
//        }
//        else if(page_title.indexOf("View Stock")>-1){
//            document.getElementById("btn_view_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
//        }
//        else if(page_title.indexOf("Assign Jobs")>-1){
//            document.getElementById("btn_assign_jobs").setAttribute("class","w3-bar-item w3-button w3-teal");
//        }
//        else if(page_title.indexOf("Stock Request")>-1){
//            document.getElementById("btn_stock_request").setAttribute("class","w3-bar-item w3-button w3-teal");
//        }



    </script>