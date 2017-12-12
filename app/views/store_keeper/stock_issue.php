

    <div class="w3-container w3-padding-large">
        <h2 id="title" style="display: none;"><b>Stock Approval</b></h2>

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
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Select Job to Issue Stock</h3></div>
                        <div class="col-sm-12">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/JobController/" method="post">

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
                                    <?php foreach ($data as $value){
                                        echo " 
                                        <tr>
                                            <td>".$value['id']."</td>
                                            <td>".$value['registration_no']."</td>
                                            <td>".$value['date']."</td>
                                            <td>".$value['description']."</td>
                                            <td>".$value['name']."</td>
                                            <td><a href=".$GLOBALS['base_url']."/StockController/checkJobStock/".$value['id']." class='w3-bar-item w3-button w3-blue'>View</a></td>
                                        </tr> ";}?>

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

        document.getElementById("notifButton").addEventListener("click", displayStoreNotification);

        loadStoreNotification();

        window.setInterval(loadStoreNotification, 5000);


    </script>