<!DOCTYPE>

<html>

    <div class="w3-container w3-padding-large">
        <h2 id="title"></h2>
        <button type="button" onclick="myfunction()">
            Click me to display Date and Time.
        </button>

        <?php
        if (isset($data['message'])) {
            echo "<h4 style='color: green;'>" . $data['message'] . "</h4>";
        } ?>
    </div>

    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-padding-large">
                <div class="row-content">
<!--                    <h3>Driver Registration</h3>-->
                    <div class="col-sm-8" style="padding-top: 10px;">
                        <form action=<?php echo $GLOBALS['base_url'] . "/maintenance/driver_registration" ?> method="post">
                            <h3>Assign Supervisor to Open Job</h3>
                            <div class="form-group">
                                <label for="name">Job Entry</label>
                                <input type="text" class="form-control" id="name" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <label for="NIC">Select employee to be assigned</label>
                                <input class="form-control" type="text" id="nic" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <button type="button" class="w3-button w3-teal">Submit</button>
                                <button type="button" class="w3-button w3-teal">Reset Form</button>
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
    load_unseen_notification();

//    $('#comment_form').on('submit', function(event){
//        event.preventDefault();
//        if($('#subject').val() != '' && $('#comment').val() != '')
//        {
//            var form_data = $(this).serialize();
//            $.ajax({
//                url:"insert.php",
//                method:"POST",
//                data:form_data,
//                success:function(data)
//                {
//                    $('#comment_form')[0].reset();
//                    load_unseen_notification();
//                }
//            });
//        }
//        else
//        {
//            alert("Both Fields are Required");
//        }
//    });

    $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
    });

    setInterval(function(){
        load_unseen_notification();;
    }, 5000);

    });
</script>


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