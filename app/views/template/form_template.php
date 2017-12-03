<!DOCTYPE>

<html>

<?php require_once 'head.php'; ?>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php require_once 'side_bar.php'; ?>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px">

    <?php require_once 'top_bar.php'; ?>

    <div class="w3-container w3-padding-large">
        <h2><b>Function</b></h2>
        <?php
        if (isset($data['message'])) {
            echo "<h4 style='color: green;'>" . $data['message'] . "</h4>";
        } ?>
    </div>

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
                    <h3>Form title</h3>
                    <div class="col-sm-8" style="padding-top: 10px;">
                        <form action=<?php echo "$base_url/DriverController/driver_registration" ?> method="post">
                            <div class="form-group">
                                <label for="name">input 1</label>
                                <input type="text" class="form-control" id="name" placeholder="Type here" name="name"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['name']); echo "'";} ?>>
                                <?php
                                if(isset($error['name_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['name_error'] . "</div>";
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="NIC">input 2</label>
                                <input class="form-control" type="text" id="nic" placeholder="Type here" name="nic"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['nic']); echo "'";} ?>>
                                <?php if(isset($error['nic_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['nic_error'] . "</div>";
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="driver_license">input 3</label>
                                <input class="form-control" type="text" id="driver_license" placeholder="Type here" name="license"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['license']); echo "'";} ?>>
                                <?php if(isset($error['license_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['license_error'] . "</div>";
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="address">input 4</label>
                                <input class="form-control" type="text" id="address" placeholder="Type here" name="address"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['address']); echo "'";} ?>>
                                <?php if(isset($error['address_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['address_error'] . "</div>";
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="contact">input 5</label>
                                <input class="form-control" type="number" id="contact" placeholder="Type Here" name="contact"
                                    <?php if (isset($data['name'])) {echo "value='"; print_r($data['contact']); echo "'";} ?>>
                                <?php if(isset($error['contact_error'])) {
                                    echo "<div class='' style='color: indianred'>" . $error['contact_error'] . "</div>";
                                } ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="w3-button w3-teal" name="submit">Submit</button>
                                <button type="reset" class="w3-button w3-teal">Reset Form</button>
                            </div>
                        </form>
                    </div>
                </div>
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
</script>


</html>