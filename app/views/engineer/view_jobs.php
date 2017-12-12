


    <div class="w3-container w3-padding-large">
        <h2 id="title" style="display: none;"><b>View Jobs</b></h2>

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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Search Job to Assign Supervisor</h3></div>
                        <div class="col-sm-12">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/engineer_view_job_entry" method="post">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="search">Search Keyword</label>
                                        <input type="search" class="form-control" id="search" placeholder="Type here" name="search"
                                            <?php if (isset($data['search'])) {echo "value='"; print_r($data['search']); echo "'";} ?>>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Search Type</label>
                                        <select class="form-control" id="search_type" name="search_type">
                                            <option value="vehicle.registration_no">Vehicle Registration Number</option>
                                            <option value="driver.name">Job Applicant / Driver</option>
                                            <option value="user">User</option>
                                            <option value="description">Job Description</option>
                                        </select>
                                    </div>
                                </div>

                                <table class="w3-table-all w3-hoverable" id="jobList"></table>

                                <!--search table-->
<!--                                <table class="table" id="search_table" style="display: none">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <th>ID</th>-->
<!--                                        <th>Vehicle Registration No</th>-->
<!--                                        <th>Date</th>-->
<!--                                        <th>Description</th>-->
<!--                                        <th>Job Applicant</th>-->
<!--                                        <th></th>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    --><?php //if(!isset($data['display'])){ foreach ($data as $value){
//                                        echo "
//                                        <tr>
//                                            <td>".$value['id']."</td>
//                                            <td>".$value['registration_no']."</td>
//                                            <td>".$value['date']."</td>
//                                            <td>".$value['description']."</td>
//                                            <td>".$value['name']."</td>
//                                            <td><a href='".$GLOBALS['base_url']."/JobController/pass_job_id/".$value['id']."' class=\"w3-bar-item w3-button w3-blue\">Accept</a></td>
//                                        </tr> ";}}?>
<!---->
<!--                                    </tbody>-->
<!--                                </table>-->
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

            $('#search').keyup(function() {
                var query = $(this).val();
                var query2 = $('#search_type').val();
                if (query != '') {
                    $.ajax({
                        url:"<?php echo $GLOBALS['base_url']; ?>/JobController/getJobAuto/0",
                        method:"POST",
                        data:{query:query, query2:query2},
                        success:function(data) {
                            $('#jobList').fadeIn(100);
                            $('#jobList').html(data);
                        }
                    });
                }
                else {
                    $('#jobList').fadeOut();
                }
            });
            $(document).on('click','#jobList li',function() {
                if ($(this).text() != 'No matches found') {
                    $('#search').val($(this).text());
                    $('#jobList').fadeOut(100);
                }
            });

            console.log('1111111111111111111111111');

        });



    </script>