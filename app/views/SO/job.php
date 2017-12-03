
<?php //require_once '../template/head.php'; ?>

<?php //require_once 'side_bar.php'; ?>


<!--    --><?php //require_once '../template/top_bar.php'; ?>

    <div class="w3-container w3-padding-large">
        <h2><b></b></h2>
        <?php
        if (isset($data['message'])) {
            echo "<p style='color: green;'>" . $data['message'] . "</p>";
        } ?>
    </div>

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <div class="w3-bar w3-teal w3-medium">
                        <button class="w3-bar-item w3-button" style="width: 33%;" onclick="openVehicleForm('openJob')">Open Job</button>
                        <button class="w3-bar-item w3-button" style="width: 33%;" onclick="openVehicleForm('closeJob')">Close Job</button>
                        <button class="w3-bar-item w3-button" style="width: 34%;" onclick="openVehicleForm('supAssign')">Assign Job</button>

                    </div>
                </div>
                <div class="col-sm-8">
                <div id="openJob" class="w3-container job">
                    <h3>Open Job Entry</h3>
                    <form action="#">
                        <div class="form-group">
                            <label for="name">Vehicle Registration Number</label>
                            <input type="text" class="form-control" id="name" placeholder="Type here">
                        </div>
                        <div class="form-group">
                            <label for="NIC">Details about Maintenance Job</label>
                            <input class="form-control" type="text" id="nic" placeholder="Type here">
                        </div>
                        <div class="form-group">
                            <label for="driver_license">Name of the applicant</label>
                            <input class="form-control" type="text" id="driver_license" placeholder="Type here">
                        </div>
                        <div class="form-group">
                            <button type="button" class="w3-button w3-teal">Submit</button>
                            <button type="button" class="w3-button w3-teal">Reset Form</button>
                        </div>
                    </form>
                </div>

<!--                <div id="closeJob" class="w3-container job" style="display:none">-->
<!--                    <h3>Close Job Entry</h3>-->
<!--                    <form action="#">-->
<!--                        <div class="form-group">-->
<!--                            <label for="driver_license">Select closing job entry</label>-->
<!--                            <input class="form-control" type="text" id="driver_license" placeholder="Type here">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <button type="button" class="w3-button w3-teal">Submit</button>-->
<!--                            <button type="button" class="w3-button w3-teal">Reset Form</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div id="supAssign" class="w3-container job" style="display:none">-->
<!--                    <h3>Assign Supervisor to Open Job</h3>-->
<!--                    <form action="#">-->
<!--                        <div class="form-group">-->
<!--                            <label for="name">Job Entry</label>-->
<!--                            <input type="text" class="form-control" id="name" placeholder="Type here">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="NIC">Select employee to be assigned</label>-->
<!--                            <input class="form-control" type="text" id="nic" placeholder="Type here">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <button type="button" class="w3-button w3-teal">Submit</button>-->
<!--                            <button type="button" class="w3-button w3-teal">Reset Form</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
            </div>
        </div>
    </div>



<!--    --><?php //require_once 'footer.php'; ?>

</div>
</body>



<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    function openVehicleForm(jobForm) {
        var i;
        var x = document.getElementsByClassName("job");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(jobForm).style.display = "block";
    }
</script>


</html>