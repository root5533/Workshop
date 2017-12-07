
    <div class="w3-row-padding">
        <div class="w3-container w3-margin-bottom w3-padding-small">
            <div class="col-md-9 col-sm-12">
                <div class="row-content">
                    <div class="w3-bar w3-teal w3-medium">
<!--                        <button class="w3-bar-item w3-button" style="width: 33%;" onclick="openVehicleForm('openJob')">Open Job</button>-->
<!--                        <button class="w3-bar-item w3-button" style="width: 33%;" onclick="openVehicleForm('closeJob')">Close Job</button>-->
<!--                        <button class="w3-bar-item w3-button" style="width: 34%;" onclick="openVehicleForm('supAssign')">Assign Job</button>-->
                    </div>
                </div>
                <div class="col-sm-10">
                    <div id="openJob" class="w3-container job">
                        <h3 style="margin: 8px 0px;">Open Job Entry</h3>
                        <form action="<?php echo $GLOBALS['base_url']; ?>/jobCon/openJob" method="post">
                            <div class="form-group">
                                <label for="id_driver">Driver Name</label>
                                <input type="text" class="form-control" id="driver" placeholder="Type here" name="id_driver">
                                <div id="driverList" class="w3-container"></div>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="name">Vehicle Registration Number</label>
                                <input type="text" class="form-control" name="number" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <label for="NIC">Details about Maintenance Job</label>
                                <input class="form-control" type="text" name="details" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <label for="driver_license">Name of the applicant</label>
                                <input class="form-control" type="text" name="applicant" placeholder="Type here">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="w3-button w3-teal" name="submit">Submit</button>
                                <button type="reset" class="w3-button w3-teal">Reset Form</button>
                            </div>
                        </form>
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
</body>



<script>

    document.getElementById("notifButton").addEventListener("click", loadDoc);

//    function loadDoc() {
//        console.log("loadDoc call")
//        var x = document.getElementById("notification");
//        if (x.style.display === "none") {
//            x.style.display = "block";
//        } else {
//            x.style.display = "none";
//        }
//        load_notification("yes");
//    }
//
//    function load_notification(view='') {
//        console.log("loading notifications");
//        var xhttp = new XMLHttpRequest();
//        xhttp.onreadystatechange = function() {
//            if (this.readyState == 4 && this.status == 200) {
//                var data = JSON.parse(this.responseText);
////                console.log(data);
//                document.getElementById("notification").innerHTML = data.notification;
//                if (data.unseen_notification > 0) {
//                    document.getElementById("count").innerHTML = data.unseen_notification;
//                }
//                else{
//                    document.getElementById("count").innerHTML = '';
//                }
//            }
//        };
//
//        xhttp.open("POST", "/wshop/public/notificationCon/openJob", true);
//        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//        xhttp.send("view="+view);
//
//
//        summmeeddhhaaaaaaa
//        var data = {'titile' : 'mytitile', 'content' : 'mycontent'};
//
//        var div = document.createElement('div');
//        var a = document.createElement('a');
//        div.appendChild(a);
//        a.innerHTML = data['content'];
//        a.href = data['title'];
//        ------------------------
//    }

    load_notification();

    window.setInterval(test, 5000);

    $(document).ready(function() {
        $('#driver').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url:"<?php echo $GLOBALS['base_url']; ?>/DriverController/getDriverAuto",
                    method:"POST",
                    data:{query:query},
                    success:function(data) {
                        $('#driverList').fadeIn();
                        $('#driverList').html(data);
                    }
                });
            }
            else {
                $('#driverList').fadeOut();
            }
        });
        $(document).on('click','li',function() {
            if ($(this).text() != 'No driver found') {
                $('#driver').val($(this).text());
                $('#driverList').fadeOut();
            }
        });
    });

//    function test() {
//        load_notification();
//    }
//
//    function hideNotif() {
//        var x = document.getElementById("notification");
//        if (x.style.display === "none") {
//            x.style.display = "block";
//        } else {
//            x.style.display = "none";
//        }
//    }
//    // Script to open and close sidebar
//    function w3_open() {
//        document.getElementById("mySidebar").style.display = "block";
////        document.getElementById("myOverlay").style.display = "block";
//    }
//
//    function w3_close() {
//        document.getElementById("mySidebar").style.display = "none";
////        document.getElementById("myOverlay").style.display = "none";
//    }

//    function openVehicleForm(jobForm) {
//        var i;
//        var x = document.getElementsByClassName("job");
//        for (i = 0; i < x.length; i++) {
//            x[i].style.display = "none";
//        }
//        document.getElementById(jobForm).style.display = "block";
//    }
</script>


</html>