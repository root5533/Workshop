    <div class="w3-container w3-padding-large">

    </div>


<!--    main body content-->

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="w3-container w3-teal w3-margin-bottom"><h3>Stock - Inventory</h3></div>
                        <div class="w3-container">
                            <div class="form-group">
                                <label for="item">Search Inventory</label>
                                <input class="form-control" id="item" name="item" placeholder="Search by item name or item code" style="width: 30%;">
                                <div id="itemList" class="w3-container" style="padding: 0px; width:35%;"></div>
                            </div>
                        </div>
                        <div class="w3-container" id="stockList">
                            <?php
                            if(isset($data)) {

                                $count = 0;

                                foreach ($data as $row) {
                                    if ($count%4 == 0) {
                                        if ($count == 0) {
                                            echo "<div class='row'>";
                                        }
                                        else {
                                            echo "</div>";
                                            echo "<div class='row'>";
                                        }
                                    }
                                    $count += 1;
                                    ?>

                                    <div class="w3-quarter w3-container w3-margin-bottom">
                                        <header class="w3-container w3-blue">
                                            <h1><?php echo $row['amount']; ?><span style="font-size: small">Available</span> </h1>
                                        </header>
                                        <div class="w3-container w3-light-grey">
                                            <h5><?php echo $row['description'] . " : " . $row['item_code']; ?></h5>
                                        </div>
                                    </div>

                            <?php   }
                            }

                            ?>
                        </div>
<!--                            <div class="w3-quarter w3-container">-->
<!--                                <header class="w3-container w3-blue">-->
<!--                                    <h1>55 <span style="font-size: small">Available</span> </h1>-->
<!--                                </header>-->
<!--                                <div class="w3-container w3-light-grey">-->
<!--                                    <h4>Spanner</h4>-->
<!--                                </div>-->
<!--                            </div>-->
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

    allStock = document.getElementById('stockList').innerHTML;

    $(document).ready(function() {
        $('#item').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/StockController/getStockAuto",
                    method:"POST",
                    data:{query:query},
                    success:function(data) {
                        $('#itemList').fadeIn(1);
                        $('#itemList').html(data);
                    }
                });
            }
            else {
                $('#itemList').fadeOut();
                $('#stockList').html(allStock);
            }
        });
        $(document).on('click','#itemList li',function() {
            if ($(this).text() != 'No items match') {
                var query2 = $(this).text();
                $('#item').val(query2);
                $('#itemList').fadeOut(1);
                var code = query2.slice(-5);
                console.log("code is " + code);
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/StockController/getStockItem",
                    method:"POST",
                    data:{query:code},
                    success:function(data) {
                        $('#stockList').html(data);
                    }
                });
            }
        });
    });


    document.getElementById("notifButton").addEventListener("click", displayTONotification);

    loadTONotification();

    window.setInterval(loadTONotification, 8000);

</script>


</html>