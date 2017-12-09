<div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">

    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>

    <img src='<?php echo $GLOBALS['base_url']; ?>/images/cmc_logo.png' style='width:45%;margin-left: 54px;margin-top: 5px;' class='w3-round'><br><br>
    <h4 class="w3-padding-small"><b>CMC WorkShop Management System</b></h4>
    <a href="<?php echo $GLOBALS['base_url']; ?>/TOController/load_view/view_assigned_jobs" id="btn_view_jobs" class="w3-bar-item w3-button">View Assigned Jobs</a>
    <a href="<?php echo $GLOBALS['base_url']; ?>/TOController/load_view/close_jobs" id="btn_view_stock" class="w3-bar-item w3-button">Close Jobs</a>
</div>