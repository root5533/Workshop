

<div class="w3-container w3-padding-large">
    <h2 id="title" style="display: none;"><b>Stock Purchases</b></h2>

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
                    <div class="w3-container w3-teal w3-margin-bottom"><h3>Stores Department - Purchase Request Form</h3></div>
                    <div class="col-sm-8">
                        <form action="<?php echo $GLOBALS['base_url']; ?>/StockController/assign_jobs" method="post">
                            <div class="form-group">
                                <label for="id">Employee ID</label>
                                <input type="text" class="form-control" id="id" placeholder="Type here" name="id"
                                    <?php if (isset($data['id'])) {echo "value='"; print_r($data['id']); echo "'";} ?>>
                                <?php
                                if(isset($error['id_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['id_error'] . "</div>";
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="emp_name">Name of requesting officer</label>
                                <input class="form-control" type="text" id="name" placeholder="Type here" name="name"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['name']); echo "'";} ?>>
                                <?php if(isset($error['name_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['name_error'] . "</div>";
                                } ?>
                            </div>

                            <div class="form-group">
                                <label for="date_wanted">Date at which stock is Required</label>
                                <input class="form-control" type="date" id="date_wanted" name="date_wanted"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['date_wanted']); echo "'";} ?>>
                                <?php if(isset($error['date_wanted_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['date_wanted_error'] . "</div>";
                                } ?>
                            </div>

                            <div class="form-group">
                                <table class="w3-table w3-bordered">
                                    <tr>
                                        <th style="text-align:center;">Item</th>
                                        <th style="text-align:center;">Item Description</th>
                                        <th style="text-align:center;">Quantity</th>
                                        <th style="text-align:center;">Remarks</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" id="item" placeholder="Type here" name="item"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['item']); echo "'";} ?>>
                                            <?php if(isset($error['item_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['item_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="itemDesc" placeholder="Type here" name="itemDesc" size="50"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['itemDesc']); echo "'";} ?>>
                                            <?php if(isset($error['itemDesc_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['itemDesc_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="number"  id="quantity" placeholder="00" name="quantity" style="width:60px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['quantity']); echo "'";} ?>>
                                            <?php if(isset($error['quantity_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['quantity_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <!--		                            <input class="form-control" type="text" id="remarks" placeholder="Type here" name="remarks"-->
                                            <textarea cols="40" rows="1" class="form-control" id="remarks" placeholder="Type here" name="remarks" style="height:35px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['remarks']); echo "'";} ?>></textarea>
                                            <?php if(isset($error['remarks_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['remarks_error'] . "</div>";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" id="item" placeholder="Type here" name="item"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['item']); echo "'";} ?>>
                                            <?php if(isset($error['item_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['item_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="itemDesc" placeholder="Type here" name="itemDesc" size="50"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['itemDesc']); echo "'";} ?>>
                                            <?php if(isset($error['itemDesc_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['itemDesc_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="number"  id="quantity" placeholder="00" name="quantity" style="width:60px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['quantity']); echo "'";} ?>>
                                            <?php if(isset($error['quantity_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['quantity_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <!--		                            <input class="form-control" type="text" id="remarks" placeholder="Type here" name="remarks"-->
                                            <textarea cols="40" rows="1" class="form-control" id="remarks" placeholder="Type here" name="remarks" style="height:35px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['remarks']); echo "'";} ?>></textarea>
                                            <?php if(isset($error['remarks_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['remarks_error'] . "</div>";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" id="item" placeholder="Type here" name="item"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['item']); echo "'";} ?>>
                                            <?php if(isset($error['item_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['item_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="itemDesc" placeholder="Type here" name="itemDesc" size="50"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['itemDesc']); echo "'";} ?>>
                                            <?php if(isset($error['itemDesc_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['itemDesc_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="number"  id="quantity" placeholder="00" name="quantity" style="width:60px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['quantity']); echo "'";} ?>>
                                            <?php if(isset($error['quantity_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['quantity_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <!--		                            <input class="form-control" type="text" id="remarks" placeholder="Type here" name="remarks"-->
                                            <textarea cols="40" rows="1" class="form-control" id="remarks" placeholder="Type here" name="remarks" style="height:35px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['remarks']); echo "'";} ?>></textarea>
                                            <?php if(isset($error['remarks_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['remarks_error'] . "</div>";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" id="item" placeholder="Type here" name="item"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['item']); echo "'";} ?>>
                                            <?php if(isset($error['item_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['item_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="itemDesc" placeholder="Type here" name="itemDesc" size="50"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['itemDesc']); echo "'";} ?>>
                                            <?php if(isset($error['itemDesc_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['itemDesc_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="number"  id="quantity" placeholder="00" name="quantity" style="width:60px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['quantity']); echo "'";} ?>>
                                            <?php if(isset($error['quantity_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['quantity_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <!--		                            <input class="form-control" type="text" id="remarks" placeholder="Type here" name="remarks"-->
                                            <textarea cols="40" rows="1" class="form-control" id="remarks" placeholder="Type here" name="remarks" style="height:35px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['remarks']); echo "'";} ?>></textarea>
                                            <?php if(isset($error['remarks_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['remarks_error'] . "</div>";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" id="item" placeholder="Type here" name="item"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['item']); echo "'";} ?>>
                                            <?php if(isset($error['item_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['item_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="itemDesc" placeholder="Type here" name="itemDesc" size="50"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['itemDesc']); echo "'";} ?>>
                                            <?php if(isset($error['itemDesc_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['itemDesc_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <input class="form-control" type="number"  id="quantity" placeholder="00" name="quantity" style="width:60px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['quantity']); echo "'";} ?>>
                                            <?php if(isset($error['quantity_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['quantity_error'] . "</div>";
                                            } ?>
                                        </td>

                                        <td>
                                            <!--		                            <input class="form-control" type="text" id="remarks" placeholder="Type here" name="remarks"-->
                                            <textarea cols="40" rows="1" class="form-control" id="remarks" placeholder="Type here" name="remarks" style="height:35px;"
                                                <?php if (isset($data['name'])) {echo "value='"; print_r($data['remarks']); echo "'";} ?>></textarea>
                                            <?php if(isset($error['remarks_error'])) {
                                                echo "<div class='' style='color: indianred'>" . $error['remarks_error'] . "</div>";
                                            } ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="w3-button w3-teal" name="submit">Send for Approval</button>
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

    document.getElementById("notifButton").addEventListener("click", displayStoreNotification);

    loadStoreNotification();

    window.setInterval(loadStoreNotification, 5000);


</script>