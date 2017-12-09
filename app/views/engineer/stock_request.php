

    <div class="w3-container w3-padding-large">
    <h2 id="title" style="display: none;"><b>Stock Request</b></h2>

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
                                <table class="w3-table w3-bordered">
                                    <col width="30%">
                                    <col width="70%">
                                    <tr>
                                        <td>Job</td>
                                        <td><?php echo $data['vehicle']; ?> : <?php echo $data['description']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Stock Item Requested</td>
                                        <td><?php echo $data['stock']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><?php echo $data['amount']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/insertStockRequest" method="post">
                                <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                                <input type="hidden" value="<?php echo $data['stock']; ?>" name="stock">
                                <input type="hidden" value="<?php echo $data['amount']; ?>" name="amount">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal">Back</button>
                                <button type="submit" class="w3-button w3-teal" style="float: right;" name="submit">Submit</button>
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
        if(isset($data['display']) AND !empty($data['display'])) { ?>
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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Stock Requests</h3></div>
                        <div class="col-sm-12">

                                <ul class="w3-ul w3-margin-bottom">
                                    <li><h4>Job Details</h4></li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Applicant / Driver <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['driver']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Vehicle Number <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['vehicle']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Description <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['description']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Job Open Date <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['date']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w3-container">
                                            <div class="col-sm-5">
                                                Supervisor Assigned <b>:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php echo $data['supervisor']; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li></li>
                                </ul>




                            <div class="w3-border-bottom w3-margin-bottom">
                                <label for="rows">Stock Request</label>
                            </div>

                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/addStockItem" method="post" class="form-horizontal" autocomplete="off">

                                <input type="hidden" value="<?php echo $data['id']; ?>" name="jobid">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Stock Item</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="stock" placeholder="Search" name="stock">
                                        <?php
                                        if(isset($error['stock'])) {
                                            echo "<div class='w3-panel w3-red'><h5>" . $error['stock'] . "</h5></div>";
                                        } ?>
                                        <div id="itemList" class="w3-container" style="padding: 0px;"></div>
                                    </div>
                                    <label class="control-label col-sm-2">Amount</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="number" name="amount">
                                        <?php
                                        if(isset($error['amount'])) {
                                            echo "<div class='w3-panel w3-red'><h5>" . $error['amount'] . "</h5></div>";
                                        } ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" name="submit" class="w3-button w3-teal">Add Stock</button>
                                    </div>
                                </div>

                                <table class="w3-table w3-margin-bottom" id="stock_item_table">
                                    <tr class="w3-teal">
                                        <td>Item Code</td>
                                        <td>Amount</td>
                                        <td>Date Requested</td>
                                        <td>Issue Status</td>
                                    </tr>
                                    <?php
                                    if($data['requested'] != null) {
                                        foreach ($data['requested'] as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['stock_id']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td>
                                            <?php
                                            if($row['issue'] == 0) {
                                                echo "<span style='color: red;'>Not issued</span>";
                                            }
                                            else {
                                                echo "<span style='color: teal;'>Issued</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else { ?>
                                    <tr>
                                        <td colspan="4">No stock requests made yet</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>

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

        $(document).ready(function() {
            $('#stock').keyup(function() {
                console.log("hdjfgjhdfg")
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url:"<?php echo $GLOBALS['base_url']; ?>/StockController/getStockAuto",
                        method:"POST",
                        data:{query:query},
                        success:function(data) {
                            $('#itemList').fadeIn(100);
                            $('#itemList').html(data);
                        }
                    });
                }
                else {
                    $('#itemList').fadeOut(100);
                    $('#stockList').html(allStock);
                }
            });
            $(document).on('click','#itemList li',function() {
                if ($(this).text() != 'No items match') {
                    var query2 = $(this).text();
                    $('#stock').val(query2);
                    $('#itemList').fadeOut(100);
                }
            });
        });

    </script>