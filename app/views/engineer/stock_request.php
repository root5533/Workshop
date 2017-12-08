

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
                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/insertStockRequest" method="post">
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
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Maintenance Section - Stock Requests</h3></div>
                        <div class="col-sm-12">

                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/open_stock_request" method="post" id="form1">


                                <div class="form-group">
                                    <label for="id">Job ID</label>
                                    <input type="text" class="form-control" id="id" placeholder="Type here" name="id"
                                        <?php if (isset($data['id'])) {echo "value='"; print_r($data['id']); echo "'";} ?>>
                                    <?php
                                    if(isset($error['id_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['id_error'] . "</div>";
                                    } ?>
                                </div>


                                <div class="form-group w3-border-bottom">
                                    <label for="rows">Stock Requisition</label>
                                </div>

                                <br>
                            </form>

                            <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/addStockItemTableRows" method="post" id="form2" >

                                <div class="form-group w3-row-padding">
                                    <div class="w3-third">
                                        <label for="rows">No. of Stock Items</label>
                                    </div>
                                    <div class="w3-third">
                                        <input type="text" class="form-control" id="rows" placeholder="Type here" name="rows"
                                            <?php if (isset($data['rows'])) {echo "value='"; print_r($data['rows']); echo "'";} ?>>
                                    </div>
                                    <div class="w3-third">
                                        <button type="submit" class="w3-button w3-blue" name="add_rows" form="form2">Add</button>
                                    </div>
                                    <?php
                                    if(isset($error['rows_error'])) {
                                        echo "<div class='' style='color: indianred'>" . $error['rows_error'] . "</div>";
                                    } ?>
                                </div>


                                <table class="table" id="stock_item_table">
                                    <thead>
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($data['rows'])){ for ($x = 0; $x < $data['rows']; $x++){
                                        echo " 
                                        <tr>
                                            <td><input type='text' class='form-control' id='item_code_".$x."' placeholder='Type here' name='item_code_".$x."'></td>
                                            <td><input type='text' class='form-control' id='amount_".$x."' placeholder='Type here' name='amount_".$x."'></td>
                                            <td><input type='text' class='form-control' id='description_".$x."' placeholder='Type here' name='description_".$x."'></td>
                                            </tr> ";}}?>

                                    </tbody>
                                </table>

                            </form>


                                <div class="form-group">
                                    <button type="submit" class="w3-button w3-teal" name="submit" form="form1">Submit</button>
                                    <button type="reset" class="w3-button w3-teal">Reset Form</button>
                                </div>


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