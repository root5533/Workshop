<?php $GLOBALS['issue']=TRUE;?>

    <div class="w3-container w3-padding-large">
        <h2 id="title" style="display: none;"><b>Stock Approval</b></h2>

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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Stock Issue</h3></div>
                        <div class="col-sm-12">
                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/updateStock/<?php echo $data['id'];?>" method="post">


                                <div class='w3-container w3-padding-large'>
                                    <div class='w3-container w3-padding-large'>
                                        <div class='col-sm-12'>
                                            <ul class='w3-ul'>
                                                <h4><li>Job ID : <?php echo $data['id'];?></li></h4>
                                            </ul>
                                        </div>
                                        <table class='w3-table-all w3-hoverable'>
                                            <thead>
                                            <tr class='w3-teal'>
                                                <th>Item Code</th>
                                                <th>Amount</th>
                                                <th>Stock Status</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            if ($data['jobstock'] != null) {
                                                foreach ($data['jobstock'] as $value) {
                                                    if ($value['job_amount'] <= $value['stock_amount']) {
                                                        echo "
                                                    <tr>
                                                        <td>" . $value['stock_id'] . "</td>
                                                        <td>" . $value['job_amount'] . "</td>
                                                        <td><i class='glyphicon glyphicon-ok-circle' style='color: green'></i><span style='font-size: small'> Available</span></td>
                                                    </tr>";
                                                    } else {
                                                        $GLOBALS['issue'] = FALSE;
                                                        echo "
                                                    <tr>
                                                        <td>" . $value['stock_id'] . "</td>
                                                        <td>" . $value['job_amount'] . "</td>
                                                        <td><i class='glyphicon glyphicon-remove-circle' style='color: red'></i><span style='font-size: small'> Not Available</span></td>
                                                    </tr>";
                                                    }
                                                }
                                            }
                                            else { ?>

                                            <tr><td colspan="3">No Items requested for selected job</td></tr>

                                            <?php } ?>

                                        </table>

                                        <br>
                                        <?php if($GLOBALS['issue']){?>
                                            <button type="submit" class="w3-button w3-teal" name="submit" style="float: right;">Issue</button>
                                        <?php }
                                        else { ?>
                                            <a href="<?php echo $GLOBALS['base_url']; ?>/SKController/load_view/requisitions" type="submit" class="w3-button w3-teal" name="submit" style="float: right;">Purchase Stock</a>
                                        <?php } ?>

                                    </div>

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
        document.getElementById("notifButton").addEventListener("click", displayStoreNotification);

        loadStoreNotification();

        window.setInterval(loadStoreNotification, 5000);
    </script>